<?php
include('include/db.php');
include('include/connect.php');

if($_GET['chk']=='1'){

    $date = date("Y-m-d");
    $sql_c=mysql_query("SELECT * FROM tb_leave WHERE lea_id='".$_GET['id_lea']."' ");
    $res_c=mysql_fetch_array($sql_c);

    $data = array(
        "hr_approve"=>"1",
        "date_approve_hr"=>$date,
    );

    update("tb_leave",$data,"lea_id = '".$_GET['id_lea']."' ");
    header('refresh : 0.1; header.php?menu=approve_hr');
}
?>
<aside class="col-lg-12 mt">
                      <section class="panel">
                          <div class="panel-body">
                              <div id="calendar" class="has-toolbar"></div>
                          </div>
                      </section>
                  </aside>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
        <th>ลำดับ</th>
        <th>ชื่อผู้ลา</th>
        <th>ประเภทการลา</th>
        <th>ลาวันที่จาก-ถึง</th>
        <th>รายละเอียด</th>
        <th>สถานะ</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i=1;
    $sql=mysql_query("SELECT * FROM tb_leave WHERE ma_approve=1 AND pro_approve=1 ");
    while($res=mysql_fetch_array($sql)){
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php
                $sql_u=mysql_query("SELECT * FROM tb_user WHERE id_user='".$res['id_user']."' ");
                $res_u=mysql_fetch_array($sql_u);
                echo $res_u['name']." ".$res_u['shot_name']; ?></td>
            <td><?php
                $sql_t=mysql_query("SELECT * FROM tb_type_leave WHERE type_id='".$res['lea_type']."' ");
                $res_t=mysql_fetch_array($sql_t);
                echo $res_t['type_name']; ?></td>
            <td><?php echo $res['lea_start']." - ".$res['lea_end']; ?></td>
            <td>
                <a href="action_approve_hr.php?detail=1&id_detail=<?php echo $res['lea_id']; ?>"   data-toggle="modal"  data-target="#myModal<?php echo $res['lea_id']; ?>" class="btn btn-info  btn-xs" >รายละเอียด</a>
                <div class="modal fade" id="myModal<?php echo $res['lea_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"></div>
                    </div>
                </div>
            </td>
            <td>
                 <?php 
                if ($res['hr_approve'] == '0') {
                    echo "รอดำเนินการ";
                }else if ($res['hr_approve'] == '1') {
                    echo "อนุมัติแล้ว";
                }else if ($res['hr_approve'] == '2') {
             ?>
              <a href="action_approve_hr.php?app_detail=1&id_app_detail=<?php echo $res['lea_id']; ?>"   data-toggle="modal"  data-target="#myModal<?php echo $res['lea_id']; ?>" class="btn btn-danger      btn-xs" >ไม่อนุมัติ</a>
            <div class="modal fade" id="myModal<?php echo $res['lea_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"></div>
                </div>
            </div>
             <?php } ?>
            </td>
            <td>
                <a href="show_approve_hr.php?chk=1&id_lea=<?php echo $res['lea_id']; ?>" class="btn btn-success btn-xs" <?php if($res['hr_approve']>=1 ){ echo "disabled"; } ?> >อนุมัติ</a>
                <a href="action_approve_hr.php?st=1&id_lea=<?php echo $res['lea_id']; ?>"   data-toggle="modal"  data-target="#myModalST<?php echo $res['lea_id']; ?>" class="btn btn-info  btn-xs" <?php if($res['hr_approve']>=1 ){ echo "disabled"; } ?>>ไม่อนุมัติ</a>
                <div class="modal fade" id="myModalST<?php echo $res['lea_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabelST" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content"></div>
                    </div>
                </div>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>


<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#dataTables-example').dataTable({
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

        });
    });
</script>
