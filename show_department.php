<?php
include('include/db.php');
include('include/connect.php');
?>
<style type="text/css">
	.panel-default > .panel-heading {
  color: #FFFFFF;
  background-color: #424A5D;
  border-color: #FFFFFF;
}
</style>
<div class="panel panel-default" >
 <div class="panel-heading" >ตารางข้อมูลแผนกพนักงาน</div>
                  	<div class="panel-body">
							<button class="btn btn-success" onclick="popup('../hr/action_department.php?in=1','mywindow','800','400');">เพิ่มข้อมูล</button>
						</div><br>					

                  		<table class="table table-striped table-advance table-hover " width="100%">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>แผนก</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <?php 
	                        	$i=1;
	                        	$query_de = mysql_query("SELECT * FROM tb_department");
	                        	while ($res_de = mysql_fetch_array($query_de)) {
	                        	
	                        	
	                         ?>
	                        <tbody>
								<td><?php echo $i++; ?></td>
								<td><?php echo $res_de['dep_name']; ?></td>
								<td width="20%">
									<button class="btn btn-warning btn-xs" onclick="popup('../hr/action_department.php?up=1&idup=<?php echo $res_de['dep_id']; ?>','mywindow','800','400');"><i class="fa fa-pencil"></i></button>
									<button class="btn btn-danger btn-xs" onclick="confirmDelete('action_department.php?del=<?php echo $res_de['dep_id']; ?>')"><i class="fa fa-trash-o "></i></button>
								</td>
	                        </tbody>
	                        <?php } ?>
                		</table>         
</div>