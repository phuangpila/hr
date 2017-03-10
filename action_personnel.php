<?php 

error_reporting(0);
include('include/db.php');
include('include/connect.php');

if($_POST['update']==1){

	$data = array(
	"lea_sick"=>$_POST["lea_sick"],
	"lea_work"=>$_POST["lea_work"],
	"lea_birth"=>$_POST["lea_birth"],
	"lea_soldier"=>$_POST["lea_soldier"],
	"lea_sterile"=>$_POST["lea_sterile"],
	"lea_ordain"=>$_POST["lea_ordain"],
	"lea_other"=>$_POST["lea_other"],
	"lea_morning"=>$_POST["lea_morning"],
	"lea_afternoon"=>$_POST["lea_afternoon"],
	"lea_relax"=>$_POST["lea_sick"],
);

update("tb_user",$data,"id_user = '".$_POST['id']."' ");
    header('refresh : 0.1; header.php?menu=per');

 }
 ?>

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
<form action="action_personnel.php" method="post">
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
							<input type="text" class="form-control round-form" name="lea_sick"><br>
							<input type="hidden" name="update" id="" value="1" class="form-control">
							<input type="hidden" name="id" id="" value="<?php echo $_GET['id_detail'];?>" class="form-control">	
				  </td>
				  <td width="60%" valign="top" align="left"> *ปีหนึ่งไม่เกิน 30 วันทำงาน  </td>
  </tr>
  <tr>
						<td align="right" valign="top">
							<label class="control-label">ลากิจ</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form" name="lea_work"><br>
					  </td>
					  <td valign="top" align="left">* *ปีหนึ่งไม่เกิน 6 วันทำงาน</td>
  </tr>
					
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาคลอด</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form" name="lea_birth"><br>
					  </td>
					  <td valign="top" align="left">* ลาได้ 90 วัน</td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาเพื่อรับราชการทหาร</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form" name="lea_soldier"><br>
					  </td>
					  <td valign="top" align="left">* ลาได้ตามหมายเรียกตัว</td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาเพื่อทำหมัน</label>
						</td>
						<td align="left" valign="top" >
							<input type="text" class="form-control round-form" name="lea_sterile"><br>
					  </td>
					  <td valign="top" align="left">* ตามระยะเวลาที่แพทย์ออกใบรับรอง</td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาเพื่ออุปสมบท</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form" name="lea_ordain"><br>
					  </td>
					  <td valign="top" align="left">* ลาได้ไม่เกิน 30 วัน </td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาอื่นๆ</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form" name="lea_other"><br>
					  </td>
					  <td valign="top" align="left"></td>
  </tr>
					<tr>
						<td align="right" valign="top" >
							<label class=" control-label">ลาเช้า</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form" name="lea_morning"><br>
					  </td>
					  <td valign="top" align="left">* คิดจากจำนวนวันลากิจ</td>
  </tr>
					<tr>
						<td align="right" valign="top" style="vertical-align: text-top;">
							<label class=" control-label">ลาบ่าย</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form" name="lea_afternoon"><br>
					  </td>
					  <td valign="top" align="left">* คิดจากจำนวนวันลากิจ</td>
  </tr>
  <tr>
						<td align="right" valign="top">
							<label class="control-label">ลาหยุดพักผ่อนประจำปี</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form" name="lea_relax"><br>
					  </td>
					  <td valign="top" align="left">* ตั้งแต่ 1 ปี ขึ้นไป แต่ไม่ถึง 3 ปี ลาได้ 6 วัน<br>ตั้งแต่ 3 ปี ขึ้นไป แต่ไม่ถึง 5 ปี ลาได้ 7 วัน<br>ตั้งแต่ 5 ปี ขึ้นไป  ลาได้ 8 วัน</td>
  </tr>
</table>
                              

						      </div><!--endbody-->	
						      <div class="modal-footer">					       
						        <button type="submit" class="btn btn-success">บันทึก</button>
						         <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
						      </div>
 </form>
<?php
}
?>