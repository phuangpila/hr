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
    <div class="panel-heading" >รายงานการลา</div>
    <br>
    <form action="head.php" method="get" name="form1" target="_blank">
        <table border="0" align="center" >
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>ประเภทการลา : </td>
                <td>
                    <select name="type" class="form-control">
                        <option value="0">เลือกทั้งหมด</option>
                        <?php
                        $sql_type=mysql_query("SELECT * FROM tb_type_leave");
                        while($res_type=mysql_fetch_array($sql_type)) {
                            ?>
                            <option value="<?php echo $res_type['type_id']; ?>"><?php echo $res_type['type_name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>จากวันที่ : </td>
                <td><input type="date" name="d_start" class="form-control"></td>
                <td>&nbsp;</td>
                <td> ถึงวันที่ : </td>
                <td><input type="date" name="d_end" class="form-control"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="hidden" name="show" value="1" ></td>
                <td><input type="submit" name="" value="ค้นหา" class="btn btn-info"></td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </form>
    <br>
</div>
