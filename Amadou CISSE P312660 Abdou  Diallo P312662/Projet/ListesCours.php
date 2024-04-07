<?php require_once('Connections/connect.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_connect, $connect);
$query_Recordset1 = "SELECT * FROM cours";
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
<title>H&eacute;bergement - Page d'accueil</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_lodging1.css" type="text/css" />
</head>
<body bgcolor="#999966">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td width="15" nowrap="nowrap"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="15" height="1" border="0" /></td>
	<td height="60" colspan="3" class="logo" nowrap="nowrap"><p align="center">AMADOU CISSE P312660</p>
	  <p align="center">ABDOU DIALLO P312662</p></td>
	<td width="40">&nbsp;</td>
	<td width="100%">&nbsp;</td>
	</tr>

	<tr bgcolor="#ffffff">
	<td colspan="6"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#a4c2c2">
	<td width="15" nowrap="nowrap">&nbsp;</td>
	<td height="36" colspan="3" id="navigation" class="navText"><a href="javascript:;">NOS CHAMBRES</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:;">&agrave; propos de la soci&eacute;t&eacute;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:;">RESERVER</a>&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp; <a href="javascript:;">TACHES A EFFECTUER</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:;">CONTACT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td width="40">&nbsp;</td>
	<td width="100%">&nbsp;</td>
	</tr>

	<tr bgcolor="#ffffff">
	<td colspan="6"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr bgcolor="#ffffff">
	<td width="230" colspan="2" valign="top" bgcolor="#C4C4C4"><table border="0" cellspacing="0" cellpadding="0" width="30">
		<tr>
		<td width="15">&nbsp;</td>
		<td width="15">&nbsp;</td>
		</tr>
	</table>	</td>
	<td width="50" valign="top" bgcolor="#C4C4C4"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
	<td width="440" valign="top" bgcolor="#C4C4C4"><br />
	<br />
	<table border="0" cellspacing="0" cellpadding="0" width="440">
		<tr>
		<td bgcolor="#C4C4C4" class="pageName"><p>&nbsp;</p>
		  <p> ListesCours</p>
		  <p>&nbsp; </p>
		  <p>&nbsp;</p></td>
		</tr>
	</table>	
	<p>&nbsp;</p>
    <table height="131" border="1">
      <tr>
        <td bgcolor="#C4C4C4">Num_Cours</td>
        <td bgcolor="#C4C4C4">Nom</td>
        <td bgcolor="#C4C4C4">Num_Enseignant</td>
        <td bgcolor="#C4C4C4">Num_Etu</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_Recordset1['Num_Cours']; ?></td>
          <td><?php echo $row_Recordset1['Nom']; ?></td>
          <td><?php echo $row_Recordset1['Num_Enseignant']; ?></td>
          <td><?php echo $row_Recordset1['Num_Etu']; ?></td>
        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table></td>
	<td width="40">&nbsp;</td>
	<td width="100%" bgcolor="#C4C4C4">&nbsp;</td>
	</tr>

	<tr bgcolor="#ffffff">
	<td colspan="6"><img src="file:///C|/Program%20Files%20(x86)/Macromedia/Dreamweaver%208/Configuration/BuiltIn/StarterPages/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
	</tr>

	<tr>
	<td width="15">&nbsp;</td>
	<td width="215">&nbsp;</td>
	<td width="50">&nbsp;</td>
	<td width="440">&nbsp;</td>
	<td width="40">&nbsp;</td>
	<td width="100%">&nbsp;</td>
	</tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

