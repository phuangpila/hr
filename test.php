<?php
include('include/db.php');
include('include/connect.php');
?>
							<div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">เพิ่ม</h4>
						      </div>
						      <div class="modal-body">
						       <?php
						       echo $_GET['idup'];
						       ?>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary">Save changes</button>
						      </div>