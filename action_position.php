<?php 
error_reporting(0);
include('include/db.php');
include('include/connect.php');
include('include/comtop.php');


if($_POST['insert']==1){
	$data = array(
	"po_name"=>$_POST["po_name"],
);
insert("tb_position",$data);
echo "<script type='text/javascript'>window.opener.location.reload('show_position.php');window.close();</script>";

}else if($_POST['update']==1){
	$data = array(
	"po_name"=>$_POST["po_name"],
);
update("tb_position",$data,"po_id = '".$_POST["id"]."' ");
echo "<script type='text/javascript'>window.opener.location.reload('show_position.php');window.close();</script>";

}else if($_GET['del']){
	delete('tb_position','po_id="'.$_GET['del'].'" ');
	echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href ='show_position.php';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php 
if($_GET['in']==1){
?>
	<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >เพิ่มข้อมูลตำแหน่ง</div>
                  	<div class="panel-body">
                  		<div>
							<form action="action_position.php" method="post" name="form1">
								<div class="row">
									<div>				
										<table align="center">
												<tr>
													<td>ตำแหน่ง : <span class="f_req"></span></td>
													<td>
														<input type="text" name="po_name" id="po_name" value="" class="form-control" required="">
														<input type="hidden" name="insert" id="" value="1" class="form-control">	
													</td>
												</tr>
										</table>					
									</div><br>
									<div align="center">
										<div>
											<input type="submit" name="btnSave" id="btnSave" class="btn btn-small btn-success" value="บันทึก" />
											<input type="button" class="btn btn-small btn-danger" value="ปิด" onclick="window.close();">
										</div>
									</div>
								</div>
							</form>        
                  		</div>
           		 	</div>
        	</div>
		</div>
<?php }else if($_GET['up']==1){?>
<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >แก้ไขข้อมูลตำแหน่ง</div>
                  	<div class="panel-body">
                  		<div>
							<form action="action_position.php" method="post" name="form1">
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
									<div align="center">
										<div>
											<input type="submit" name="btnSave" id="btnSave" class="btn btn-small btn-success" value="บันทึก" />
											<input type="button" class="btn btn-small btn-danger" value="ปิด" onclick="window.close();">
										</div>
									</div>
								</div>
							</form>        
                  		</div>
           		 	</div>
        	</div>
		</div>
	<?php } ?>
</body>
</html>