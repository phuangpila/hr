<?php
include('include/db.php');
include('include/connect.php');
?>
                <div class="panel-heading" >ตารางข้อมูลตำแหน่งพนักงาน</div>
                  	<div class="panel-body">
							<button class="btn btn-success" onclick="popup('../hr/action_position.php?in=1','mywindow','800','400');">เพิ่มข้อมูล</button>
						</div><br>					

                  		<table class="table table-striped table-advance table-hover " width="100%">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>ตำแหน่ง</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <?php 
	                        	$i=1;
	                        	$query_po = mysql_query("SELECT * FROM tb_position");
	                        	while ($res_po = mysql_fetch_array($query_po)) {
	                        	
	                        	
	                         ?>
	                        <tbody>
								<td><?php echo $i++; ?></td>
								<td><?php echo $res_po['po_name']; ?></td>
								<td width="20%">
									<button class="btn btn-warning btn-xs" onclick="popup('../hr/action_position.php?up=1&idup=<?php echo $res_po['po_id']; ?>','mywindow','800','400');"><i class="fa fa-pencil"></i></button>
									<button class="btn btn-danger btn-xs" onclick="confirmDelete('action_position.php?del=<?php echo $res_po['po_id']; ?>')"><i class="fa fa-trash-o "></i></button>
								</td>
	                        </tbody>
	                        <?php } ?>
                		</table>           
