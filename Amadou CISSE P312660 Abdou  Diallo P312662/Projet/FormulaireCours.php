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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO cours (Num_Cours, Nom, Num_Enseignant, Num_Etu) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['Num_Cours'], "int"),
                       GetSQLValueString($_POST['Nom'], "text"),
                       GetSQLValueString($_POST['Num_Enseignant'], "int"),
                       GetSQLValueString($_POST['Num_Etu'], "text"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($insertSQL, $connect) or die(mysql_error());
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Texte</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_training.css" type="text/css" />
</head>
<body bgcolor="#64748B">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr bgcolor="#26354A">
	<td width="15" nowrap="nowrap"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="15" height="1" border="0" /></td>
	<td height="70" colspan="2" class="logo" nowrap="nowrap"><p align="center">GESTION_SCOLAIRE_UNIVERSITE</p>
	  <p align="center">SEUL LE TRAVAIL PAYE</p>
	  <p align="center">AMADOU CISSE P312660</p>
	  <p align="center">ABDOU DIALLO P312662</p>
	  <p align="center">&nbsp; </p>
	  <p> <span class="tagline">|</span></p></td>
	<td width="21">&nbsp;</td>
	</tr>

	<tr bgcolor="#FF6600">
	<td colspan="4"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="1" height="4" border="0" /></td>
	</tr>

	<tr bgcolor="#D3DCE6">
	<td colspan="4"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#FFCC00">
	<td width="15" nowrap="nowrap">&nbsp;</td>
	<td colspan="2" height="24">
	<table border="0" cellpadding="0" cellspacing="0" id="navigation">
        <tr>
          <td class="navText" align="center" nowrap="nowrap"><a href="Endex.PHP">ACCUEIL</a></td>
        </tr>
      </table>	</td>
	<td width="21">&nbsp;</td>
	</tr>

	<tr bgcolor="#D3DCE6">
	<td colspan="4"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#FF6600">
	<td colspan="4"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="1" height="4" border="0" /></td>
	</tr>

	<tr bgcolor="#D3DCE6">
	<td colspan="4"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#D3DCE6">
	<td width="15" valign="top">&nbsp;</td>
	<td width="35"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="35" height="1" border="0" /></td>
	<td width="1041" valign="top"><br />
	&nbsp;<br />
	<table border="0" cellspacing="0" cellpadding="2" width="951">
		<tr>
		<td width="947" class="pageName"><div align="center">Formulaire cours </div></td>
		</tr>

		<tr>
		<td bgcolor="#C4C4C4" class="bodyText">
		<p>&nbsp;</p>

		
        <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
          <table align="center">
            <tr valign="baseline">
              <td nowrap align="right">Num_Cours:</td>
              <td><input type="text" name="Num_Cours" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Nom:</td>
              <td><input type="text" name="Nom" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Num_Enseignant:</td>
              <td><input type="text" name="Num_Enseignant" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">Num_Etu:</td>
              <td><input type="text" name="Num_Etu" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
              <td nowrap align="right">&nbsp;</td>
              <td><input type="submit" value="Insérer l'enregistrement"></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1">
        </form>
        <p>&nbsp;</p>
        <br /></td>
		</tr>
	</table>
	 <br />	</td>

	<td>&nbsp;</td>
	</tr>

	<tr>
	<td width="15">&nbsp;<br />
	&nbsp;<br />	</td>
    <td width="35">&nbsp;</td>
    <td width="1041">&nbsp;</td>
	<td width="21">&nbsp;</td>
  </tr>
</table>
</body>
</html>

