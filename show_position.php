<?php
include ("header.php");
include('include/db.php');
include('include/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="row-fuild">
		<hr>
		<div class="col-md-12">

            <div class="panel panel-primary" >
                <div class="panel-heading" >ตารางข้อมูลตำแหน่งพนักงาน</div>
                  	<div class="panel-body">
                  		<div>
							<button class="btn btn-success" onclick="popup('../hr/insert_position.php?in=1','mywindow','800','400');">เพิ่มข้อมูล</button>
						</div><br>					

                  		<table class="table table-striped table-advance table-hover " width="100%">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>ตำแหน่ง</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <?php 
	                        	$i=1;
	                        	$query_po = mysql_query("SELECT * FROM tb_position");
	                        	while ($res_po = mysql_fetch_array($query_po)) {
	                        	
	                        	
	                         ?>
	                        <tbody>
								<td><?php echo $i++; ?></td>
								<td><?php echo $res_po['po_name']; ?></td>
								<td width="20%">
									<button class="btn btn-warning" onclick="popup('../hr/insert_position.php?up=1&idup=<?php echo $res_po['po_id']; ?>','mywindow','800','400');">แก้ไข</button>
									<button class="btn btn-danger" onclick="confirmDelete('insert_position.php?del=<?php echo $res_po['po_id']; ?>')">ลบ
									</button>
								</td>
	                        </tbody>
	                        <?php } ?>
                		</table>           
                  	</div>
            </div>
        </div>
	</div>
</body>
</html>