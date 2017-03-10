<?php 
include('include/db.php');
include('include/connect.php');
?>
<style type="text/css">
	.panel-default > .panel-heading {
  color: #FFFFFF;
  background-color: #424A5D;
  border-color: #FFFFFF;
}
</style>
<script>

	function list()
	{
		var leave = document.getElementById('type_leave').value;
		if(leave == '1'){
		 //document.getElementById("a").innerHTML = "You selected: " + leave;
		 document.getElementById('total_date') == '1';
		 		 }
	}
</script>
 <div class="panel panel-default" >
                <div class="panel-heading" >ข้อมูลการลา</div>
           
                  	<div class="panel-body">
							<a class="btn btn-success" data-toggle="modal" href='#modal-id'> ขอลา </a>
						</div><br>		
						     <p id="a"></p>		
                  		<table class="table table-striped table-advance table-hover " width="100%">                    
	                    	<thead>
	                          <tr>
	                          </tr>
	                        </thead>
	                        <tbody>
	                        </tbody>
                		</table>           
</div>

<form action="#" method="post">
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">แบบฟอร์มการขอลา</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<table align="center">
							<tr>
								<td>ประเภทการลา : </td>
								<td colspan="4">
									<select name="type_leave" id="type_leave" class="form-control"	onchange="list()">
									<option value="">เลือก</option>
									<?php 
									echo $s;
									$query = mysql_query("SELECT * FROM tb_type_leave");
									while($res_lea = mysql_fetch_array($query)) {
									?>
									<option value="<?php echo $res_lea['type_id']; ?>"><?php echo $res_lea['type_name']; ?></option>
									<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td>จำนวนวันที่ขอลา : </td>
								<td>
									<select name="total_date" id="total_date" class="form-control">
										<option value=""></option>
									</select>
								</td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td>เริ่มวันที่ : </td>
		 						<td><input type="date" name="" id="" value="" class="form-control"></td>
		 						<td>&nbsp;&nbsp;</td>
		 						<td>ถึง : </td>
		 						<td><input type="date" name="" id="" value="" class="form-control"></td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td>หมายเหตุ : </td>
		 						<td colspan="4"><textarea name="" id="" class="form-control"></textarea></td>
							</tr>
							<tr>
								<td>&nbsp;&nbsp;</td>
								<td>&nbsp;&nbsp;</td>
							</tr>
							<tr>
								<td>แนบไฟล์ : </td>
		 						<td><input type="file" name=""></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">บันทึก</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
				</div>
			</div>
		</div>
	</div>
</form>
