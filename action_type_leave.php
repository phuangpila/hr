<?php 
error_reporting(0);
include('include/db.php');
include('include/connect.php');


if($_POST['insert']==1){
	$data = array(
	"type_name"=>$_POST["type_name"],
	"type_comment"=>$_POST["type_comment"],
);
insert("tb_type_leave",$data);
 header('refresh : 0.1; header.php?menu=type_leave');

}else if($_POST['update']==1){
	$data = array(
	"type_name"=>$_POST["type_name"],
	"type_comment"=>$_POST["type_comment"],
);
update("tb_type_leave",$data,"type_id = '".$_POST["id"]."' ");
    header('refresh : 0.1; header.php?menu=type_leave');

}else if($_GET['del']){
	delete('tb_type_leave','type_id="'.$_GET['del'].'" ');
	echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href ='header.php?menu=type_leave';</script>";
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
<form action="action_type_leave.php" method="post" name="form1">
							<div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลประเภทการลา</h4>
						      </div>
						    <div class="modal-body">
							    
									<div class="row">
										<div>				
											<table align="center">
													<tr>
														<td>ประเภทการลา : <span class="f_req"></span></td>
														<td>
														<?php $query = mysql_query("SELECT * FROM tb_type_leave WHERE type_id = '".$_GET['idup']."'");
															$res_type = mysql_fetch_array($query);
														 ?>
															<input type="text" name="type_name" id="type_name" value="<?php echo $res_type['type_name']; ?>" class="form-control" required="">
															<input type="hidden" name="update" id="" value="1" class="form-control">	
															<input type="hidden" name="id" id="" value="<?php echo $_GET['idup'];?>" class="form-control">	
														</td>
													</tr>
													<tr>
													<td>&nbsp;&nbsp;</td>
													</tr>
													<tr>
														<td>หมายเหตุ : <span class="f_req"></span></td>
														<td>
														<textarea name="type_comment" id="" class="form-control"><?php echo $res_type['type_comment']; ?></textarea>
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