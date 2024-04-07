<?php require_once('Connections/connect.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

if ((isset($_POST['Num_Cours'])) && ($_POST['Num_Cours'] != "")) {
  $deleteSQL = sprintf("DELETE FROM cours WHERE Num_Cours=%s",
                       GetSQLValueString($_POST['Num_Cours'], "int"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($deleteSQL, $connect) or die(mysql_error());
}

mysql_select_db($database_connect, $connect);
$query_Recordset1 = "SELECT * FROM cours";
$Recordset1 = mysql_query($query_Recordset1, $connect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<?php do { ?>
  <form id="form1" name="form1" method="post" action="">
    <label for="textfield"></label>
    <input name="Num_Cours" type="text" id="Num_Cours" value="<?php echo $row_Recordset1['Num_Cours']; ?>" />
    <label for="label"></label>
    <input name="textfield2" type="text" id="label" value="<?php echo $row_Recordset1['Nom']; ?>" />
    <label for="label2"></label>
    <input name="textfield3" type="text" id="label2" value="<?php echo $row_Recordset1['Num_Enseignant']; ?>" />
    <label for="label3"></label>
    <input name="textfield4" type="text" id="label3" value="<?php echo $row_Recordset1['Num_Etu']; ?>" />
    <label for="Submit"></label>
    <input type="submit" name="Submit" value="Supprimer" id="Submit" />
      </form>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?><p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
