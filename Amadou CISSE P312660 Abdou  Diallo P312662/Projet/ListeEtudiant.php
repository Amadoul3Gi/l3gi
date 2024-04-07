<?php require_once('Connections/connect.php'); ?>
<?php
$maxRows_Recordset1 = 10;
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
<table border="0" cellspacing="0" cellpadding="0">
	<tr bgcolor="#26354A">
	<td width="35" nowrap="nowrap"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="15" height="1" border="0" /></td>
	<td height="70" colspan="2" class="logo" nowrap="nowrap"><p align="left">GESTION_SCOLAIRE_UNIVERSITE</p>
	  <p align="left"><span class="tagline">|SEUL LE TRAVAIL PAYE </span></p>
	  <p align="center">AMADOU CISSE P312660</p>
	  <p align="center">ABDOU DIALLO P312662</p>	  <p align="left">&nbsp;</p></td>
	<td width="110">&nbsp;</td>
	</tr>

	<tr bgcolor="#FF6600">
	<td colspan="4"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="1" height="4" border="0" /></td>
	</tr>

	<tr bgcolor="#D3DCE6">
	<td colspan="4"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#FFCC00">
	<td width="35" nowrap="nowrap">&nbsp;</td>
	<td colspan="2" height="24">
	<table border="0" cellpadding="0" cellspacing="0" id="navigation">
        <tr>
          <td class="navText" align="center" nowrap="nowrap"><a href="Endex.PHP">ACCUEIL</a></td>
        </tr>
      </table>	</td>
	<td width="110">&nbsp;</td>
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
	<td width="35" valign="top"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="35" height="1" border="0" /></td>
	<td width="12">&nbsp;</td>
	<td width="1399" valign="top"><br />
	&nbsp;<br />
	<table border="0" cellspacing="0" cellpadding="2" width="1681">
		<tr>
		<td width="1677" class="pageName"><p>&nbsp;</p>
		  <p align="center">LISTE ETUDIANT </p></td>
		</tr>

		<tr>
		<td bgcolor="#C4C4C4" class="bodyText">
		<p>&nbsp;</p>

		
        <table border="1">
          <tr>
            <td>NumEtu</td>
            <td>Prenom</td>
            <td>Nom</td>
            <td>Date_naissance</td>
            <td>Adresse</td>
            <td>Numero_de_telephone</td>
            <td>Email</td>
            <td>NOTE</td>
            <td>Niveau</td>
            <td>Formation</td>
          </tr>
          <?php do { ?>
            <tr>
              <td><?php echo $row_Recordset1['NumEtu']; ?></td>
              <td><?php echo $row_Recordset1['Prenom']; ?></td>
              <td><?php echo $row_Recordset1['Nom']; ?></td>
              <td><?php echo $row_Recordset1['Date_naissance']; ?></td>
              <td><?php echo $row_Recordset1['Adresse']; ?></td>
              <td><?php echo $row_Recordset1['Numero_de_telephone']; ?></td>
              <td><?php echo $row_Recordset1['Email']; ?></td>
              <td><?php echo $row_Recordset1['NOTE']; ?></td>
              <td><?php echo $row_Recordset1['Niveau']; ?></td>
              <td><?php echo $row_Recordset1['Formation']; ?></td>
            </tr>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
        <br /></td>
		</tr>
	</table>
	 <br />	</td>

	<td>&nbsp;</td>
	</tr>

	<tr>
	<td width="35">&nbsp;<br />
	&nbsp;<br />	</td>
    <td width="12">&nbsp;</td>
    <td width="1399">&nbsp;</td>
	<td width="110">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

>
