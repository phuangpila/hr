<?php 
error_reporting(0);
include('include/db.php');
include('include/connect.php');


if($_POST['insert']==1){
	$data = array(
	"po_name"=>$_POST["po_name"],
);
insert("tb_position",$data);
 header('refresh : 0.1; header.php?menu=pos');

}else if($_POST['update']==1){
	$data = array(
	"po_name"=>$_POST["po_name"],
);
update("tb_position",$data,"po_id = '".$_POST["id"]."' ");
    header('refresh : 0.1; header.php?menu=pos');

}else if($_GET['del']){
	delete('tb_position','po_id="'.$_GET['del'].'" ');
	echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href ='header.php?menu=pos';</script>";
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
<form action="action_position.php" method="post" name="form1">
							<div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลตำแหน่ง</h4>
						      </div>
						    <div class="modal-body">
							    
									<div class="row">
										<div>				
											<table align="center">
													<tr>
														<td>ตำแหน่ง : <span class="f_req"></span></td>
														<td>
														<?php $query = mysql_query("SELECT * FROM tb_position WHERE po_id = '".$_GET['idup']."'");
															$res_po = mysql_fetch_array($query);
														 ?>
															<input type="text" name="po_name" id="po_name" value="<?php echo $res_po['po_name']; ?>" class="form-control" required="">
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