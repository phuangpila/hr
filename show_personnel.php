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
  <div class="panel-heading" >ตารางข้อมูลพนักงาน</div>
  <div class="panel-body"> <a href="action_personnel.php?insert=1"   data-toggle="modal"  data-target="#myModalin" class="btn btn-success  btn-sm" >เพิ่มข้อมูล</a>
    <div class="modal fade" id="myModalin" tabindex="-1" role="dialog" aria-labelledby="myModalLabelin" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content"></div>
      </div>
    </div>
  </div>
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
        <th>วันที่เริ่มงาน</th>
        <th>เพศ</th>
        <th width="5%">จำนวนวันลา</th>
        <th width="10%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	                        	$i=1;
	                        	$query = mysql_query("SELECT * FROM tb_user");
	                        	while ($res = mysql_fetch_array($query)) {
	                        		$query_po = mysql_query("SELECT po_name FROM tb_position WHERE po_id = '".$res['id_position']."'");
	                        		$res_po = mysql_fetch_array($query_po);

	                        		$query_dep = mysql_query("SELECT dep_name FROM tb_department WHERE dep_id = '".$res['id_department']."'");
	                        		$res_dep = mysql_fetch_array($query_dep);

	                        
	                        	
	                         ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $res['name']; ?></td>
        <td><?php echo $res['shot_name']; ?></td>
        <td><?php echo $res['user_name']; ?></td>
        <td><?php echo $res_po['po_name']; ?></td>
        <td><?php echo $res_dep['dep_name']; ?></td>
        <td><?php echo DateThai($res['start_work']); ?></td>
        <td><?php echo Sex($res['sex']); ?></td>
        <td style="text-align:center"><a href="action_personnel.php?detail=1&id_detail=<?php echo $res['id_user']; ?>"   data-toggle="modal"  data-target="#myModal<?php echo $res['id_user']; ?>" class="btn btn-info  btn-xs" ><i class="glyphicon glyphicon-folder-open"></i></a>
          <div class="modal fade" id="myModal<?php echo $res['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content"></div>
            </div>
          </div></td>
        <td><a href="action_personnel.php?up=1&id_up=<?php echo $res['id_user']; ?>"   data-toggle="modal"  data-target="#myModalD<?php echo $res['id_user']; ?>" class="btn btn-warning  btn-xs" ><i class="fa fa-pencil"></i></a>
          <div class="modal fade" id="myModalD<?php echo $res['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelD" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content"></div>
            </div>
          </div>
          <button class="btn btn-danger btn-xs" onclick="confirmDelete('action_personnel.php?del=<?php echo $res['id_user']; ?>')"><i class="fa fa-trash-o "></i></button></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
