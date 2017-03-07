<?php 
include('include/db.php');
include('include/connect.php');
include('include/comtop.php');
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
							<form action="insert_position.php" method="post" name="form1">
								<div class="row">
									<div>				
										<table align="center">
												<tr>
													<td>ตำแหน่ง : <span class="f_req"></span></td>
													<td>
														<input type="text" name="" id="" value="" class="form-control" required="">
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
<?php }?>
</body>
</html>