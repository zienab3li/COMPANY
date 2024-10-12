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
}
?>






<div class="container col-4 pt-5">
    <h2 class="text-center"> EMPLOYEE:<?= $row['name'];?></h2>
    <div class="card border-0">
        <img src="https://th.bing.com/th?id=OIP.4gNmkKefwNn8rOdvUOPBlwHaEr&w=314&h=198&c=8&rs=1&qlt=90&r=0&o=6&dpr=1.5&pid=3.1&rm=2" alt="img" class="img-fluid">
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