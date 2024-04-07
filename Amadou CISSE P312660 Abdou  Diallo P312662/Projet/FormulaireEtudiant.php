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
  $insertSQL = sprintf("INSERT INTO etudiant (NumEtu, Prenom, Nom, Date_naissance, Adresse, Numero_de_telephone, Email, NOTE, Niveau, Formation) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['NumEtu'], "text"),
                       GetSQLValueString($_POST['Prenom'], "text"),
                       GetSQLValueString($_POST['Nom'], "text"),
                       GetSQLValueString($_POST['Date_naissance'], "date"),
                       GetSQLValueString($_POST['Adresse'], "text"),
                       GetSQLValueString($_POST['Numero_de_telephone'], "int"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['NOTE'], "int"),
                       GetSQLValueString($_POST['Niveau'], "text"),
                       GetSQLValueString($_POST['Formation'], "text"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($insertSQL, $connect) or die(mysql_error());
}
?><strong><strong><strong><strong><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Calendrier</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="mm_health_nutr.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS---------------
var d=new Date();
monthname= new Array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//--------------- END LOCALIZEABLE   ---------------
</script></head>
<body bgcolor="#F4FFE4">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#D5EDB3">
    <td width="382" colspan="2" rowspan="2" bgcolor="#FF0000">&nbsp;</td>
    <td width="378" height="50" align="center" valign="bottom" nowrap="nowrap" bgcolor="#FF0000" id="logo"><strong>GESTION SCOLAIRE DE L'UNIVERSITE </strong></td>
    <td width="100%" bgcolor="#FF0000">&nbsp;</td>
  </tr>

  <tr bgcolor="#D5EDB3">
    <td height="51" align="center" valign="top" bgcolor="#FF0000" id="tagline"><p><strong>SEUL LE TRAVAIL PAYE </strong></p>
      <p align="center">AMADOU CISSE P312660</p>
    <p align="center">ABDOU DIALLO P312662</p>      <p>&nbsp;</p></td>
	<td width="100%" bgcolor="#FF0000">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#5C743D"><img src="mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#99CC66" background="mm_dashed_line.gif"><img src="mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr bgcolor="#99CC66">
  <td>&nbsp;</td>
  	<td colspan="3" id="dateformat" height="20"><a href="Endex.PHP">ACCUEIL</a>&nbsp;&nbsp;::&nbsp;&nbsp;
    <script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script>	</td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#99CC66" background="mm_dashed_line.gif"><img src="mm_dashed_line.gif" alt="line decor" width="4" height="3" border="0" /></td>
  </tr>

  <tr>
    <td colspan="4" bgcolor="#5C743D"><img src="mm_spacer.gif" alt="" width="1" height="2" border="0" /></td>
  </tr>
 <tr>
    <td width="40">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#C4C4C4">&nbsp;<br />
    &nbsp;<br />
   <table border="0" cellspacing="0" cellpadding="2" width="504">
        <tr>
          <td class="pageName"><p><strong>FormulaireEtudiant</strong></p>
            <p>&nbsp;</p>
          <p>&nbsp;</p></td>
        </tr>
        <tr>
          <td class="subHeader" id="monthformat">&nbsp;</td>
        </tr>
      </table>
	   
      <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
        <table align="center">
          <tr valign="baseline">
            <td nowrap align="right">NumEtu:</td>
            <td><input type="text" name="NumEtu" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">Prenom:</td>
            <td><input type="text" name="Prenom" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">Nom:</td>
            <td><input type="text" name="Nom" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">Date_naissance:</td>
            <td><input type="text" name="Date_naissance" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">Adresse:</td>
            <td><input type="text" name="Adresse" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">Numero_de_telephone:</td>
            <td><input type="text" name="Numero_de_telephone" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">Email:</td>
            <td><input type="text" name="Email" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">NOTE:</td>
            <td><input type="text" name="NOTE" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">Niveau:</td>
            <td><input type="text" name="Niveau" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">Formation:</td>
            <td><input type="text" name="Formation" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td><input type="submit" value="Insérer l'enregistrement"></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1">
      </form>
      <p>&nbsp;</p>
      <br />
    &nbsp;<br />	</td>
    <td width="100%">&nbsp;</td>
  </tr>

 <tr>
    <td width="40">&nbsp;</td>
    <td width="342">&nbsp;</td>
    <td width="378">&nbsp;</td>
	<td width="100%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
</strong></strong></strong></strong>