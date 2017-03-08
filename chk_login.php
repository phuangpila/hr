<?php 
	include('include/db.php');
	error_reporting(0);
	session_start();
$user_name=stripslashes(htmlspecialchars(trim($_POST['user_name']), ENT_QUOTES));
$pass_word=stripslashes(htmlspecialchars(trim($_POST['pass_word']), ENT_QUOTES));
	if($user_name != "" && $pass_word != ""){
	$login_check = hash('sha1', $pass_word.$user_name);
$strSql = "SELECT * FROM tb_user WHERE user_name='".$user_name."' AND password='".$login_check."' ";
	$sqlQuery = mysql_query($strSql);
	$rec = mysql_num_rows($sqlQuery);
		if ($rec > 0) {
			
			$row = mysql_fetch_array($sqlQuery);
			 $_SESSION["name"] = $row['name'];
			 $_SESSION["shot_name"] = $row['shot_name'];
			 $_SESSION["user_name"] = $row['user_name'];
			 $_SESSION["chk"]='1';
			imgLoading("กำลังเข้าสู่ระบบ กรุณารอสักครู่ ...");
    	header("refresh:2; header.php" );
		exit();
				
		}else{
			imgLoading("Username หรือ Password อาจจะผิดกรุณา Login ใหม่อีกครั้ง...");
		header("refresh:2; login.php" );
		exit();
		}
}else{
	imgLoading("กรุณาใส่ Username หรือ Password ในการ Login...");
		header("refresh:2; login.php" );
		exit();
}


 ?>
				