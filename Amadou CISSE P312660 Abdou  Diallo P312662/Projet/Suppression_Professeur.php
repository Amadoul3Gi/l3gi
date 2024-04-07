<?php require_once('Connections/connect.php'); ?>
<?php
mysql_select_db($database_connect, $connect);
$query_Recordset1 = "SELECT * FROM professeur";
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
  <?php do { ?>
    <label for="textfield"></label>
    <input name="NumProf" type="text" id="NumProf" value="<?php echo $row_Recordset1['NumProf']; ?>" />
    <label for="label"></label>
    <input name="textfield2" type="text" id="label" value="<?php echo $row_Recordset1['Prenom']; ?>" />
    <label for="label2"></label>
    <input name="textfield3" type="text" id="label2" value="<?php echo $row_Recordset1['Nom']; ?>" />
    <label for="label3"></label>
    <input name="textfield4" type="text" id="label3" value="<?php echo $row_Recordset1['Date_naissance']; ?>" />
    <label for="label4"></label>
    <input name="textfield5" type="text" id="label4" value="<?php echo $row_Recordset1['Adresse']; ?>" />
    <label for="label5"></label>
    <input name="textfield6" type="text" id="label5" value="<?php echo $row_Recordset1['Numero_de_telephone']; ?>" />
    <label for="label6"></label>
    <input name="textfield7" type="text" id="label6" value="<?php echo $row_Recordset1['Email']; ?>" />
    <label for="Submit"></label>
    <input type="submit" name="Submit" value="Supprimer" id="Submit" />
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?></form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
