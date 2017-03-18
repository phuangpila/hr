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
                <div class="panel-heading" >ตารางข้อมูลโครงการที่สังกัด</div>
                  	<div class="panel-body">
							<a class="btn btn-success" data-toggle="modal" href='#modal-id'> เพิ่มข้อมูล</a>
						</div><br>				
                  		<table class="table-bordered table-striped table-condensed" width="100%">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>ชื่อ</th>
								<th>โครงการ</th>
								<th>ตำแหน่ง</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                       <?php 
	                        	$i=1;
	                        	$query = mysql_query("select * from tb_user_project");
	                        	while ($res = mysql_fetch_array($query)) {

	                        	$sql_u = "select * from tb_user where id_user = '".$res['id_user']."'";
	                        	$query_u = mysql_query($sql_u);
	                        	$res_u = mysql_fetch_array($query_u);

	                        	$sql_p = "select * from tb_project where pro_id = '".$res['id_pro']."'";
	                        	$query_p = mysql_query($sql_p);
	                        	$res_p = mysql_fetch_array($query_p);
	                         ?>
	                        <tbody>
	                       
	                        	<td><?php echo $i; ?></td>
	                        	<td><?php echo $res_u['name']; ?></td>
	                        	<td><?php echo $res_p['pro_name']; ?></td>	
	                        	<td><?php if ($res['header'] == 'Y') {
	                        		echo "หัวหน้าโครงการ";
	                        	}elseif ($res['header'] == 'N') {
	                        		echo "ผู้ร่วมโครงการ";
	                        	} ?></td>
								<td width="20%">
								<a href="action_user_project.php?up=1&idup=<?php echo $res['id_u_p']; ?>"   data-toggle="modal"  data-target="#myModal<?php  echo $res['id_u_p']; ?>" class="btn btn-warning  btn-xs" ><i class="fa fa-pencil"></i></a>
								<div class="modal fade" id="myModal<?php  echo $res['id_u_p']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							 		 <div class="modal-dialog">
							    		<div class="modal-content"></div>
							 		 </div>
								</div>

									<button class="btn btn-danger btn-xs" onclick="confirmDelete('action_user_project.php?del=<?php echo $res['id_u_p']; ?>')"><i class="fa fa-trash-o "></i></button>
								</td>
	                        </tbody>
	                 			<?php
									$i++;
								 } ?>
                		</table>           
</div>

<form action="action_user_project.php" method="post">
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">เพิ่มข้อมูลโครงการที่สังกัด</h4>
				</div>
				<div class="modal-body">
					<div class="row">
									<div>				
										<table align="center" width="500">
												<tr>
													<td style="text-align: center;" width="150">ชื่อ : <span class="f_req"></span></td>
													<td>
														<?php 
															$query_user = mysql_query("select * from tb_user");	
														 ?>
														<select name="id_user" id="id_user" class="form-control">
															<option value="0">เลือก</option>
														<?php while ($rs_user = mysql_fetch_array($query_user)){ ?>
															<option value="<?php echo $rs_user['id_user']; ?>"><?php echo $rs_user['name']; ?></option>
															<?php }?>
														</select>
														<input type="hidden" name="insert" id="" value="1" class="form-control">	
													</td>
												</tr>
												<tr>
													<td>&nbsp;&nbsp;</td>
												</tr>	
												<tr>
													<td style="text-align: center;" width="150">โครงการ : <span class="f_req"></span></td>
													<td>
													<?php $query_pro = mysql_query("select * from tb_project") ?>
														<select name="id_pro" id="id_pro" class="form-control">
															<option value="0">เลือก</option>
															<?php while ($res_pro = mysql_fetch_array($query_pro)) { ?>
															<option value="<?php echo $res_pro['pro_id']; ?>"><?php echo $res_pro['pro_name']; ?></option>
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
														<input type="radio" name="header" id="header" value="Y">เป็นหัวหน้า
														<input type="radio" name="header" id="header" value="N" checked="checked">ไม่เป็นหัวหน้า
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
