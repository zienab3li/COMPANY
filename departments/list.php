<?php
require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $deletQuery="DELETE  FROM `departments` where id= $id";
    $delete=mysqli_query($con,$deletQuery);
    if($delete)
    {
        path('departments/list.php');
    }
    
}

$selectQuery="SELECT * FROM `departments`";
$select=mysqli_query($con,$selectQuery);
$numofRows = mysqli_num_rows($select);

?>


<div class="container col-3 pt-5">
    <h2 class="text-center">LIST ALL DEPARTMENT: <?= $numofRows?></h2>
    <div class="card border-0">
    <div class="card-body bg-dark text-light">
        
        <table class="table table-dark">
            <thead>
            <tr>
                <th>#</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php if($numofRows>0):?>
                <?php foreach($select as $index => $dep):?>
                <tr>
                    <td><?= $index+1?></td>
                    <td><?= $dep['department'];?></td>
                    <td>
                    <a href="edit.php?edit=<?= $dep['id'];?>" class= "btn btn-warning">EDIT</a>
                    <a href="?delete=<?= $dep['id'];?>" class= "btn btn-danger">DELETE</a>
                    </td>
                </tr>
                <?php endforeach?>
                <?php else :?>
                    <tr>
                        <td colspan="3" class="text-center">NO DATA AVAILABLE</td>
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