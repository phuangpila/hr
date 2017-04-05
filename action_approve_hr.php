<?php
session_start();
error_reporting(0);
include('include/db.php');
include('include/connect.php');

if ($_GET['c'] == '1') {
    $date = date("Y-m-d");
    $sql_c=mysql_query("SELECT * FROM tb_leave WHERE lea_id='".$_POST['id_lea']."' ");
    $res_c=mysql_fetch_array($sql_c);

        $data = array(
            "lea_comment_hr"=>$_POST['comment'],
            "hr_approve"=>"2",
            "date_approve_hr"=>$date,
        );

        update("tb_leave",$data,"lea_id = '".$_POST['id_lea']."' ");


    header('refresh : 0.1; header.php?menu=approve_hr');
}

if ($_GET['detail'] == '1') {
    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">รายละเอียดการลา</h4>
    </div>
    <div class="modal-body">
        <?php
        $sql=mysql_query("SELECT * FROM tb_leave WHERE lea_id='".$_GET['id_detail']."' ");
        $res=mysql_fetch_array($sql);

        $sql_u=mysql_query("SELECT * FROM tb_user WHERE id_user='".$res['id_user']."' ");
        $res_u=mysql_fetch_array($sql_u);
        ?>
        <table align="center">
            <tr>
                <td style="text-align: right">ชื่อ : </td>
                <td><?php echo $res_u['name']; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: right">จำนวนวันที่ลา : </td>
                <td><?php echo $res['lea_unit']; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: right">วันที่ขอใบลา : </td>
                <td><?php echo $res['lea_request']; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: right">หมายเหตุ : </td>
                <td><?php echo $res['lea_comment']; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: right">วันที่ลาจาก-ถึง : </td>
                <td><?php echo $res['lea_start']." - ".$res['lea_end']; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: right">ไฟล์ : </td>
                <td> <?php if ($res['lea_file'] != '') { ?>
                    <a href="<?php echo $res['lea_file']; ?>">ดาวน์โหลด(เอกสารประกอบการลา)</a>
                    <?php }elseif ($res['lea_file'] == '') {
                    } ?></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
    </div>
    <?php
}
if ($_GET['st'] == '1') {
    ?>
    <form action="action_approve_hr.php?c=1" method="post">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabelST">เหตุผลที่ไม่อนุมัติ</h4>
    </div>
    <div class="modal-body">

            <textarea name="comment" class="form-control"></textarea>
            <input type="hidden" name="id_lea" value="<?php echo $_GET['id_lea']; ?>">
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">บันทึก</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
    </div>
    </form>
    <?php
}
?>