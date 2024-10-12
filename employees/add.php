<?php
require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';
$message='';
$departmentsQuery="SELECT * FROM `departments`";
$department = mysqli_query($con, $departmentsQuery);

if(isset($_POST['submit']))
{

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $department_id = $_POST['department_id'];
    $address= $_POST['address'];
    $phone = $_POST['phone'];
    $insertQuery = "INSERT INTO `employees` values (NULL,' $name','$email','$password ',$department_id,' $address','$phone')";
    $insert=mysqli_query($con,$insertQuery);
    if($insert){
        $message = "Employee Added Successfully";
    }
}
?>


<div class="container col-4 pt-5">
    <h2 class="text-center">ADD EMPLOYEE</h2>
    <div class="card border-0">
    <div class="card-body bg-dark text-light">
        <?php if(!empty($message)):?>
        <div class="alert alert-success">
            <p class="fs-4 mb-0"><?= $message?></p>
        </div>
        <?php endif; ?>
        
         <form  method="POST">
            <div class="row">
            <div class="form-group col-mid-6 mb-2">
                <label for="name" class="form-label"> Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="email" class="form-label"> Email:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="password" class="form-label"> Password:</label>
                <input type="text" class="form-control" id="password" name="password">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="department_id" class="form-label">Department:</label>
                <select name="department_id" id="department_id" class="form-select">
                    <?php foreach($department as $dep):?>
                    <option value="<?= $dep['id']?>"><?= $dep['department']?></option>
                    <?php endforeach;?>
                </select>
                
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
               <div class="text-center">
                <button class="btn btn-primary" name="submit">Add employee</button>
               </div>
        </div>
         </form>
        </div>
    </div>
       
</div>






















<?php

require_once '../shared/footer.php';
?>