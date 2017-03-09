<?php
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ระบบ HR</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
  </head>

  <body>
  <section id="container" >
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="ย่อเมนู"></div>
              </div>
            <!--logo start-->
            <a href="header.php" class="logo"><b>Bizpotentail</b></a>
            <!--logo end-->

            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
<style type="text/css">

</style>
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/biz.jpg" class="img-circle" width="60"></a></p>

              	  <h5 class="centered"><?php echo $_SESSION["name"] ?></h5>
              	  	
                  <li class="mt">
                      <a <?php if($_GET['menu']=='pro'){ echo 'class="active"'; } ?> href="header.php?menu=pro">
                          <i class="fa fa-user"></i>
                          <span>ข้อมูลส่วนตัว</span>
                      </a>
                  </li>

                  <li class="sub-menu">
              <a <?php if($_GET['menu']=='per'){ echo 'class="active"'; } ?> href="header.php?menu=per" >
                          <i class="fa fa-users"></i>
                          <span>จัดการข้อมูลพนักงาน</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a <?php if($_GET['menu']=='pos'){ echo 'class="active"'; } ?> href="header.php?menu=pos" >
                          <i class="fa fa-database"></i>
                          <span>จัดการข้อมูลตำแหน่ง</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a <?php if($_GET['menu']=='dep'){ echo 'class="active"'; } ?> href="header.php?menu=dep" >
                          <i class="fa fa-bar-chart-o"></i>
                          <span>จักการข้อมูลแผนก</span>
                      </a>
                  </li>
                   <li class="sub-menu">
                      <a <?php if($_GET['menu']=='project'){ echo 'class="active"'; } ?> href="header.php?menu=project" >
                          <i class="fa fa-sitemap"></i>
                          <span>จัดการโครงการ</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a <?php if($_GET['menu']=='type_leave'){ echo 'class="active"'; } ?> href="header.php?menu=type_leave" >
                          <i class="fa fa-edit"></i>
                          <span>ประเภทการลา</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a <?php if($_GET['menu']=='approve'){ echo 'class="active"'; } ?> href="header.php?menu=approve" >
                          <i class="fa fa-book"></i>
                          <span>อนุมัติการลา <span class="badge bg-important bg-theme">4</span></span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a <?php if($_GET['menu']=='leave'){ echo 'class="active"'; } ?> href="header.php?menu=leave" >
                          <i class="fa fa-calendar"></i>
                          <span>ขอลา</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
   <section id="main-content">
          <section class="wrapper">
           <div class="row">  
                  <div class="col-lg-12 main-chart">
    
<?php
if($_GET['menu']=='pos'){
  include("show_position.php");
}else if($_GET['menu']=='dep'){
  include("show_department.php");
}else if($_GET['menu']=='pro'){
  include("show_profile.php");
}else if($_GET['menu']=='per'){
  include("show_personnel.php");
}else if($_GET['menu']=='leave'){
  include("show_leave.php");
}else if($_GET['menu']=='project'){
  include("show_project.php");
}else if($_GET['menu']=='type_leave'){
  include("show_type_leave.php");
}else if($_GET['menu']=='approve'){
  include("show_approve.php");
}
?>
  </div> 
</div>    
<! --/row -->
          </section>
      </section>
<?php
      include "footer.php";
?>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	<?php
if($_SESSION["chk"] == '1'){
  ?>
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
           
            title: 'ยินดีต้อนรับ ',
            text: 'คุณ <?php echo $_SESSION["shot_name"] ?>',
          
            image: '',
          
            sticky: true,
          
            time: '',
        
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
	<?php 
$_SESSION["chk"]='0';

  } 
  ?>
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  </body>

</html>
