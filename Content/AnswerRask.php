
  <link rel="stylesheet" type="text/css" href="Library/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Style.css">
  <script type="text/javascript" src="Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Library/js/jquery-3.6.1.min.js"></script>
      <link rel="stylesheet" href="A-Send Task/css/bootstrap.min.css">
      <?php include 'header.php';
       include 'topbar.php' ;
       include 'sidebar.php';
        require 'DB.php';
        require 'footer.php';?>
        <div class="col-lg-12">
        	<?php  

        	 
        	?>

             <?php 
               if(isset($_GET['Answer'])){
               	
               	 require 'DB.php';
               	 $selectAdmin=$db->prepare("SELECT * FROM admn_task WHERE id=:id");
               	 $selectAdmin->bindparam("id",$_GET['Answer']);
               	 $selectAdmin->execute();
               	 foreach ($selectAdmin as $key) {
               	 	// code...
               	 
               
              

             ?>
	<div class="card card-outline card-primary">
		<div class="container">
		<div class="card-body" style="width:70%;margin: auto;">
			<form action="" id="manage-department" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="id" value="<?php echo $key['id']?>">
			
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Name</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo $key['Subject']?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Status</label>
							<select name="status"  id="status" class="custom-select custom-select-sm">
								<option value="Pending">Pending</option>
								<option value="On-Hold">On-Hold</option>
								<option value="Done">Done</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Start Date</label>
							<input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date" value="<?php echo $key['Start'] ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">End Date</label>
							<input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date" value="<?php echo $key['Endd'] ?>">
						</div>
					</div>
				</div>
				<div class="row">
  

					<div class="col-md-6">
						<div class="form-group">
							<h2 for="" class="control-label">Task required</h2></br>
							<h4>-<?php echo $key['comment'] ?></h4>
						</div>	  
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Default file input</label>
							<input type="file" class="form-control form-control-sm" autocomplete="off" name="image" >
						</div>
					</div>

					


				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label for="" class="control-label">Description</label>
							<textarea name="description" id="" cols="30" rows="10" class="summernote form-control">

					</textarea>
						</div>
					</div>
				</div>
			
		</div>
		<div class="card-footer border-top border-info  text-center " style="margin: auto; width: 70%;">
			<div class="d-flex w-100 justify-content-center align-items-center">
				<?php }  	 if (isset($_SESSION['admin'])) {
        	 	echo "<input type='hidden' name='Emploey_Name' value='".$_SESSION['admin']->employee_id."'>";
        	 }?>
						<button class="btn btn-primary mr-2" type="submit" name="submit">Save</button>
	
				<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=project_list'">Cancel</button>
			</div>
			
		</div>
	</div>
</div>
</form></div>
<?php
			if (isset($_POST['submit'])) {
				
				$fileName=$_FILES['image']['name'];
				$fileTmp=$_FILES['image']['tmp_name'];
				$position="images/".$fileName;

				$INSERT=$db->prepare("INSERT INTO answertaskadmin (Comment,image,id_AdminTask,position,Emploey_Name,Stuts,Subject,Start,Endd) VALUES (:Comment,:image,:id_AdminTask,:position,:Emploey_Name,:Stuts,:Subject,:Start,:Endd)");
		
				$INSERT->bindparam("image",$fileName);
				$INSERT->bindparam("position",$position);
				$INSERT->bindparam("Comment",$_POST['description']);
				$INSERT->bindparam("id_AdminTask",$_POST['id']);
				$INSERT->bindparam("Emploey_Name",$_POST['Emploey_Name']);
				$INSERT->bindparam("Stuts",$_POST['status']);
				$INSERT->bindparam("Subject",$_POST['name']);
				$INSERT->bindparam("Start",$_POST['start_date']);
				$INSERT->bindparam("Endd",$_POST['end_date']);
				  
				if ($INSERT->execute()) {
					move_uploaded_file($fileTmp,"images/$fileName");
					$update=$db->prepare("UPDATE admn_task SET Stuts=:Stuts ,position=:position,fileName=:fileName WHERE id=:id");
					$update->bindparam("Stuts",$_POST['status']);
					$update->bindparam("position",$position);
					$update->bindparam("fileName",$fileName);
					$update->bindparam("id",$_POST['id']);
					$update->execute();
				}
				else{
					echo "Erorr";
				}

			}}
			?>
			<!-- manager Task -->
			<div class="col-lg-12">
                   <?php 
               if(isset($_GET['answer'])){
               	
               	 require 'DB.php';
               	 $selectAdmin=$db->prepare("SELECT * FROM emploeyeetask WHERE id=:id");
               	 $selectAdmin->bindparam("id",$_GET['answer']);
               	 $selectAdmin->execute();
               	 foreach ($selectAdmin as $key) {
               	 	// code...
               	 
               
              

             ?>
	<div class="card card-outline card-primary">
		<div class="container">
		<div class="card-body" style="width:70%;margin: auto;">
			<form action="" id="manage-department" method="POST" enctype="multipart/form-data">

				<input type="hidden" name="id" value="<?php echo $key['id']?>">
			
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Name</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo $key['Subject']?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Status</label>
							<select name="status"  id="status" class="custom-select custom-select-sm">
								<option value="Pending">Pending</option>
								<option value="On-Hold">On-Hold</option>
								<option value="Done">Done</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Start Date</label>
							<input type="date" class="form-control form-control-sm" autocomplete="off" name="start_date" value="<?php echo $key['Start'] ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">End Date</label>
							<input type="date" class="form-control form-control-sm" autocomplete="off" name="end_date" value="<?php echo $key['Endd'] ?>">
						</div>
					</div>
				</div>
				<div class="row">
  

					<div class="col-md-6">
						<div class="form-group">
							<h2 for="" class="control-label">Task required</h2></br>
							<h4>-<?php echo $key['comment'] ?></h4>
						</div>	  
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Default file input</label>
							<input type="file" class="form-control form-control-sm" autocomplete="off" name="image" >
						</div>
					</div>

					


				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label for="" class="control-label">Description</label>
							<textarea name="description" id="" cols="30" rows="10" class="summernote form-control">

					</textarea>
						</div>
					</div>
				</div>
			
		</div>
		<div class="card-footer border-top border-info  text-center " style="margin: auto; width: 70%;">
			<div class="d-flex w-100 justify-content-center align-items-center">
				<?php }  	 if (isset($_SESSION['admin'])) {
        	 	echo "<input type='hidden' name='Emploey_Name' value='".$_SESSION['admin']->employee_id."'>";
        	 }?>
						<button class="btn btn-primary mr-2" type="submit" name="submit">Save</button>
	
				<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=project_list'">Cancel</button>
			</div>
			
		</div>
	</div>
</div>
</form></div>
<?php
			if (isset($_POST['submit'])) {
				
				$fileName=$_FILES['image']['name'];
				$fileTmp=$_FILES['image']['tmp_name'];
				$position="images/".$fileName;
				
				$INSERT=$db->prepare("INSERT INTO answertaskmanager (Comment,image,id_managerTask,position,Emploey_Name,Stuts,Subject,Start,Endd) VALUES (:Comment,:image,:id_managerTask,:position,:Emploey_Name,:Stuts,:Subject,:Start,:Endd)");
		
				$INSERT->bindparam("image",$fileName);
				$INSERT->bindparam("position",$position);
				$INSERT->bindparam("Comment",$_POST['description']);
				$INSERT->bindparam("id_managerTask",$_POST['id']);
				$INSERT->bindparam("Emploey_Name",$_POST['Emploey_Name']);
				$INSERT->bindparam("Stuts",$_POST['status']);
				$INSERT->bindparam("Subject",$_POST['name']);
				$INSERT->bindparam("Start",$_POST['start_date']);
				$INSERT->bindparam("Endd",$_POST['end_date']);
				  
				if ($INSERT->execute()) {
					move_uploaded_file($fileTmp,"images/$fileName");
					$update=$db->prepare("UPDATE emploeyeetask SET Stuts=:Stuts ,position=:position,fileName=:fileName WHERE id=:id");
					$update->bindparam("Stuts",$_POST['status']);
					$update->bindparam("position",$position);
					$update->bindparam("fileName",$fileName);
					$update->bindparam("id",$_POST['id']);
					$update->execute();
				}
				else{
					echo "Erorr";
				}

			}}
			?>
<script>
	// $('#manage-project').submit(function(e) {
	// 	e.preventDefault()
	// 	start_load()
	// 	$.ajax({
	// 		url: 'ajax.php?action=save_project',
	// 		data: new FormData($(this)[0]),
	// 		cache: false,
	// 		contentType: false,
	// 		processData: false,
	// 		method: 'POST',
	// 		type: 'POST',
	// 		success: function(resp) {
	// 			if (resp == 1) {
	// 				alert_toast('Data successfully saved', "success");
	// 				setTimeout(function() {
	// 					location.href = 'index.php?page=project_list'
	// 				}, 2000)
	// 			}
	// 		}
	// 	})
	// })
</script> 