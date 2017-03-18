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
  <div class="panel-heading" >ตารางข้อมูลการลา</div>
  <div class="panel-body"> <a href="action_leave.php"  data-toggle="modal"  data-target="#myModalin" class="btn btn-success  btn-sm" >เพิ่มข้อมูล</a>
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
        <th style="text-align:center">ลำดับที่</th>
        <th style="text-align:center">ประเภทการลา</th>
        <th style="text-align:center">จำนวนวันลา</th>
        <th style="text-align:center">วันที่ขอลา</th>
        <th style="text-align:center">ลาตั้งแต่วันที่ - ถึงวันที่</th>
        <th style="text-align:center">หัวหน้าแผนกอนุมัติ</th>
        <th style="text-align:center">หัวหน้าโครงการอนุมัติ</th>
        <th style="text-align:center">ฝ่ายบุคคลอนุมัติ</th>
        <th style="text-align:center">แนบเอกสารการลา</th>
        <th width="10%" style="text-align:center">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
        <td style="text-align:center"></td>
      </tr>
    </tbody>
  </table>
</div>

