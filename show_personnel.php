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
                <div class="panel-heading" >ตารางข้อมูลโครงการ</div>
<br>				
                  		<table class="table-bordered table-striped table-condensed" width="100%">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>ชื่อ</th>
	                            <th>ชื่อย่อ</th>
	                            <th>Username</th>
	                            <th>ตำแหน่ง</th>
	                            <th>แผนก</th>
	                            <th>โครงการที่รับผิดชอบ</th>
	                            <th>อายุงาน(ปี)</th>
	                            <th>เพศ</th>
	                          </tr>
	                        </thead>
	                        <?php 
	                        	$i=1;
	                        	$query = mysql_query("SELECT * FROM tb_user");
	                        	while ($res = mysql_fetch_array($query)) {
	                        		$query_po = mysql_query("SELECT po_name FROM tb_position WHERE po_id = '".$res['id_position']."'");
	                        		$res_po = mysql_fetch_array($query_po);

	                        		$query_dep = mysql_query("SELECT dep_name FROM tb_department WHERE dep_id = '".$res['id_department']."'");
	                        		$res_dep = mysql_fetch_array($query_dep);

	                        		$query_pro = mysql_query("SELECT pro_name FROM tb_project WHERE pro_id = '".$res['id_project']."'");
	                        		$res_pro = mysql_fetch_array($query_pro);
	                        	
	                        	
	                         ?>
	                        <tbody>
								<td><?php echo $i++; ?></td>
								<td><?php echo $res['name']; ?></td>
								<td><?php echo $res['shot_name']; ?></td>
								<td><?php echo $res['user_name']; ?></td>
								<td><?php echo $res_po['po_name']; ?></td>
								<td><?php echo $res_dep['dep_name']; ?></td>
								<td><?php echo $res_pro['pro_name']; ?></td>
								<td><?php echo $res['work_year']; ?></td>
								<td><?php echo $res['sex']; ?></td>	
	                        </tbody>
	                        <?php } ?>
                		</table>           
</div>
