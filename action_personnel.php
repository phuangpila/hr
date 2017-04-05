  <?php
  include('include/db.php');
  include('include/connect.php');
  error_reporting(0);
  if($_GET['in']==1){
  	$st_hr;
  	$pass_word="1234";
  	$user_name=$_POST['username'];
  		$login_check = hash('sha1', $pass_word.$user_name);

      if($_POST['dep']=='1'){
          $st_hr='Y';
      }
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
    "status_boss"=>$_POST['status_boss'],
    "status_hr"=>$st_hr,
  );
  insert("tb_user",$data);
   header('refresh : 0.1; header.php?menu=per');	
  }

  if($_POST['update_lea']==1){

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

   }
    if($_POST['update']==1){

    $data = array(
    "id_number"=>$_POST['id_number'],
    "name"=>$_POST['name'],
    "shot_name"=>$_POST['shot_name'],
    //"user_name"=>$user_name,
    "id_position"=>$_POST['pos'],
    "id_department"=>$_POST['dep'],
    "sex"=>$_POST['sex'],
    "start_work"=>$_POST['start_work'],
    "status_boss"=>$_POST['status_boss'],
  );

  update("tb_user",$data,"id_user = '".$_POST['id']."' ");
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
          <td align="right">รหัสพนักงาน :</td>
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
          <td align="right">สถานะหัวหน้าแผนก : </td>
          <td>
          <input type="radio" name="status_boss" value="N" checked> ไม่เป็นหัวหน้า
    <input type="radio" name="status_boss" value="Y"> เป็นหัวหน้า</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right">เพศ :</td>
          <td><select name="sex" id="sex" class="form-control">
              <option value="0">-- เลือกเพศ --</option>
              <option value="1">ชาย</option>
              <option value="2">หญิง</option>
            </select></td>
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
   <form action="action_personnel.php" method="post" name="form1">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabelD">แก้ไข้ข้อมูลพนักงาน</h4>
  </div>
  <div class="modal-body"> 
      <table width="500" border="0" align="center">
      <?php 
        $query_show = mysql_query("select * from tb_user where id_user = '".$_GET['id_up']."'");
        $res_show = mysql_fetch_array($query_show);
       ?>
        <tr>
          <td align="center">รหัสพนักงาน :</td>
         <input type="hidden" name="update" id="" value="1" class="form-control"> 
         <input type="hidden" name="id" id="" value="<?php echo $_GET['id_up'];?>" class="form-control">
          <td><input type="text" name="id_number" id="id_number" class="form-control" value="<?php echo $res_show['id_number']; ?>"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center">ชื่อ-นามสกุล :</td>
          <td><input type="text" name="name" id="name" class="form-control" value="<?php echo $res_show['name']; ?>"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center">ชื่อย่อ :</td>
          <td><input type="text" name="shot_name" id="shot_name" class="form-control" value="<?php echo $res_show['user_name']; ?>"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
<!--         <tr>
  <td align="center">Username :</td>
  <td><input type="text" name="username" id="username" class="form-control" value="<?php echo $res_show['shot_name']; ?>"></td>
</tr> -->
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center">ตำแหน่ง :</td>
          <td><select name="pos" id="pos" class="form-control">
              <option value="0">-- เลือกตำแหน่ง --</option>
              <?php
      $sql_pos=mysql_query("SELECT * FROM tb_position");
      while($res_pos=mysql_fetch_array($sql_pos)){
      ?>
              <option value="<?php echo $res_pos['po_id']; ?>" <?php if ($res_pos['po_id'] == $res_show['id_position']) { echo "selected"; } ?>><?php echo $res_pos['po_name']; ?></option>
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
          <td align="center">แผนก :</td>
          <td><select name="dep" id="dep" class="form-control">
              <option value="0">-- เลือกแผนก --</option>
              <?php
      $sql_dep=mysql_query("SELECT * FROM tb_department");
      while($res_dep=mysql_fetch_array($sql_dep)){
      ?>
              <option value="<?php echo $res_dep['dep_id']; ?>" <?php if ($res_dep['dep_id'] == $res_show['id_department']) { echo "selected";} ?>><?php echo $res_dep['dep_name']; ?></option>
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
          <td align="center">สถานะหัวหน้าแผนก : </td>
           <?php 
            if ($res_show['status_boss'] == 'Y') {
           ?>
          <td>
          <input type="radio" name="status_boss" value="N" > ไม่เป็นหัวหน้า
          </td>
          <td>
          <input type="radio" name="status_boss" value="Y" checked> เป็นหัวหน้า
          </td>
          <?php }elseif ($res_show['status_boss'] == 'N') {
           ?>
          <td>
          <input type="radio" name="status_boss" value="N" checked> ไม่เป็นหัวหน้า
          </td>
          <td> <input type="radio" name="status_boss" value="Y" > เป็นหัวหน้า</td>
         
          <?php } ?>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center">เพศ :</td>
          <td><select name="sex" id="sex" class="form-control">
              <option value="0">-- เลือกเพศ --</option>
              <?php if ($res_show['sex'] == 1) { ?>
              <option value="1" selected>ชาย</option>
              <option value="2">หญิง</option>
              <?php }elseif ($res_show['sex'] == 2) { ?>
               <option value="1">ชาย</option>
              <option value="2" selected>หญิง</option>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center">วันที่เริ่มงาน :</td>
          <td><input type="date" name="start_work" id="start_work" class="form-control" value="<?php echo $res_show['start_work']; ?>"></td>
        </tr>
      </table>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-success">บันทึก</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
  </div>
  </form>
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
          <td>จำนวนที่ลา</td>
          <td>จำนวนที่เหลือ</td>
          <td align="right"><a class="btn btn-warning btn-xs" onclick="textUnlock()"><i class="fa fa-pencil"></i></a></td>
        </tr>
        <tr>
          <td width="25%" align="right" ><label class=" control-label">ลาป่วย : </label></td>
          <td width="15%"><input type="text" class="form-control round-form" name="show_lea_1" id="show_lea_1" disabled="true" value=""></td>
          <td width="15%" align="left"><input type="text" class="form-control round-form" name="lea_sick" id="lea_sick" disabled="true" value="<?php echo $res['lea_sick'];?>">
            <input type="hidden" name="update_lea" id="" value="1" class="form-control">
            <input type="hidden" name="id" id="" value="<?php echo $_GET['id_detail'];?>" class="form-control"></td>
          <td width="45%" align="left"> * ปีหนึ่งไม่เกิน 30 วันทำงาน </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right"><label class="control-label">ลากิจ : </label></td>
          <td><input type="text" class="form-control round-form" name="show_lea_2" id="show_lea_2" disabled="true" value=""></td>
          <td align="left"><input type="text" class="form-control round-form" name="lea_work" id="lea_work" disabled="true" value="<?php echo $res['lea_work'];?>"></td>
          <td align="left"> * ปีหนึ่งไม่เกิน 6 วันทำงาน</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right" ><label class=" control-label">ลาคลอด : </label></td>
          <td><input type="text" class="form-control round-form" name="show_lea_3" id="show_lea_3" disabled="true" value=""></td>
          <td align="left"><input type="text" class="form-control round-form" name="lea_birth" id="lea_birth" disabled="true" value="<?php echo $res['lea_birth'];?>"></td>
          <td align="left"> * ลาได้ 90 วัน</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right" ><label class=" control-label">ลาเพื่อรับราชการทหาร : </label></td>
          <td><input type="text" class="form-control round-form" name="show_lea_4" id="show_lea_4" disabled="true" value=""></td>
          <td align="left"><input type="text" class="form-control round-form" name="lea_soldier" id="lea_soldier" disabled="true" value="<?php echo $res['lea_soldier'];?>"></td>
          <td align="left"> * ลาได้ตามหมายเรียกตัว</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right" ><label class=" control-label">ลาเพื่อทำหมัน : </label></td>
          <td><input type="text" class="form-control round-form" name="show_lea_5" id="show_lea_5" disabled="true" value=""></td>
          <td align="left" ><input type="text" class="form-control round-form" name="lea_sterile" id="lea_sterile" disabled="true" value="<?php echo $res['lea_sterile'];?>"></td>
          <td align="left"> * ตามระยะเวลาที่แพทย์ออกใบรับรอง</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right" ><label class=" control-label">ลาเพื่ออุปสมบท : </label></td>
          <td><input type="text" class="form-control round-form" name="show_lea_6" id="show_lea_6" disabled="true" value=""></td>
          <td align="left"><input type="text" class="form-control round-form" name="lea_ordain" id="lea_ordain" disabled="true" value="<?php echo $res['lea_ordain'];?>"></td>
          <td align="left"> * ลาได้ไม่เกิน 30 วัน </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right" ><label class=" control-label">ลาอื่นๆ : </label></td>
          <td><input type="text" class="form-control round-form" name="show_lea_7" id="show_lea_7" disabled="true" value=""></td>
          <td align="left"><input type="text" class="form-control round-form" name="lea_other" id="lea_other" disabled="true" value="<?php echo $res['lea_other'];?>"></td>
          <td align="left"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right"><label class="control-label">ลาหยุดพักผ่อนประจำปี : </label></td>
          <td><input type="text" class="form-control round-form" name="show_lea_8" id="show_lea_8" disabled="true" value=""></td>
          <td align="left"><input type="text" class="form-control round-form" name="lea_relax" id="lea_relax" disabled="true" value="<?php echo $res['lea_relax'];?>"></td>
          <td align="left"> * ตั้งแต่ 1 ปี ขึ้นไป แต่ไม่ถึง 3 ปี ลาได้ 6 วัน<br>
            ตั้งแต่ 3 ปี ขึ้นไป แต่ไม่ถึง 5 ปี ลาได้ 7 วัน<br>
            ตั้งแต่ 5 ปี ขึ้นไป  ลาได้ 8 วัน</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right" ><label class=" control-label">ลาเช้า : </label></td>
          <td><input type="text" class="form-control round-form" name="show_lea_9" id="show_lea_9" disabled="true" value=""></td>
          <td align="left"><input type="text" class="form-control round-form" name="lea_morning" id="lea_morning" disabled="true" value="<?php echo $res['lea_morning'];?>"></td>
          <td align="left"> * คิดจากจำนวนวันลากิจ</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right" style="vertical-align: text-top;"><label class=" control-label">ลาบ่าย : </label></td>
          <td><input type="text" class="form-control round-form" name="show_lea_10" id="show_lea_10" disabled="true" value=""></td>
          <td align="left"><input type="text" class="form-control round-form" name="lea_afternoon" id="lea_afternoon" disabled="true" value="<?php echo $res['lea_afternoon'];?>"></td>
          <td align="left"> * คิดจากจำนวนวันลากิจ</td>
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
