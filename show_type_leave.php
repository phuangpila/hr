<?php
include('include/db.php');
include('include/connect.php');
session_start();

?>
<style type="text/css">
	.panel-default > .panel-heading {
  color: #FFFFFF;
  background-color: #424A5D;
  border-color: #FFFFFF;
}
</style>
 <div class="panel panel-default" >
                <div class="panel-heading" >ตารางข้อมูลประเภทการลา</div>
                  	<div class="panel-body">
							<a class="btn btn-success" data-toggle="modal" href='#modal-id'> เพิ่มข้อมูล</a>
						</div><br>				
                  		<table class="table-bordered table-striped table-condensed" width="100%">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>ประเภทการลา</th>
								<th>หมายเหตุ</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <?php 
	                        	$i=1;
	                        	$query_type = mysql_query("SELECT * FROM tb_type_leave");
	                        	while ($res_type = mysql_fetch_array($query_type)) {
	                        	
	                        	
	                         ?>
	                        <tbody>
								<td><?php echo $i++; ?></td>
								<td><?php echo $res_type['type_name']; ?></td>
								<td><?php echo $res_type['type_comment']; ?></td>
								<td width="20%">
							
								<a href="action_type_leave.php?up=1&idup=<?php echo $res_type['type_id']; ?>"   data-toggle="modal"  data-target="#myModal<?php echo $res_type['type_id']; ?>" class="btn btn-warning  btn-xs" ><i class="fa fa-pencil"></i></a>
								<div class="modal fade" id="myModal<?php echo $res_type['type_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							 		 <div class="modal-dialog">
							    		<div class="modal-content"></div>
							 		 </div>
								</div>

									<button class="btn btn-danger btn-xs" onclick="confirmDelete('action_type_leave.php?del=<?php echo  $res_type['type_id'] ?>')"><i class="fa fa-trash-o "></i></button>
								</td>
	                        </tbody>
	                        <?php } ?>
                		</table>           
</div>

<form action="action_type_leave.php" method="post">
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">เพิ่มข้อมูลประเภทการลา</h4>
				</div>
				<div class="modal-body">
					<div class="row">
									<div>				
										<table align="center">
												<tr>
													<td>ประเภทการลา : <span class="f_req"></span></td>
													<td>
														<input type="text" name="type_name" id="type_name" value="" class="form-control" required="">
														<input type="hidden" name="insert" id="" value="1" class="form-control">	
													</td>
												</tr>
												<tr>
													<td>&nbsp;&nbsp;</td>
												</tr>	
												<tr>
													<td>หมายเหตุ : <span class="f_req"></span></td>
													<td>
														<textarea name="type_comment" id="type_comment" class="form-control" ></textarea>
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
			</div>
		</div>
	</div>
</form>
