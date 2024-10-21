<?php
require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';
$message='';
$errors = [];
$departmentsQuery="SELECT * FROM `departments`";
$department = mysqli_query($con, $departmentsQuery);

if(isset($_POST['submit']))
{
// print_r($_POST);
// print_r($_FILES);
    $name =filterString($_POST['name']);
    $email = filterString($_POST['email']);
    $password = $_POST['password'];
    $department_id = $_POST['department_id'];
    $address=filterString( $_POST['address']);
    $phone = filterString($_POST['phone']);
    // errors
    if(stringvalidation($name, 4))
    {
        $errors[] = "Name must be at least 4 characters long";
    }
    if(stringvalidation($email, 0))
    {
        $errors[] = "Email must be entered!!";
    }
    if(stringvalidation($address, 0))
    {
        $errors[] = "Address must be entered!!";
    }
    if(stringvalidation($phone ,11))
    {
        $errors[] = "Phone must be more than 10!!";
    }
            //image uploade 
            $realName = $_FILES['image']['name'];
            $imgsize = $_FILES['image']['size'];
            $imgName= "company_" .rand(0,10000) ."_".time(). $realName;
            $tmpname = $_FILES['image']['tmp_name'];
            $location = 'uploads/' . $imgName;
            if(imagevalidation($realName,$imgsize,5))
            {
                $errors[] = "Image is required & size must be less than 5MB!!";
            }

    
     if(empty($errors)){
    

    move_uploaded_file( $tmpname,$location);
    }
    
    $insertQuery = "INSERT INTO `employees` values (NULL,' $name','$email','$password ',$department_id,' $address','$phone','$imgName')";
    $insert=mysqli_query($con,$insertQuery);
    if($insert){
     $message = "Employee Added Successfully";
}}

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
        <?php if(!empty($errors)):?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($errors as $error):?>
                    <li><?= $error?></li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php endif; ?>
        
         <form  method="POST" enctype="multipart/form-data">
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
            <div class="form-group col-12">
                <label for="image" class="form-label">Employee image</label>
                <input type="file" class="form-control" id="image" name="image">
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