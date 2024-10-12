<?php
require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';
$message='';
$category='';

if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $selectoneQuery = "SELECT * FROM `categories` where id = $id";
    $selectone = mysqli_query($con,$selectoneQuery);
    $row = mysqli_fetch_assoc($selectone);
    $category = $row['category'];
    if(isset($_POST['update']))
    {
        $category = $_POST['category'];
        $updateQuery= " UPDATE  `categories` SET category ='$category' where id=$id ";
        $update = mysqli_query($con,$updateQuery);
        if($update){
            path('categories/list.php');
        }
    }
}


// if(isset($_POST['category'])){
//     $category = $_POST['category'];
//     $insertQuery = "INSERT INTO `categorys` VALUES (NULL , '$category')  ";
//     $insert = mysqli_query($con, $insertQuery);
//     if($insert)
//     {
//         $message =' category Added Successfully';
//     }
// }
?>

<div class="container col-6 pt-5">
    <h2 class="text-center"> UPDATE Category</h2>
    <div class="card border-0">
    <div class="card-body bg-dark text-light">
        <?php if(!empty($message)):?>
        <div class="alert alert-success">
            <p class="fs-4 mb-0"><?= $message?></p>
        </div>
        <?php endif; ?>
        
         <form  method="POST">
            <div class="form-group mb-2">
                <label for="category_name">Category Name:</label>
                <input type="text" value=<?=$category?> class="form-control" id="category_name" name="category">
            </div>
               <div class="text-center">
                <button class="btn btn-warning" name="update"> UPDATE Category</button>
               </div>
         </form>
        </div>
    </div>
       
</div>
















<?php

require_once '../shared/footer.php';
?>