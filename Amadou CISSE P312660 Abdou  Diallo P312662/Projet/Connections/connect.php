<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connect = "sql311.infinityfree.com";
$database_connect = "if0_36279525_gestion_scolaire_universite";
$username_connect = "if0_36279525";
$password_connect = "bwyG7cg2LWoDV3J";
$connect = mysql_pconnect($hostname_connect, $username_connect, $password_connect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>