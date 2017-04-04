<?php
session_start();
error_reporting(0);
include('include/db.php');
include('include/connect.php');

if ($_GET['in'] == '1') {
    $date = date("Y-m-d");
    $data = array(
        "id_user" => $_SESSION["id"],
        "lea_unit" => $_POST["lea_unit"],
        "lea_request" => $date,
        "lea_type" => $_POST["lea_type"],
        "lea_comment" => $_POST["lea_comment"],
        "lea_start" => $_POST["lea_start"],
        "lea_end" => $_POST["lea_end"],
        "lea_head_ma" => $_POST["boss_dep"],
        "lea_head_pro" => $_POST["boss_pro"],
    );
    insert("tb_leave", $data);
    header('refresh : 0.1; header.php?menu=leave');
}

if ($_GET['insert'] == '1') {
    ?>
    <form name="form1" action="action_leave.php?in=1" method="POST">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabelin">เพิ่มข้อมูลการลา</h4>
        </div>
        <div class="modal-body">
            <table align="center" border="0">
                <tr>
                    <td>ประเภทการลา :</td>
                    <td colspan="4">
                        <select name="lea_type" id="lea_type" class="form-control">
                            <option value="">เลือก</option>
                            <?php
                            echo $s;
                            $query = mysql_query("SELECT * FROM tb_type_leave");
                            while ($res_lea = mysql_fetch_array($query)) {
                                ?>
                                <option value="<?php echo $res_lea['type_id']; ?>"><?php echo $res_lea['type_name']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>จำนวนวันที่ขอลา :</td>
                    <td>
                        <input type="number" name="lea_unit" class="form-control" min="1" max="90" style="width:100px;">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>เริ่มวันที่ :</td>
                    <td><input type="date" name="lea_start" id="lea_start" value="" class="form-control"></td>
                    <td>&nbsp;&nbsp;</td>
                    <td>ถึง :</td>
                    <td><input type="date" name="lea_end" id="lea_end" value="" class="form-control"></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>หมายเหตุ :</td>
                    <td colspan="4"><textarea name="lea_comment" id="lea_comment" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <?php
                    $sql_boss_dep = mysql_query("SELECT * FROM tb_user WHERE status_boss='Y' ");

                    ?>
                    <td>หัวหน้าแผนก :</td>
                    <td>
                        <select name="boss_dep" class="form-control">
                            <option value="0">เลือก</option>
                            <?php
                            while ($res = mysql_fetch_array($sql_boss_dep)) {
                                ?>
                                <option value="<?php echo $res['id_user']; ?>"><?php echo $res['name'] . " (" . $res['shot_name'] . ")"; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <?php
                    $sql_boss_pro = mysql_query("SELECT * FROM tb_user a INNER JOIN tb_user_project b ON a.id_user=b.id_user WHERE b.header='Y' ");
                    ?>
                    <td>หัวหน้าโครงการ :</td>
                    <td>
                        <select name="boss_pro" class="form-control">
                            <option value="0">เลือก</option>
                            <?php
                            while ($res_pro = mysql_fetch_array($sql_boss_pro)) {
                                ?>
                                <option value="<?php echo $res['id_user']; ?>"><?php echo $res_pro['name'] . " (" . $res_pro['shot_name'] . ")"; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">บันทึก</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        </div>
    </form>
    <?php
}
?>