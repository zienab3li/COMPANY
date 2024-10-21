<?php
require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';



$departmentQuery="SELECT * FROM `departments`";
$department=mysqli_query($con,$departmentQuery);
if(isset($_GET['show']))
{
    $id = $_GET['show'];
    $selectoneQuery = "SELECT * FROM `employeesdepartments` where emp_id = $id";
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
$department=$row['department'];
$address=$row['address'];
$phone=$row['phone'];
$image = $row['image'];
}
?>






<div class="container col-4 pt-5">
    <h2 class="text-center"> EMPLOYEE:<?= $row['name'];?></h2>
    <div class="card border-0">
    <img src="./uploads/<?=$image;?>" class="img-fluid" alt="">
    <div class="card-body bg-dark text-light">
       <h5 class="card-title">Name: <?= $row['name'];?></h5>
       <p class="card-text"> Address: <?= $row['address'];?></p>
       <p class="card-text"> Phone: <?= $row['phone'];?></p>
       <p class="card-text"> Department: <?= $row['department'];?></p>
       
    </div>
    </div>
       
</div>
<?php

require_once '../shared/footer.php';
?>