<?php 
session_start();
error_reporting(0);
include('include/db.php');
include('include/connect.php');
?>
<style type="text/css">
	.panel-default > .panel-heading {
  color: #FFFFFF;
  background-color: #424A5D;
  border-color: #FFFFFF;
}
.scroll-wrapper {
  width: 2010px;
  white-space: nowrap;
  overflow-x: scroll;
}th {
    white-space: nowrap;
}td {
    white-space: nowrap;
}
</style>

	 <div class="panel panel-default" >
  <div class="panel-heading" >ตารางข้อมูลการลา</div>
  <div class="panel-body"> <a href="action_leave.php?insert=1"  data-toggle="modal"  data-target="#myModalin" class="btn btn-success  btn-sm" >เพิ่มข้อมูล</a>
    <div class="modal fade" id="myModalin" tabindex="-1" role="dialog" aria-labelledby="myModalLabelin" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content"></div>
      </div>
    </div>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
      <tr>
        <th style="text-align:center">ลำดับที่</th>
        <th style="text-align:center">ประเภทการลา</th>
        <th style="text-align:center">จำนวนวันลา</th>
        <th style="text-align:center">วันที่ขอลา</th>
        <th style="text-align:center">ลาตั้งแต่วันที่ - ถึงวันที่</th>
        <th style="text-align:center">หมายเหตุ</th>
        <th style="text-align:center">หัวหน้าแผนกอนุมัติ</th>
        <th style="text-align:center">หัวหน้าโครงการอนุมัติ</th>
        <th style="text-align:center">ฝ่ายบุคคลอนุมัติ</th>
        <th style="text-align:center">แนบเอกสารการลา</th>
          <th style="text-align:center">รายละเอียดเอกสารการลา</th>
        <th width="10%" style="text-align:center">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    $sql=mysql_query("SELECT * FROM tb_leave WHERE id_user='".$_SESSION["id"]."' ");
    while($res=mysql_fetch_array($sql)){
    ?>
      <tr>
        <td style="text-align:center"><?php echo $i; ?></td>
        <td style="text-align:center">
        <?php 
        $sql_type=mysql_query("SELECT * FROM tb_type_leave WHERE type_id='".$res['lea_type']."' ");
        $res_type=mysql_fetch_array($sql_type);
        echo $res_type['type_name']; 
        ?></td>
        <td style="text-align:center"><?php echo $res['lea_unit']; ?></td>
        <td style="text-align:center"><?php echo $res['lea_request']; ?></td>
        <td style="text-align:center"><?php echo $res['lea_start']." - ".$res['lea_end']; ?></td>
        <td style="text-align:center"><?php echo $res['lea_comment']; ?></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center">
          
          <a href="action_leave.php?doc=1&id_doc=<?php echo $res['lea_id']; ?>"   data-toggle="modal"  data-target="#myModalD<?php echo $res['id_user']; ?>" class="btn btn-primary  btn-xs" ><i class="fa fa-file-word-o"></i></a>
          <div class="modal fade" id="myModalD<?php echo $res['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelD" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content"></div>
            </div>
          </div>

        </td>
         <td> <?php if ($res['lea_file'] != '') { ?>
                    <a href="<?php echo $res['lea_file']; ?>">ดาวน์โหลด(เอกสารประกอบการลา)</a>
                    <?php }elseif ($res['lea_file'] == '') {
                    } ?></td>
        <td style="text-align:center"></td>
      </tr>
      <?php 
  		$i++;	
  	}
      ?>
    </tbody>
  </table>
</div>
</div>
</div>

    <script type="text/javascript" charset="utf-8">
     $(document).ready(function() {
$('#dataTables-example').dataTable( {
                    "oLanguage": {
                     "sProcessing": "กำลังดำเนินการ...",
              "sLengthMenu": "แสดง_MENU_ แถว",
              "sZeroRecords": "ไม่พบข้อมูล",
              "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
              "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
              "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
              "sInfoPostFix": "",
              "sSearch": "ค้นหา:",
              "sUrl": "",
              "oPaginate": {
                            "sFirst": "เิริ่มต้น",
                            "sPrevious": "ก่อนหน้า",
                            "sNext": "ถัดไป",
                            "sLast": "สุดท้าย"
              }
          }

} );
} );
</script>
 