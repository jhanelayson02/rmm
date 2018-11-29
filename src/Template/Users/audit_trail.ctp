	<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Audit Trail</h2>
	        <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Date and Time</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php
              		foreach ($audits as $audit) {
                ?>

		            <tr>
		                <input type="hidden" value="$post_id" name="id">
	                    <td><?= $audit['created'] ?></td>         
	                    <td><?= $audit['user']['first_name'] . " " . $audit['user']['last_name'] ?></td>         
	                    <td><?= $audit['user']['username'] ?></td>         
	                    <td><?= $audit['type'] ?></td>         
		            </tr>
	            <?php } ?>
              </tbody>
            </table>
			
			
          </div>
        </div>
     </div>