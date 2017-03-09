<?php 
if($_GET['up']==1){
 ?>
								<div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabelD">แก้ไข้</h4>
						      </div>
						      <div class="modal-body">
						       
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary">Save changes</button>
						      </div>
<?php
	}else if($_GET['detail']==1){
?>
<div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">รายละเอียดจำนวนวันลา (MM)</h4>
						      </div>
						      <div class="modal-body">
						       		<div class="alert alert-success">อายุงาน 1 ปี 10 เดือน 11 วัน</div>
						       		<style>
						       		
						       		</style>
				<table border='0'  width="100%">
				<tr>
						<td width="25%" align="right" valign="top" >
							<label class=" control-label">ลาป่วย</label>
						</td>
						<td width="15%" align="left" valign="top">
							<input type="text" class="form-control round-form"><br>
				  </td>
				  <td width="60%" valign="top" align="left"> *ปีหนึ่งไม่เกิน 30 วันทำงาน  </td>
  </tr>
					<tr>
						<td align="right" valign="top">
							<label class="control-label">ลากิจ</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form"><br>
					  </td>
					  <td valign="top" align="left">* ตั้งแต่ 1 ปี ขึ้นไป แต่ไม่ถึง 3 ปี ลาได้ 6 วัน<br>ตั้งแต่ 3 ปี ขึ้นไป แต่ไม่ถึง 5 ปี ลาได้ 7 วัน<br>ตั้งแต่ 5 ปี ขึ้นไป  ลาได้ 8 วัน</td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาคลอด</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form"><br>
					  </td>
					  <td valign="top" align="left">* ลาได้ 90 วัน</td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาเพื่อรับราชการทหาร</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form"><br>
					  </td>
					  <td valign="top" align="left">* ลาได้ตามหมายเรียกตัว</td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาเพื่อทำหมัน</label>
						</td>
						<td align="left" valign="top" >
							<input type="text" class="form-control round-form"><br>
					  </td>
					  <td valign="top" align="left">* ตามระยะเวลาที่แพทย์ออกใบรับรอง</td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาเพื่ออุปสมบท</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form"><br>
					  </td>
					  <td valign="top" align="left">* ลาได้ไม่เกิน 30 วัน </td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาอื่นๆ</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form"><br>
					  </td>
					  <td valign="top" align="left"></td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาเช้า</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form"><br>
					  </td>
					  <td valign="top" align="left">* คิดจากจำนวนวันลากิจ</td>
  </tr>
					<tr>
						<td align="right" valign="top" style="vertical-align: text-top;">
							<label class=" control-label">ลาบ่าย</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form" ><br>
					  </td>
					  <td valign="top" align="left">* คิดจากจำนวนวันลากิจ</td>
  </tr>
</table>
                              

						      </div><!--endbody-->	
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary">Save changes</button>
						      </div>
<?php
}
?>