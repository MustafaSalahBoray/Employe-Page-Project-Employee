<style>
	.form-check-input {
		margin-left: 0;
	}
</style>

<div class="d-flex main">

	<!-- sidebar -->

	<!-- End of sidebar -->

	<section class="container  ">

		<div class="d-flex flex-column ">
			<div class="profile d-flex flex-column  mb-2">






				<div class="rate">

					<table class="table table-striped bg-secondary">
						<thead>
							<tr>
								<th scope="col-3">#</th>
								<th>PERFORMANCE CATEGORY</th>
								<th scope="col" width="7%">Yes</th>
								<th scope="col" width="7%">No</th>
							</tr>
						</thead>
						<tbody>
							<tr><form method="POST">
								<th scope="row">1</th>
								<td>Do you have confidence in your immediate manager’s overall effectiveness? </td>

								<td> <input class="form-check-input " type="radio" name="Q1" id="flexRadioDefault1" value="YES" ></td>
								<td> <input class="form-check-input" type="radio" name="Q1" id="flexRadioDefault1" value="NO"></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>Do you feel your supervisor has the expertise and abilities to help both you and your teammates hit performance goals and succeed?</td>

								<td> <input class="form-check-input" type="radio" name="Q2" id="flexRadioDefault1" value="YES"></td>
								<td> <input class="form-check-input" type="radio" name="Q2" id="flexRadioDefault1" value="NO"></td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Does your manager provide you with regular constructive feedback and insights into your performance? </td>

								<td> <input class="form-check-input" type="radio" name="Q3" id="flexRadioDefault1" value="YES"></td>
								<td> <input class="form-check-input" type="radio" name="Q3" id="flexRadioDefault1" value="NO"></td>
							</tr>

							<tr>
								<th scope="row">4</th>
								<td>Is your supervisor open and receptive to your ideas, suggestions, and requests? </td>
								<td> <input class="form-check-input" type="radio" name="Q4" id="flexRadioDefault1" value="YES"></td>
								<td> <input class="form-check-input" type="radio" name="Q4" id="flexRadioDefault1" value="NO"></td>

							</tr>


							<tr>
								<th scope="row">5</th>
								<td>Does management handle disagreements within the team and workplace in a professional manner?</td>

								<td> <input class="form-check-input" type="radio" name="Q5" id="flexRadioDefault1" value="YES"></td>
								<td> <input class="form-check-input" type="radio" name="Q5" id="flexRadioDefault1" value="NO"></td>
							</tr>

							<tr>
								<th scope="row">6</th>
								<td>Does your supervisor manage your team with a positive and healthy attitude? </td>
								<td> <input class="form-check-input" type="radio" name="Q6" id="flexRadioDefault1" value="YES"></td>
								<td> <input class="form-check-input" type="radio" name="Q6" id="flexRadioDefault1" value="NO"></td>

							</tr>

							<tr>
								<th scope="row">7</th>
								<td>Do your managers communicate their expectations clearly? </td>

								<td> <input class="form-check-input" type="radio" name="Q7" id="flexRadioDefault1" value="YES"></td>
								<td> <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="NO"></td>
							</tr>
							<tr>
								<th scope="row">8</th>
								<td>Are performance metrics used to gauge your individual success clearly explained? </td>
								<td> <input class="form-check-input" type="radio" name="Q8" id="flexRadioDefault1" value="YES"></td>
								<td> <input class="form-check-input" type="radio" name="Q8" id="flexRadioDefault1" value="NO"></td>

							</tr>
							<tr>
								<th scope="row">9</th>
								<td>Does your manager foster trust and openness within your team? </td>

								<td> <input class="form-check-input" type="radio" name="Q9" id="" value="YES"></td>
								<td> <input class="form-check-input" type="radio" name="Q9" id="" value="NO"></td>
							</tr>
							<tr>
								<th scope="row">10</th>
								<td>Does your supervisor treat each member of your team fairly? </td>
								<td> <input class="form-check-input" type="radio" name="Q10" id="Q101" value="YES"></td>
								<td> <input class="form-check-input" type="radio" name="Q10" id="Q101" value="NO" ></td>

							</tr>
						</tbody>
					</table>
					<div class="mb-3">
						<label for="exampleFormControlTextarea1" class="form-label fw-bold ">Comment</label>
						<textarea class="form-control ll" id="" rows="3" name="cooment"></textarea>
					</div>

                           <?php 

                                if (isset($_SESSION['admin'])) {
                                	$ManagerId=$_SESSION['admin']->Manager_Name ;
                                	$EmmployeeId=$_SESSION['admin']->employee_id;
                                   echo"<input type='hidden' name='ManagerId' value='".$ManagerId."'>";
                                   echo"<input type='hidden' name='EmmployeeId' value='".$EmmployeeId."'>";
                                }
                                else{
                                	echo "Erorr";
                                }
 


                           ?>
					<button class="align-items-end btn btn-primary m-auto d-flex" type="submit" name="Submit">Submit</button>
				</div></form>
			</div>

             <?php

                if(isset($_POST['Submit'])){
                	 require 'DB.php';
                	 $INSERT=$db->prepare("INSERT INTO evaluationmanager (Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,comment,Manager_id,Emploey_id) VALUES (:Q1,:Q2,:Q3,:Q4,:Q5,:Q6,:Q7,:Q8,:Q9,:Q10,:comment,:Manager_id,:Emploey_id	) ");
                	 $INSERT->bindparam("Q1",$_POST['Q1']);
                	  $INSERT->bindparam("Q2",$_POST['Q2']);
                	  $INSERT->bindparam("Q3",$_POST['Q3']);
                	  $INSERT->bindparam("Q4",$_POST['Q4']);
                	  $INSERT->bindparam("Q5",$_POST['Q5']);
                	   $INSERT->bindparam("Q6",$_POST['Q6']);
                	  $INSERT->bindparam("Q7",$_POST['Q7']);
                	  $INSERT->bindparam("Q8",$_POST['Q8']);
                	  $INSERT->bindparam("Q9",$_POST['Q9']);
                	  $INSERT->bindparam("Q10",$_POST['Q10']);
                	  $INSERT->bindparam("Manager_id",$_POST['ManagerId']);
                	  $INSERT->bindparam("comment",$_POST['cooment']);
                	  $INSERT->bindparam("Emploey_id",$_POST['EmmployeeId']);
                	  if ($INSERT->execute()) {
                	  	// code...
                	  }
                	  else{
                	  	echo "Erorr";
                	  }
                }

             ?>




		</div>
</div>
</div>
<script>
	$(document).ready(function() {
		$('#list').dataTable()
		$('.view_evaluation').click(function() {
			uni_modal("Evaluation Details", "view_evaluation.php?id=" + $(this).attr('data-id'), 'mid-large')
		})
		$('.delete_evaluation').click(function() {
			_conf("Are you sure to delete this evaluation?", "delete_evaluation", [$(this).attr('data-id')])
		})
	})

	function delete_evaluation($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_evaluation',
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
</script>