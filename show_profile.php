<?php 
include('include/db.php');
include('include/connect.php');
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 </head>
 <body>
 	<div class="panel panel-success">
 		<div class="panel-heading">
 			<h3 class="panel-title">ข้อมูลส่วนตัว</h3>
 		</div>
 		<div class="panel-body">
 			<table align="center">
 				<thead>
 					<tr>
 						<td>ชื่อ :</td> 
 						<td><input type="text" name="" id="" value="" class="form-control" disabled=""></td>
 						<td>&nbsp;&nbsp;</td>
 						<td>ชื่อย่อ :</td>
 						<td><input type="text" name="" id="" value="" class="form-control" disabled=""></td>
 					</tr>
 					<tr>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
					</tr>
					<tr>
						<td>เพศ :</td>
 						<td><input type="text" name="" id="" value="" class="form-control" disabled=""></td>
 						<td></td>
 						<td></td>
					</tr>
					<tr>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
					</tr>
					<tr>
 						<td>UserName :</td>
 						<td><input type="text" name="" id="" value="" class="form-control" disabled=""></td>
 						<td>&nbsp;&nbsp;</td>
 						<td>PassWord :</td>
 						<td><input type="text" name="" id="" value="" class="form-control" disabled=""></td>
 						 <td>&nbsp;&nbsp;</td>
 						<td>
						<button class="btn btn-round btn-warning btn-xs" onclick="popup('../hr/edit_profile.php?up=1&idup=<?php echo $res_de['dep_id']; ?>','mywindow','800','400');"><i class="fa fa-pencil">แก้ไข PassWord</i></button>
 						
 					</tr>
 					<tr>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
					</tr>
 					<tr>
 						<td>โครงการ :</td>
 						<td><input type="text" name="" id="" value="" class="form-control" disabled=""></td>
 						<td>&nbsp;&nbsp;</td>
 						<td>แผนก :</td>
 						<td><input type="text" name="" id="" value="" class="form-control" disabled=""></td>
 						 <td>&nbsp;&nbsp;</td>
 						
 					</tr>
 					<tr>
						<td>&nbsp;&nbsp;</td>
						<td>&nbsp;&nbsp;</td>
					</tr>
 					<tr>
 						<td>ตำแหน่ง :</td>
 						<td><input type="text" name="" id="" value="" class="form-control" disabled=""></td>
 						<td>&nbsp;&nbsp;</td>
 						<td>อายุงาน :</td>
 						<td><input type="text" name="" id="" value="" class="form-control" disabled=""></td>
 					</tr>
 				</thead>
 			</table>
 		</div>
 	</div>
 </body>
 </html>