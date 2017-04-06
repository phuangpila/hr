<?php
session_start();
include('include/connect.php');
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
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/dataTables/data_table.css">
    <link rel="stylesheet" type="text/css" href="assets/dataTables/data_table2.css">
    <script type="text/javascript" language="javascript" src="assets/dataTables/data_table_js.js"></script>
    <script type="text/javascript" language="javascript" src="assets/dataTables/data_table_js2.js"></script>
    <script type="text/javascript" language="javascript" src="assets/dataTables/data_table_js3.js"></script>
    <style type="text/css">
        .panel-default > .panel-heading {
            color: #FFFFFF;
            background-color: #424A5D;
            border-color: #FFFFFF;
        }

        .scroll-wrapper {
            width: 2010px;
            white-space: nowrap;
            overflow-x: scroll;
        }

        th {
            white-space: nowrap;
        }

        td {
            white-space: nowrap;
        }
    </style>
    <style>
        .header{
            background-color: #2FB8FC;
        }
        ul.top-menu > li > .logout{
            background-color: palevioletred;
        }
    </style>
</head>

<body>
<section id="container">
    <!--header start-->
    <header class="header black-bg">
        <!--logo start-->
        <a href="#" class="logo"><b>Bizpotentail</b></a>
        <!--logo end-->


    </header>
    <!--header end-->
    <style type="text/css">

    </style>


    <section class="wrapper">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-12">
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">รายงานการลา</div>
                    <?php
                    $fitter = "";
                    if ($_GET['type'] != "0") {
                        $fitter .= " AND lea_type ='" . $_GET['type'] . "' ";
                    }
                    if ($_GET['d_start'] != "") {
                        $fitter .= " AND lea_start >='" . $_GET['d_start'] . "' ";
                    }
                    if ($_GET['d_end'] != "") {
                        $fitter .= " AND lea_end <='" . $_GET['d_end'] . "' ";
                    }
                    if ($_GET['show'] == '1') {
                        $sql_ty=mysql_query("SELECT * FROM  tb_type_leave WHERE type_id='" . $_GET['type'] . "'");
                        $res_ty=mysql_fetch_array($sql_ty);
                        ?>
                        <h4 align="center">ประเภทการลา <?php if($res_ty['type_name']==""){ echo "ทั้งหมด"; }else{ echo $res_ty['type_name']; } ?></h4>
                       <h4 align="center">วันที่ <?php echo $_GET['d_start']." ถึงวันที่ ".$_GET['d_end']; ?></h4>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="text-align:center">ลำดับที่</th>
                                        <th style="text-align:center">ชื่อผู้ลา</th>
                                        <th style="text-align:center">ประเภทการลา</th>
                                        <th style="text-align:center">จำนวนวันลา</th>
                                        <th style="text-align:center">วันที่ขอลา</th>
                                        <th style="text-align:center">ลาตั้งแต่วันที่ - ถึงวันที่</th>
                                        <th style="text-align:center">หมายเหตุ</th>
                                        <th style="text-align:center">หัวหน้าแผนกอนุมัติ</th>
                                        <th style="text-align:center">หัวหน้าโครงการอนุมัติ</th>
                                        <th style="text-align:center">ฝ่ายบุคคลอนุมัติ</th>
                                        <th style="text-align:center">รายละเอียดเอกสารการลา</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $i = 1;
                                    $sql_lea = mysql_query("SELECT * FROM tb_leave WHERE 1=1 $fitter");
                                    while ($res_lea = mysql_fetch_array($sql_lea)) {
                                        ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $i; ?></td>
                                            <td style="text-align:center"><?php
                                                $sql_u = mysql_query("SELECT name,shot_name FROM tb_user WHERE id_user='" . $res_lea['id_user'] . "' ");
                                                $res_u = mysql_fetch_array($sql_u);
                                                echo $res_u['name'] . " (" . $res_u['shot_name'] . ") ";
                                                ?></td>
                                            <td style="text-align:center"><?php
                                                $sql_t = mysql_query("SELECT type_name FROM tb_type_leave WHERE type_id='" . $res_lea['lea_type'] . "' ");
                                                $res_t = mysql_fetch_array($sql_t);
                                                echo $res_t['type_name']; ?></td>
                                            <td style="text-align:center"><?php echo $res_lea['lea_unit']; ?></td>
                                            <td style="text-align:center"><?php echo $res_lea['lea_start'] . " - " . $res_lea['lea_end']; ?></td>
                                            <td style="text-align:center"><?php echo $res_lea['time_reg']; ?></td>
                                            <td style="text-align:center"><?php echo $res_lea['lea_comment']; ?></td>
                                            <td style="text-align:center"><?php
                                                if ($res_lea['ma_approve'] == '1') {
                                                    echo "อนุมัติแล้ว";
                                                } else if ($res_lea['ma_approve'] == '0') {
                                                    echo "รออนุมัติ";
                                                } else if ($res_lea['ma_approve'] == '2') {
                                                    echo "ไม่อนุมัติ";
                                                }
                                                ?></td>
                                            <td style="text-align:center"><?php
                                                if ($res_lea['pro_approve'] == '1') {
                                                    echo "อนุมัติแล้ว";
                                                } else if ($res_lea['pro_approve'] == '0') {
                                                    echo "รออนุมัติ";
                                                } else if ($res_lea['pro_approve'] == '2') {
                                                    echo "ไม่อนุมัติ";
                                                }
                                                ?></td>
                                            <td style="text-align:center"><?php
                                                if ($res_lea['hr_approve'] == '1') {
                                                    echo "อนุมัติแล้ว";
                                                } else if ($res_lea['hr_approve'] == '0') {
                                                    echo "รออนุมัติ";
                                                } else if ($res_lea['hr_approve'] == '2') {
                                                    echo "ไม่อนุมัติ";
                                                }
                                                ?></td>

                                            <td style="text-align:center">
                                                <?php if ($res_lea['lea_file'] != '') { ?>
                                                    <a href="<?php echo $res_lea['lea_file']; ?>">ดาวน์โหลด(เอกสารประกอบการลา)</a>
                                                <?php } elseif ($res_lea['lea_file'] == '') {
                                                } ?>
                                            </td>
                                        </tr>
                                        <?php

                                        $i++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <! --/row -->
    </section>
    <?php
    include "footer.php";
    ?>


    <!-- js placed at the end of the document so the pages load faster -->
    <!--  <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
     -->
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

</body>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#dataTables-example').dataTable({
            "oLanguage": {
                "sProcessing": "กำลังดำเนินการ...",
                "sLengthMenu": "แสดง_MENU_ แถว",
                "sZeroRecords": "ไม่พบข้อมูล",
                "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
                "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                "sInfoPostFix": "",
                "sSearch": "ค้นหา:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "เิริ่มต้น",
                    "sPrevious": "ก่อนหน้า",
                    "sNext": "ถัดไป",
                    "sLast": "สุดท้าย"
                }
            }

        });
    });
</script>
</html>
