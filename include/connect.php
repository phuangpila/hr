<?php 
$host="127.0.0.1";
		$sqlusername="root"; 
		$sqlpassword=""; 
		$db_name=""; 

		mysql_connect("$host", "$sqlusername", "$sqlpassword")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");
		mysql_query("SET NAMES UTF8");
 ?>