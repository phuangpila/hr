<?php
include('include/db.php');
include('include/connect.php');

if($_GET['in']==1){
	
	$pass_word="1234";
	$user_name=$_POST['username'];
		$login_check = hash('sha1', $pass_word.$user_name);
$data = array(
"id_number"=>$_POST['id_number'],
"name"=>$_POST['name'],
"shot_name"=>$_POST['shot_name'],
"user_name"=>$user_name,
"password"=>$login_check,
"id_position"=>$_POST['pos'],
"id_department"=>$_POST['dep'],
"sex"=>$_POST['sex'],
"start_work"=>$_POST['start_work'],
);
insert("tb_user",$data);
 header('refresh : 0.1; header.php?menu=per');	
}




if($_GET['insert']==1){
?>
<form name="form1" action="action_personnel.php?in=1" method="POST">
<div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabelin">เพิ่มข้อมูลพนักงาน</h4>
						      </div>
						      <div class="modal-body">
 <table width="50%" border="0" align="center">
   <tr>
    <td align="right">รหัส :</td>
    <td><input type="text" name="id_number" id="id_number" class="form-control"></td>
  </tr>
   <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ชื่อ-นามสกุล :</td>
    <td><input type="text" name="name" id="name" class="form-control"></td>
  </tr>
   <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ชื่อย่อ :</td>
    <td><input type="text" name="shot_name" id="shot_name" class="form-control"></td>
  </tr>
   <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Username :</td>
    <td><input type="text" name="username" id="username" class="form-control"></td>
  </tr>
   <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ตำแหน่ง :</td>
    <td>
    <select name="pos" id="pos" class="form-control">
    <option value="0">-- เลือกตำแหน่ง --</option>
     <?php
    $sql_pos=mysql_query("SELECT * FROM tb_position");
    while($res_pos=mysql_fetch_array($sql_pos)){
    ?>
    <option value="<?php echo $res_pos['po_id']; ?>"><?php echo $res_pos['po_name']; ?></option>
    <?php
	}
    ?>
    </select>
    </td>
  </tr>
   <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">แผนก :</td>
    <td>
    <select name="dep" id="dep" class="form-control">
    <option value="0">-- เลือกแผนก --</option>
     <?php
    $sql_dep=mysql_query("SELECT * FROM tb_department");
    while($res_dep=mysql_fetch_array($sql_dep)){
    ?>
    <option value="<?php echo $res_dep['dep_id']; ?>"><?php echo $res_dep['dep_name']; ?></option>
    <?php
	}
    ?>
    </select>
    </td>
  </tr>
   <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">เพศ :</td>
    <td>
    <select name="sex" id="sex" class="form-control">
    <option value="0">-- เลือกเพศ --</option>
    <option value="1">ชาย</option>
    <option value="2">หญิง</option>
    </select>
    </td>
  </tr>
   <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">วันที่เริ่มงาน :</td>
    <td><input type="date" name="start_work" id="start_work" class="form-control"></td>
  </tr>
</table>

                          
						      </div>
						      <div class="modal-footer">
						      <button type="submit" class="btn btn-success">บันทึก</button>
						        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
						        
						      </div>
	</form>
<?php 
}else if($_GET['up']==1){
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
					  <td valign="top" align="left">* *ปีหนึ่งไม่เกิน 6 วันทำงาน</td>
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
  <tr>
						<td align="right" valign="top">
							<label class="control-label">ลาหยุดพักผ่อนประจำปี</label>
						</td>
						<td align="left" valign="top">
							<input type="text" class="form-control round-form"><br>
					  </td>
					  <td valign="top" align="left">* ตั้งแต่ 1 ปี ขึ้นไป แต่ไม่ถึง 3 ปี ลาได้ 6 วัน<br>ตั้งแต่ 3 ปี ขึ้นไป แต่ไม่ถึง 5 ปี ลาได้ 7 วัน<br>ตั้งแต่ 5 ปี ขึ้นไป  ลาได้ 8 วัน</td>
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