<?php 
error_reporting(0);
include('include/db.php');
include('include/connect.php');


if($_POST['insert']==1){
	$data = array(
	"id_user"=>$_POST["id_user"],
	"id_pro"=>$_POST["id_pro"],
	"header"=>$_POST["header"],
);
insert("tb_user_project",$data);
 header('refresh : 0.1; header.php?menu=user_pro');

}else if($_POST['update']==1){
	$data = array(
	"id_pro"=>$_POST["id_pro"],
	"header"=>$_POST["header"],
);
update("tb_user_project",$data,"id_u_p = '".$_POST["id"]."' ");
    header('refresh : 0.1; header.php?menu=user_pro');

}else if($_GET['del']){
	delete('tb_user_project','id_u_p="'.$_GET['del'].'" ');
	echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href ='header.php?menu=user_pro';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php if($_GET['up']==1){?>
<form action="action_user_project.php" method="post" name="form1">
							<div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลโครงการที่สังกัด</h4>
						      </div>
						    <div class="modal-body">
							    
									<div class="row">
										<div>				
											<table align="center" width="500">
											<?php 
												$query_user_pro = mysql_query("select * from tb_user_project where id_u_p = '".$_GET['idup']."'");
												$res_user_pro = mysql_fetch_array($query_user_pro);
											 ?>
												<tr>
												<input type="hidden" name="update" id="" value="1" class="form-control">
													 <input type="hidden" name="id" id="" value="<?php echo $_GET['idup']; ?>" class="form-control">
													<td style="text-align: center;" width="150">โครงการ : <span class="f_req"></span></td>
													<td>
													<?php $query_pro = mysql_query("select * from tb_project") ?>
														<select name="id_pro" id="id_pro" class="form-control">
															<option value="0">เลือก</option>
															<?php while ($res_pro = mysql_fetch_array($query_pro)) { ?>
															<option value="<?php echo $res_pro['pro_id']; ?>"<?php if ($res_pro['pro_id'] == $res_user_pro['id_pro']) { echo "selected";} ?>><?php echo $res_pro['pro_name']; ?></option>
															<?php } ?>
														</select>
													</td>
												</tr>
												<tr>
													<td>&nbsp;&nbsp;</td>
												</tr>	
												<tr>
													<td style="text-align: center;" width="150">สถานะในโครงการ : <span class="f_req"></span></td>
													<td>
														<?php 
														if ($res_user_pro['header'] == 'Y') {
														 ?>
														<input type="radio" name="header" id="header" value="Y" checked="checked">เป็นหัวหน้า
														<input type="radio" name="header" id="header" value="N">ไม่เป็นหัวหน้า
														<?php }elseif ($res_user_pro['header'] == 'N') {

														?>
														<input type="radio" name="header" id="header" value="Y">เป็นหัวหน้า
														<input type="radio" name="header" id="header" value="N" checked="checked">ไม่เป็นหัวหน้า
														<?php } ?>
													</td>
												</tr>
										</table>					
										</div><br>
									</div>
						    </div>
						    <div class="modal-footer">
						        <button type="submit" class="btn btn-success">บันทึก</button>
						        <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
						    </div>
</form> 
	<?php } ?>
</body>
</html>