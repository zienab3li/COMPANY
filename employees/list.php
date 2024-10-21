<?php
require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $selectone = "SELECT `image` from `employees` WHERE id = $id ";
    $resultone = mysqli_query($con, $selectone);
    $image = mysqli_fetch_assoc($resultone);
    $location = 'uploads/' . $image['image'];
    $deleteQuery = "DELETE FROM `employees` WHERE id = $id";
    $delete = mysqli_query($con, $deleteQuery);
    if($delete)
    {if($image['image'] != 'fake.jpeg')
       {unlink($location);} 
        path("employees/list.php");
    }
}

$selectQuery="SELECT employees.id AS emp_id,employees.name,employees.password,
employees.address,employees.phone,employees.email,employees.image,departments.id as dep_id ,departments.department
FROM `employees`  JOIN `departments` ON employees.department_id = departments.id";
$select = mysqli_query($con, $selectQuery);
// $x=mysqli_fetch_array($select);
// print_r($x);
$numofRows = mysqli_num_rows($select);
?>





<div class="container pt-5">
    <h2 class="text-center text-light">LIST ALL Employees: <?=$numofRows?> </h2>
    <div class="card border-0">
    <div class="card-body bg-dark text-light">
        
        <table class="table table-dark">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <!-- <th>Address</th>
                <th>Phone</th> -->
                
                <th >Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php if($numofRows>0):?>
                <?php foreach($select as $index => $dep):?>
                <tr>
                    <td><?= $index+1?></td>
                    <td><?= $dep['name']?></td>
                    <td><?= $dep['email']?></td>
                    <td><?= $dep['department']?></td>
                    <!--  -->
                    <td>
                    <a href="show.php?show=<?= $dep['emp_id'];?>" class="btn btn-info">Show</a>

                    <!-- </td>
                    <td> -->
                    <a href="edit.php?edit=<?= $dep['emp_id'];?>" class= "btn btn-warning">EDIT</a>
                <!-- </td>
                <td> -->

                    <a href="?delete=<?= $dep['emp_id'];?>" class= "btn btn-danger">DELETE</a>
                    </td>
                </tr>
                <?php endforeach?>
                <?php else :?>
                    <tr>
                        <td colspan="12" class="text-center">NO DATA AVAILABLE</td>
                    </tr>

                 <?php endif;?>
            </tbody>
          </table>
        </div>
         
    </div>
    </div>
       
</div>














<?php

require_once '../shared/footer.php';
?>
