<?php 
include('include/db.php');
include('include/connect.php');
session_start();
error_reporting(0);
if($_SESSION["id"]!=""){
$pass_word=stripslashes(htmlspecialchars(trim($_POST['pass_word']), ENT_QUOTES));
$re_password=$_POST['re_password'];


if($pass_word == $re_password ){
$login_check = hash('sha1', $pass_word.$_SESSION["user_name"]);
$newdata = array(
"password"=>$login_check,
);

update("tb_user",$newdata,"id_user = '".$_SESSION["id"]."' ");
echo "<script type='text/javascript'>alert('แก้ไข Password เรียบร้อยแล้ว');</script>";
		header('refresh : 0.1; header.php?menu=pro');	
}else{
	echo "<script type='text/javascript'>alert('Password ไม่ต้องกัน ลองใหม่อีกครั้ง');</script>";
	header('refresh : 0.1; header.php?menu=pro');		
}

}else{
    echo "<script type='text/javascript'>alert('กรุณา Login ก่อน');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php' />";
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 </head>
 <body>
 	
 </body>
 </html>