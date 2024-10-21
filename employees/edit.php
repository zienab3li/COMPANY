<?php
require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';
$name='';
$email='';
$password='';
$department_id='';
$address='';
$phone='';
$errors = [];

$departmentQuery="SELECT * FROM `departments`";
$department=mysqli_query($con,$departmentQuery);
if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $selectoneQuery = "SELECT * FROM `employees` where id = $id";
    $selectone = mysqli_query($con,$selectoneQuery);
    $row = mysqli_fetch_assoc($selectone);
    // if($row){
    //     echo "true";
    // }
    // else{
    //     echo "false";
    // }
    $name = $row['name'];
    $email = $row['email'];
    $password=$row['password'];
    $department_id=$row['department_id'];
    $address=$row['address'];
    $phone=$row['phone'];
    
if(isset($_POST['update']))
{
    $name = filterString($_POST['name']);
    $email = filterString($_POST['email']);
    $password=$_POST['password'];
    $department_id=$_POST['department_id'];
    $address=filterString($_POST['address']);
    $phone=filterString($_POST['phone']);
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
    if(empty($errors)){
        if(!empty($_FILES['image']['name']))
        {
            //image uploade 
        $realName = $_FILES['image']['name'];
        $imgName= "company_" .rand(0,10000) ."_".time(). $realName;
        $tmpname = $_FILES['image']['tmp_name'];
        $oldimage = 'uploads/' . $row['image'];
        $location = 'uploads/' . $imgName;
        if($row['image'] != 'fake.jpeg')
        {
            unlink($oldimage);
        }
        move_uploaded_file( $tmpname,$location);
        }
        else{
            $imgName=$row['image'];
        }
    $updateQuery = "UPDATE `employees` SET `name`='$name', `email`='$email', `password`='$password', `department_id`=$department_id, `address`='$address', `phone`='$phone', `image`= '$imgName' WHERE `id`=$id";
    $update = mysqli_query($con, $updateQuery);

    if($update){
    path('employees/list.php');
    
}
}
}
}
?>






<div class="container col-4 pt-5">
    <h2 class="text-center">Update EMPLOYEE</h2>
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
                <input type="text" value="<?= $name?>" class="form-control" id="name" name="name">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="email" class="form-label"> Email:</label>
                <input type="text" value="<?= $email?>"  class="form-control" id="email" name="email">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="password" class="form-label"> Password:</label>
                <input type="text" value="<?= $password?>" class="form-control" id="password" name="password">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="department_id" class="form-label">Department:</label>
                <select name="department_id" id="department_id" class="form-select">
                   
                    <?php foreach($department as $dep):?>
                     <?php if($department_id==$dep['id']):?>
                    <option selected value="<?= $dep['id']?>"><?= $dep['department']?></option>
                    <?php else:?>
                        <option value="<?= $dep['id']?>"><?= $dep['department']?></option>

                    <?php endif;?>
                    <?php endforeach;?>
                   
                </select>
                
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="address" class="form-label">Address:</label>
                <input type="text" value="<?= $address?>" class="form-control" id="address" name="address">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" value="<?= $phone?>" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group col-12">
                <label for="image" class="form-label">Employee image</label>
                <input type="file" class="form-control" id="image" name="image">
                <img width = "150" src="uploads/<?=$row['image']?>" alt="">
            </div>
               <div class="text-center">
                <button class="btn btn-warning" name="update">Update</button>
               </div>
        </div>
         </form>
        </div>
    </div>
       
</div>
<?php

require_once '../shared/footer.php';
?>