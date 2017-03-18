<?php
include('include/db.php');
include('include/connect.php');
error_reporting(0);
if($_GET['in']==1){
	
	$pass_word="1234";
	$user_name=$_POST['username'];
		$login_check = hash('sha1', $pass_word.$user_name);
$data = array(
	//"id_number"=>$_POST['id_number'],
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
}else if($_POST['update_lea']==1){

	$data = array(
	"lea_sick"=>$_POST["lea_sick"],
	"lea_work"=>$_POST["lea_work"],
	"lea_birth"=>$_POST["lea_birth"],
	"lea_soldier"=>$_POST["lea_soldier"],
	"lea_sterile"=>$_POST["lea_sterile"],
	"lea_ordain"=>$_POST["lea_ordain"],
	"lea_other"=>$_POST["lea_other"],
/*	"lea_morning"=>$_POST["lea_morning"],
	"lea_afternoon"=>$_POST["lea_afternoon"],*/
	"lea_relax"=>$_POST["lea_sick"],
);

update("tb_user",$data,"id_user = '".$_POST['id']."' ");
    header('refresh : 0.1; header.php?menu=per');

 }else if($_GET['del']){
  delete('tb_user','id_user= "'.$_GET['del'].'" ');
  echo "<script type='text/javascript'>alert('ลบข้อมูลเรียบร้อยแล้ว');window.location.href ='header.php?menu=per';</script>";
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
<!--       <tr>
  <td align="right">รหัส :</td>
  <td><input type="text" name="id_number" id="id_number" class="form-control"></td>
</tr> -->
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">ชื่อ-นามสกุล :</td>
        <td><input type="text" name="name" id="name" class="form-control" required=""></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">ชื่อย่อ :</td>
        <td><input type="text" name="shot_name" id="shot_name" class="form-control"  required=""></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">Username :</td>
        <td><input type="text" name="username" id="username" class="form-control"  required=""></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">ตำแหน่ง :</td>
        <td><select name="pos" id="pos" class="form-control">
            <option value="0">-- เลือกตำแหน่ง --</option>
            <?php
    $sql_pos=mysql_query("SELECT * FROM tb_position");
    while($res_pos=mysql_fetch_array($sql_pos)){
    ?>
            <option value="<?php echo $res_pos['po_id']; ?>"><?php echo $res_pos['po_name']; ?></option>
            <?php
	}
    ?>
          </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">แผนก :</td>
        <td><select name="dep" id="dep" class="form-control">
            <option value="0">-- เลือกแผนก --</option>
            <?php
    $sql_dep=mysql_query("SELECT * FROM tb_department");
    while($res_dep=mysql_fetch_array($sql_dep)){
    ?>
            <option value="<?php echo $res_dep['dep_id']; ?>"><?php echo $res_dep['dep_name']; ?></option>
            <?php
	}
    ?>
          </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">เพศ :</td>
        <td>
          <input type="radio" name="sex" id="sex" value="1">ชาย
         <input type="radio" name="sex" id="sex" value="2">หญิง
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
<div class="modal-body"> </div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button>
</div>
<?php
	}else if($_GET['detail']==1){
?>
<script>
function textUnlock() {
    document.getElementById("lea_sick").disabled = false;
    document.getElementById("lea_work").disabled = false;
    document.getElementById("lea_birth").disabled = false;
    document.getElementById("lea_soldier").disabled = false;
    document.getElementById("lea_sterile").disabled = false;
    document.getElementById("lea_ordain").disabled = false;
    document.getElementById("lea_other").disabled = false;
    document.getElementById("lea_morning").disabled = true;
    document.getElementById("lea_afternoon").disabled = true;
    document.getElementById("lea_relax").disabled = false;
     
}
</script>
<?php
	$sql_show_lea=mysql_query("SELECT * FROM tb_user WHERE id_user='".$_GET['id_detail']."' ");
	$res=mysql_fetch_array($sql_show_lea);

$sql_date=mysql_query("SELECT
start_work
    , TIMESTAMPDIFF( YEAR, start_work, now() ) as s_year
    , TIMESTAMPDIFF( MONTH, start_work, now() ) % 12 as s_month
    , FLOOR( TIMESTAMPDIFF( DAY, start_work, now() ) % 30.4375 ) as s_day FROM tb_user WHERE id_user='".$res['id_user']."'");
$res_date=mysql_fetch_array($sql_date);
?>

<form action="action_personnel.php" method="post">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">รายละเอียดจำนวนวันลา (<?php echo $res['name']." ".$res['shot_name'] ?>)</h4>
  </div>
  <div class="modal-body">
    <div class="alert alert-success">อายุงาน <?php echo $res_date['s_year'] ?> ปี <?php echo $res_date['s_month'] ?> เดือน <?php echo $res_date['s_day'] ?> วัน</div>
    <table border='0'  width="100%">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="right"><a class="btn btn-warning btn-xs" onclick="textUnlock()"><i class="fa fa-pencil"></i></a></td>
      </tr>
      <tr>
        <td width="25%" align="right"><label class=" control-label">ลาป่วย : </label></td>
        <td width="15%" align="left"><input type="text" class="form-control round-form" name="lea_sick" id="lea_sick" disabled="true" value="<?php echo $res['lea_sick'];?>">
          <input type="hidden" name="update_lea" id="" value="1" class="form-control">
          <input type="hidden" name="id" id="" value="<?php echo $_GET['id_detail'];?>" class="form-control"></td>
        <td width="60%" align="left" style="color: red;"> * ปีหนึ่งไม่เกิน 30 วันทำงาน </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right" ><label class="control-label">ลากิจ : </label></td>
        <td align="left"><input type="text" class="form-control round-form" name="lea_work" id="lea_work" disabled="true" value="<?php echo $res['lea_work'];?>"></td>
        <td align="left"  style="color: red;"> * ปีหนึ่งไม่เกิน 6 วันทำงาน</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><label class=" control-label">ลาคลอด : </label></td>
        <td align="left"><input type="text" class="form-control round-form" name="lea_birth" id="lea_birth" disabled="true" value="<?php echo $res['lea_birth'];?>"></td>
        <td align="left"  style="color: red;"> * ลาได้ 90 วัน</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right" ><label class=" control-label">ลาเพื่อรับราชการทหาร : </label></td>
        <td align="left"><input type="text" class="form-control round-form" name="lea_soldier" id="lea_soldier" disabled="true" value="<?php echo $res['lea_soldier'];?>"></td>
        <td align="left"  style="color: red;"> * ลาได้ตามหมายเรียกตัว</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right" ><label class=" control-label">ลาเพื่อทำหมัน : </label></td>
        <td align="left" ><input type="text" class="form-control round-form" name="lea_sterile" id="lea_sterile" disabled="true" value="<?php echo $res['lea_sterile'];?>"></td>
        <td align="left"  style="color: red;"> * ตามระยะเวลาที่แพทย์ออกใบรับรอง</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right" ><label class=" control-label">ลาเพื่ออุปสมบท : </label></td>
        <td align="left"><input type="text" class="form-control round-form" name="lea_ordain" id="lea_ordain" disabled="true" value="<?php echo $res['lea_ordain'];?>"></td>
        <td align="left"  style="color: red;"> * ลาได้ไม่เกิน 30 วัน </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right" ><label class=" control-label">ลาอื่นๆ : </label></td>
        <td align="left"><input type="text" class="form-control round-form" name="lea_other" id="lea_other" disabled="true" value="<?php echo $res['lea_other'];?>"></td>
        <td align="left"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><label class="control-label">ลาหยุดพักผ่อนประจำปี : </label></td>
        <td align="left"><input type="text" class="form-control round-form" name="lea_relax" id="lea_relax" disabled="true" value="<?php echo $res['lea_relax'];?>"></td>
        <td align="left"  style="color: red;"> * ตั้งแต่ 1 ปี ขึ้นไป แต่ไม่ถึง 3 ปี ลาได้ 6 วัน<br>
          ตั้งแต่ 3 ปี ขึ้นไป แต่ไม่ถึง 5 ปี ลาได้ 7 วัน<br>
          ตั้งแต่ 5 ปี ขึ้นไป  ลาได้ 8 วัน</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right" ><label class=" control-label">ลาเช้า : </label></td>
        <td align="left"><input type="text" class="form-control round-form" name="lea_morning" id="lea_morning" disabled="true" value="<?php echo $res['lea_morning'];?>"></td>
        <td align="left"  style="color: red;"> * คิดจากจำนวนวันลากิจ</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right" style="vertical-align: text-top;"><label class=" control-label">ลาบ่าย : </label></td>
        <td align="left"><input type="text" class="form-control round-form" name="lea_afternoon" id="lea_afternoon" disabled="true" value="<?php echo $res['lea_afternoon'];?>"></td>
        <td align="left"  style="color: red;"> * คิดจากจำนวนวันลากิจ</td>
      </tr>
     
    </table>
  </div>
  <!--endbody-->
  <div class="modal-footer">
    <button type="submit" class="btn btn-success">บันทึก</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal" >ปิด</button>
  </div>
</form>
<?php
}
?>
