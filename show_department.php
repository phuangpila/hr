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
                <div class="panel-heading" >ตารางข้อมูลแผนก</div>
                  	<div class="panel-body">
                  		<div>
							<button class="btn btn-success" onclick="popup('../hr/insert_department.php?in=1','mywindow','800','400');">เพิ่มข้อมูล</button>
						</div><br>					

                  		<table class="table table-striped table-advance table-hover " width="100%">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>แผนก</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <?php 
	                        	$i=1;
	                        	$query_de = mysql_query("SELECT * FROM tb_department");
	                        	while ($res_de = mysql_fetch_array($query_de)) {
	                        	
	                        	
	                         ?>
	                        <tbody>
								<td><?php echo $i++; ?></td>
								<td><?php echo $res_de['dep_name']; ?></td>
								<td width="20%">
									<button class="btn btn-warning" onclick="popup('../hr/insert_department.php?up=1&idup=<?php echo $res_de['dep_id']; ?>','mywindow','800','400');">แก้ไข</button>
									<button class="btn btn-danger" onclick="confirmDelete('insert_department.php?del=<?php echo $res_de['dep_id']; ?>')">ลบ
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