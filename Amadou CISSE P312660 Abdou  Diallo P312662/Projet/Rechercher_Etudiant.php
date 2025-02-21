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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE etudiant SET Prenom=%s, Nom=%s, Date_naissance=%s, Adresse=%s, Numero_de_telephone=%s, Email=%s, NOTE=%s, Niveau=%s, Formation=%s WHERE NumEtu=%s",
                       GetSQLValueString($_POST['Prenom'], "text"),
                       GetSQLValueString($_POST['Nom'], "text"),
                       GetSQLValueString($_POST['Date_naissance'], "date"),
                       GetSQLValueString($_POST['Adresse'], "text"),
                       GetSQLValueString($_POST['Numero_de_telephone'], "int"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['NOTE'], "int"),
                       GetSQLValueString($_POST['Niveau'], "text"),
                       GetSQLValueString($_POST['Formation'], "text"),
                       GetSQLValueString($_POST['NumEtu'], "text"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($updateSQL, $connect) or die(mysql_error());
}

$colname_Recordset1 = "-1";
if (isset($_POST['NumEtu'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_POST['NumEtu'] : addslashes($_POST['NumEtu']);
}
mysql_select_db($database_connect, $connect);
$query_Recordset1 = sprintf("SELECT * FROM etudiant WHERE NumEtu = '%s'", $colname_Recordset1);
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
<form id="NumEtu" name="NumEtu" method="post" action="">
Rechercher
<label for="textfield"></label>
  <input type="text" name="textfield" id="textfield" />
  <label for="Submit"></label>
  <p>
    <input type="submit" name="Submit" value="Rechercher" id="Submit" />
  </p>
  <p>&nbsp; </p>
</form>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">NumEtu:</td>
      <td><?php echo $row_Recordset1['NumEtu']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Prenom:</td>
      <td><input type="text" name="Prenom" value="<?php echo $row_Recordset1['Prenom']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nom:</td>
      <td><input type="text" name="Nom" value="<?php echo $row_Recordset1['Nom']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Date_naissance:</td>
      <td><input type="text" name="Date_naissance" value="<?php echo $row_Recordset1['Date_naissance']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Adresse:</td>
      <td><input type="text" name="Adresse" value="<?php echo $row_Recordset1['Adresse']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Numero_de_telephone:</td>
      <td><input type="text" name="Numero_de_telephone" value="<?php echo $row_Recordset1['Numero_de_telephone']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Email:</td>
      <td><input type="text" name="Email" value="<?php echo $row_Recordset1['Email']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">NOTE:</td>
      <td><input type="text" name="NOTE" value="<?php echo $row_Recordset1['NOTE']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Niveau:</td>
      <td><input type="text" name="Niveau" value="<?php echo $row_Recordset1['Niveau']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Formation:</td>
      <td><input type="text" name="Formation" value="<?php echo $row_Recordset1['Formation']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Mettre � jour l'enregistrement"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="NumEtu" value="<?php echo $row_Recordset1['NumEtu']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
