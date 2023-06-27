<!-- Info boxes -->
<style>
  .small-box .icon>i.fa,
  .small-box .icon>i.fab,
  .small-box .icon>i.fad,
  .small-box .icon>i.fal,
  .small-box .icon>i.far,
  .small-box .icon>i.fas,
  .small-box .icon>i.ion {
    font-size: 40px;
    top: 20px;
  }
</style>
<div class="row">
  <div class="col-12 ">
    <div class="small-box bg-light shadow-sm border">
      <div class="inner">
        <h3></h3>

        <div class=" col-md-6 m-auto">
          <div class="small-box bg-light shadow-sm border">
            <div class="inner">
              <h3>Total Tasks</h3>
              <?php  
                if (isset($_SESSION['admin'])) {
                  require 'DB.php';
                  $id=$_SESSION['admin']->employee_id;
                  $select1=$db->prepare("SELECT * FROM answertaskmanager WHERE Emploey_Name=:id");
                  $select1->bindparam("id",$id);
                  $select1->execute();
                  $select1=$select1->rowcount();
                    $id=$_SESSION['admin']->employee_id;
                  $select2=$db->prepare("SELECT * FROM answertaskadmin WHERE Emploey_Name=:id");
                  $select2->bindparam("id",$id);
                  $select2->execute();
                  $select2=$select2->rowcount(); 
                  echo $select1+$select2;
                
                 ?>
              
              <p></p>
            </div>
            <div class="icon">
              <i class="fa fa-tasks"></i>
            </div>
          </div>
        </div>
      </div>


      <div class="col-12">
        <div class="card">
          <div class="card-body">
            Welcome !<?php echo $_SESSION['admin']->First_Name.$_SESSION['admin']->Last_Name ;}?>
          </div>
        </div>
      </div>