<?php
include('include/db.php');
include('include/connect.php');

	         $query_po = mysql_query("SELECT * FROM tb_position");
	          while ($res_po = mysql_fetch_array($query_po)) {
	          	$id=$res_po['po_id'];
	      
?>

						<!-- POPUP -->
					
						<a href="test.php?id=<?php echo $id;?>"   data-toggle="modal"  data-target="#myModal<?php echo $id;?>" class="btn btn-danger  btn-xs" > กด</a>
						<div class="modal fade" id="myModal<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      
						    </div>
						  </div>
						</div>      				
<?php
}
?>