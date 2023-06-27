<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">



		</div>
		<div class="card-body">
			<table class="table tabe-hover table-condensed" id="list">
				<colgroup>
					<col width="5%">
					<col width="35%">
					<col width="15%">
					<col width="15%">
					<col width="20%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Project</th>
						<th>Date Started</th>
						<th>Due Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                      <?php
                      $x=1; require 'DB.php'; 

                          if (isset($_SESSION['admin'])) {
                              $id= $_SESSION['admin']->employee_id ; 
                                   $where = "  where concat('[',REPLACE(Emploey_Name,',','],['),']') LIKE '%[{$id}]%' ";

                              $show=$db->prepare("SELECT * FROM admn_task $where ");
                              
                              $show->execute();
                             foreach ($show as $key) {
                             
              
                              
                      ?>

					<tr>
						<th class="text-center"><?php echo $x;?></th>
							<td>
							
							<p class="truncate"><?php echo $key['Subject'];?></p>
						</td>
							</td>
							 <td><b><?php echo $key['Start'];?></b></td>
							<td><b><?php echo $key['Endd'];?></b></td>

						
						 <td>	<?php 
						   if ($key['Stuts']=='Pending') {
						  	
						  	 	echo "<span class='badge badge-secondary'>".$key['Stuts']."</span>";
						  }
						 
							  elseif($key['Stuts'] =='On-Hold'){
							  
							  	echo "<span class='badge badge-warning'>".$key['Stuts']."</span>";
							  }elseif($key['Stuts'] =='Done'){
							  	
							  	echo "<span class='badge badge-success'>".$key['Stuts']."</span>";
							 }
							?></td>

						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								Action
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item view_project" href="http://localhost/Employe%20Page%20Project%20Employee/Content/AnswerRask.php?Answer=<?php echo $key['id']?>" data-id="">Answer Task</a>
								<div class="dropdown-divider"></div>
								<!-- <a class="dropdown-item" href="./index.php?page=edit_project ">Edit</a>
								<div class="dropdown-divider"></div> -->


							</div>
						</td>
						 <?php $x++; }}
						 
						 ?> </tr>
                     				<!--  -->
                     				                  <?php
                       require 'DB.php'; 

                          if (isset($_SESSION['admin'])) {
                              $id= $_SESSION['admin']->employee_id ; 
                                   $where = "  where concat('[',REPLACE(Emploey_Name,',','],['),']') LIKE '%[{$id}]%' ";

                              $show=$db->prepare("SELECT * FROM emploeyeetask $where ");
                              
                              $show->execute();
                             foreach ($show as $key) {
                             
              
                              
                      ?>

					<tr>
						<th class="text-center"><?php echo $x;?></th>
							<td>
							
							<p class="truncate"><?php echo $key['Subject'];?></p>
						</td>
							</td>
							 <td><b><?php echo $key['Start'];?></b></td>
							<td><b><?php echo $key['Endd'];?></b></td>

						
						 <td>	<?php 
						   if ($key['Stuts']=='Pending') {
						  	
						  	 	echo "<span class='badge badge-secondary'>".$key['Stuts']."</span>";
						  }
						 
							  elseif($key['Stuts'] =='On-Hold'){
							  
							  	echo "<span class='badge badge-warning'>".$key['Stuts']."</span>";
							  }elseif($key['Stuts'] =='Done'){
							  	
							  	echo "<span class='badge badge-success'>".$key['Stuts']."</span>";
							 }
							?></td>

						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								Action
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item view_project" href="http://localhost/Employe%20Page%20Project%20Employee/Content/AnswerRask.php?answer=<?php echo $key['id']?>" data-id="">Answer Task</a>
								<div class="dropdown-divider"></div>
								


							</div>
						</td>
						 <?php $x++; }}
						 
						 ?> </tr>


                     				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table p {
		margin: unset !important;
	}

	table td {
		vertical-align: middle !important
	}
</style>
<!-- <script>
	$(document).ready(function() {
		$('#list').dataTable()

		$('.delete_project').click(function() {
			_conf("Are you sure to delete this project?", "delete_project", [$(this).attr('data-id')])
		})
	})

	function delete_project($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_project',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script> -->