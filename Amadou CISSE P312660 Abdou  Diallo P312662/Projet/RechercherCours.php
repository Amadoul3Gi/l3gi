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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE cours SET Nom=%s, Num_Enseignant=%s, Num_Etu=%s WHERE Num_Cours=%s",
                       GetSQLValueString($_POST['Nom'], "text"),
                       GetSQLValueString($_POST['Num_Enseignant'], "int"),
                       GetSQLValueString($_POST['Num_Etu'], "text"),
                       GetSQLValueString($_POST['Num_Cours'], "int"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($updateSQL, $connect) or die(mysql_error());
}

$colname_Recordset1 = "-1";
if (isset($_POST['Num_Cours'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_POST['Num_Cours'] : addslashes($_POST['Num_Cours']);
}
mysql_select_db($database_connect, $connect);
$query_Recordset1 = sprintf("SELECT * FROM cours WHERE Num_Cours = %s", $colname_Recordset1);
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
<form id="form1" name="form1" method="post" action="">
rechercher
  <label for="textfield"></label>
  <input name="Num_Cours" type="text" id="Num_Cours" size="n" />
<label for="label"></label>
  <label for="Submit"></label>
  <p>
    <input type="submit" name="Rechercher" value="Envoyer" id="Rechercher" />
  </p>
  <p>&nbsp; </p>
  <p>&nbsp;  </p>
</form>

<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">Num_Cours:</td>
      <td><?php echo $row_Recordset1['Num_Cours']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nom:</td>
      <td><input type="text" name="Nom" value="<?php echo $row_Recordset1['Nom']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Num_Enseignant:</td>
      <td><input type="text" name="Num_Enseignant" value="<?php echo $row_Recordset1['Num_Enseignant']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Num_Etu:</td>
      <td><input type="text" name="Num_Etu" value="<?php echo $row_Recordset1['Num_Etu']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Mettre à jour l'enregistrement"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form2">
  <input type="hidden" name="Num_Cours" value="<?php echo $row_Recordset1['Num_Cours']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
