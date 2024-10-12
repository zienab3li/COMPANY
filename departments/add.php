<?php
require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';
$message='';
if(isset($_POST['department'])){
    $department = $_POST['department'];
    $insertQuery = "INSERT INTO `departments` VALUES (NULL , '$department')  ";
    $insert = mysqli_query($con, $insertQuery);
    if($insert)
    {
        $message =' Department Added Successfully';
    }
}
?>

<div class="container col-6 pt-5">
    <h2 class="text-center">ADD DEPARTMENT</h2>
    <div class="card border-0">
    <div class="card-body bg-dark text-light">
        <?php if(!empty($message)):?>
        <div class="alert alert-success">
            <p class="fs-4 mb-0"><?= $message?></p>
        </div>
        <?php endif; ?>
        
         <form  method="POST">
            <div class="form-group mb-2">
                <label for="department_name">Department Name:</label>
                <input type="text" class="form-control" id="department_name" name="department">
            </div>
               <div class="text-center">
                <button class="btn btn-primary">Add department</button>
               </div>
         </form>
        </div>
    </div>
       
</div>
















<?php

require_once '../shared/footer.php';
?>