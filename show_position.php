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

                  		<table class="table-striped table-bordered" width="100%">                    
	                    	<thead>
	                          <tr>
	                            <th>ลำดับที่</th>
	                            <th>ตำแหน่ง</th>
								<th>Action</th>
	                          </tr>
	                        </thead>
	                        <tbody>

	                        </tbody>
	                        
                		</table>           
                  	</div>
            </div>
        </div>
	</div>
</body>
</html>