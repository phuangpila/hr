<?php 
error_reporting(0);
include('include/db.php');
include('include/connect.php');


if($_POST['insert']==1){
	$data = array(
	"pro_name"=>$_POST["pro_name"],
);
insert("tb_project",$data);
 header('refresh : 0.1; header.php?menu=project');

}else if($_POST['update']==1){
	$data = array(
	"pro_name"=>$_POST["pro_name"],
);
update("tb_project",$data,"pro_id = '".$_POST["id"]."' ");
    header('refresh : 0.1; header.php?menu=project');

}else if($_GET['del']){
	delete('tb_project','pro_id="'.$_GET['del'].'" ');
	echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href ='header.php?menu=project';</script>";
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
<form action="action_project.php" method="post" name="form1">
							<div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลโครงการ</h4>
						      </div>
						    <div class="modal-body">
							    
									<div class="row">
										<div>				
											<table align="center">
													<tr>
														<td>ชื่อโครงการ : <span class="f_req"></span></td>
														<td>
														<?php $query = mysql_query("SELECT * FROM tb_project WHERE pro_id = '".$_GET['idup']."'");
															$res_pro = mysql_fetch_array($query);
														 ?>
															<input type="text" name="pro_name" id="pro_name" value="<?php echo $res_pro['pro_name']; ?>" class="form-control" required="">
															<input type="hidden" name="update" id="" value="1" class="form-control">	
															<input type="hidden" name="id" id="" value="<?php echo $_GET['idup'];?>" class="form-control">	
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