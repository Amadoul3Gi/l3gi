<?php require_once('Connections/connect.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

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

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_connect, $connect);
$query_Recordset1 = "SELECT * FROM etudiant";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $connect) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Texte</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_training.css" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_jumpMenuGo(selName,targ,restore){ //v3.0
  var selObj = MM_findObj(selName); if (selObj) MM_jumpMenu(targ,selObj,restore);
}
//-->
</script>
<style type="text/css">
<!--
.Style1 {
	font-size: 18px;
	color: #00FF00;
}
-->
</style>
</head>
<body bgcolor="#64748B">
<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">Premier</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">Pr&eacute;c&eacute;dent</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Suivant</a>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">Dernier</a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr bgcolor="#26354A">
	<td width="15" nowrap="nowrap"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="15" height="1" border="0" /></td>
	<td height="70" colspan="2" nowrap="nowrap" bgcolor="#FF0000" class="logo"><p align="center">GESTION_SCOLAIRE_UNIVERSITE</p>
	  <p align="center"><span class="tagline">|SEUL LE TRAVAIL PAYE </span></p>
	  <p align="center">AMADOU CISSE P312660</p>
	  <p align="center">ABDOU DIALLO P312662</p></td>
	<td width="123" bgcolor="#FF0000"><form id="form2" name="form2" method="post" action="">
	</form>
	</td>
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
          <td class="navText" align="center" nowrap="nowrap">&nbsp;</td>
        </tr>
      </table>	</td>
	<td width="123">&nbsp;</td>
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
	<td width="939" valign="top"><br />
	&nbsp;<br />
	<table border="0" cellspacing="0" cellpadding="2" width="879">

		<tr>
		<td width="875" bgcolor="#C4C4C4" class="bodyText">
		<p align="center" class="Style1">MISE A JOUR ETUDIANT</p>
		<p>&nbsp; </p>
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
              <td><input type="submit" value="Mettre à jour l'enregistrement"></td>
            </tr>
          </table>
          <input type="hidden" name="MM_update" value="form1">
          <input type="hidden" name="NumEtu" value="<?php echo $row_Recordset1['NumEtu']; ?>">
          <select name="menu1" onchange="MM_jumpMenu('parent',this,0)">
            <option value="FormulaireCours.php">Suivant</option>
          </select>
          <input type="button" name="Button1" value="Aller" onclick="MM_jumpMenuGo('menu1','parent',0)" />
          <select name="menu2" onchange="MM_jumpMenu('parent',this,0)">
            <option value="FormulaireEtudiant.php">Precedent</option>
          </select>
		  <input type="button" name="Button2" value="Aller" onclick="MM_jumpMenuGo('menu2','parent',0)" />
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
    <td width="939">&nbsp;</td>
	<td width="123">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

