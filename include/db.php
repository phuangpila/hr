<?php 

 include('include/connect.php');

//ฟังก์ชั่น insert การใช้งาน

/*	$data = array(
"type_name"=>$_POST["type"],
);
insert("tb_typepro",$data);*/

function insert($table,$data,$id="") {

$fields=""; $values="";

$i=1;

foreach($data as $key=>$val)

{

if($i!=1) { $fields.=", "; $values.=", "; }

$fields.="$key";

$values.="'$val'";

$i++;

}

$sql = "INSERT INTO $table ($fields) VALUES ($values)";

if(mysql_query($sql)) { 
    return true; 
}
else { die("SQL Error: ".$sql."".mysql_error()); return false;}

}


//ฟังก์ชั่น update การใช้งาน

/*$newdata = array(

"field1"=>"newvalue1",

"field2"=>"newvalue2",

"field3"=>"newvalue3",

);

update("mytable",$newdata,"myfieldid = 1");*/

 function update($table,$data,$where) {

$modifs="";

$i=1;

foreach($data as $key=>$val)

{

if($i!=1) { $modifs.=", "; }

if(is_numeric($val)) { $modifs.=$key.'='.$val; }

else { $modifs.=$key.' = "'.$val.'"'; }

$i++;

}

$sql = ("UPDATE $table SET $modifs WHERE $where");

if(mysql_query($sql)) { return true; }

else { die("SQL Error: ".$sql."".mysql_error()); return false; }

}


//ฟังก์ชั่น delete
/*delete("mytable","myfieldid = 1");*/
 function delete($table, $where) {

$sql = "DELETE FROM $table WHERE $where";

if(mysql_query($sql)) { return true; }

else { die("SQL Error: ".$sql."".mysql_error()); return false; }

}

function DateThai($strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
  }
  function DateThaiTime($strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear,$strHour:$strMinute";
  }

 ?>
<script type="text/javascript">
	function popup(url, title, w, h) {  
    // Fixes dual-screen position                         Most browsers      Firefox  
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;  
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;  
              
    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;  
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;  
              
    var left = ((width / 2) - (w / 2)) + dualScreenLeft;  
    var top = ((height / 2) - (h / 2)) + dualScreenTop;  
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);  
  
    // Puts focus on the newWindow  
    if (window.focus) {  
        newWindow.focus();  
    }  
} 
function confirmDelete(delUrl) {
  if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
   document.location = delUrl;
  }
}

  function confirmStatus(stUrl) {
  if (confirm("คุณต้องยืนยันการรับสินค้าหรือไม่")) {
   document.location = stUrl;
  }
}
</script>
<style type="text/css">
    input[type="number"] {
   width:50px;
}
</style>