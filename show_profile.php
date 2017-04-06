<?php 
include('include/db.php');
include('include/connect.php');
session_start();

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
     <style type="text/css">
         .panel-default > .panel-heading {
             color: #FFFFFF;
             background-color: #424A5D;
             border-color: #FFFFFF;
         }
     </style>
 </head>
 <body>
 	<div class="panel panel-default">
 		<div class="panel-heading">
 			<h3 class="panel-title">ข้อมูลส่วนตัว</h3>
 		</div>
 		<div class="panel-body">
 			<?php 

 				$sql_my ="SELECT * FROM tb_user WHERE id_user = '".$_SESSION["id"]."'";
 				$query_my = mysql_query($sql_my);
 				$res_my = mysql_fetch_array($query_my);
 				//echo $sql_my;
 				
 				$query_po = mysql_query("SELECT * FROM tb_position WHERE po_id = '".$res_my['id_position']."'");
 				$res_po = mysql_fetch_array($query_po);
 				$query_de = mysql_query("SELECT * FROM tb_department WHERE dep_id = '".$res_my['id_department']."'");
 				$res_de = mysql_fetch_array($query_de);


            $query_u_pro = mysql_query("SELECT * FROM tb_user_project WHERE id_user = '".$_SESSION["id"]."'");
            $res_u_pro = mysql_fetch_array($query_u_pro);

            $query_pro = mysql_query("SELECT pro_name FROM tb_project WHERE pro_id = '".$res_u_pro['id_pro']."'");
            $res_pro = mysql_fetch_array($query_pro);
 			 ?>
 			<table align="center">
 				<thead>
 					<tr>
 						<td>ชื่อ :</td> 
 						<td><input type="text" name="" id="" value="<?php echo $res_my['name']; ?>" class="form-control" disabled=""></td>
 						<td>&nbsp;&nbsp;</td>
 						<td  style="text-align: center">ชื่อย่อ :</td>
 						<td><input type="text" name="" id="" value="<?php echo $res_my['shot_name']; ?>" class="form-control" disabled=""></td>
 					</tr>
 					<tr>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td>เพศ :</td>
 						<td><input type="text" name="" id="" value="<?php echo $res_my['sex']; ?>" class="form-control" disabled=""></td>
 						<td></td>
 						<td></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
					</tr>
					<tr>
 						<td>UserName :</td>
 						<td><input type="text" name="" id="" value="<?php echo $res_my['user_name']; ?>" class="form-control" disabled=""></td>
 						<td>&nbsp;&nbsp;</td>
 						<td>
						<a class="btn btn-warning btn-xs" data-toggle="modal" href='#modal-id'>แก้ไข Password</a>
 					</tr>
 					<tr>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
					</tr>
 					<tr>
 						<td>โครงการ :</td>
 						<td><input type="text" name="" id="" value="<?php echo $res_pro['pro_name']; ?>" class="form-control" disabled=""></td>
 						<td>&nbsp;&nbsp;</td>
 						<td style="text-align: center">แผนก :</td>
 						<td><input type="text" name="" id="" value="<?php echo $res_de['dep_name']; ?>" class="form-control" disabled=""></td>
 						 <td>&nbsp;&nbsp;</td>
 						
 					</tr>
 					<tr>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
					</tr>
 					<tr>
 						<td>ตำแหน่ง :</td>
 						<td><input type="text" name="" id="" value="<?php echo $res_po['po_name']; ?>" class="form-control" disabled=""></td>
 						<td>&nbsp;&nbsp;</td>
 						<!-- <td>อายุงาน :</td>
 						<td><input type="text" name="" id="" value="<?php echo $res_my['sex']; ?>" class="form-control" disabled=""></td> -->
 					</tr>
 				</thead>
 			</table>
 		</div>
 	</div>
<!-- Edit PassWord -->
<form action="edit_profile.php" method="post">
 	<div class="modal fade" id="modal-id">
 		<div class="modal-dialog">
 			<div class="modal-content">
 				<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 					<h4 class="modal-title">แก้ไข Password</h4>
 				</div>
 				<div class="modal-body">
 					<table>
 						<tr>
	 						<td>PassWord ใหม่ :</td> 
	 						<td>	
	 							<input type="text" name="pass_word" id="" value="" class="form-control" required=""	>
	 						</td>
	 						<td>&nbsp;&nbsp;</td>
	 						<td>ยืนยัน Password :</td>
	 						<td>
	 							<input type="text" name="re_password" id="" value="" class="form-control" required="">
	 						</td>
 						</tr>
 					</table>
 				</div>
 				<div class="modal-footer">
 					<button type="submit" class="btn btn-success">บันทึก</button>
 					<button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
 				</div>
 			</div>
 		</div>
 	</div>
 </form>
 </body>
 </html>