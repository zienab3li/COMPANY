<?php

require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';

$categoryQuery= "SELECT * FROM `categories`";
$categories= mysqli_query($con, $categoryQuery);
$title='';
$description='';
$price='';
$category='';
if(isset($_GET['edit']))
{
    $id=$_GET['edit'];
    $selectQueryuery="SELECT * FROM `products` WHERE id=$id";
    $select=mysqli_query($con,$selectQueryuery);
    $row=mysqli_fetch_assoc($select);
    $title=$row['title'];
    $description=$row['description'];
    $price=$row['price'];
    $category=$row['category_id'];

    if(isset($_POST['update']))
    {
        $title=$_POST['title'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $category=$_POST['category_id'];

        $updateQuery="UPDATE `products` SET title = '$title' , `description` = '$description', price= $price, category_id=$category where id=$id";
        $update=mysqli_query($con,$updateQuery);
        if($update)
        {
            path('products/list.php');
        }
    }
}

?>

<div class="container col-4 pt-5">
    <h2 class="text-center">Update Product</h2>
    <div class="card border-0">
    <div class="card-body bg-dark text-light">
         <form  method="POST">
            <div class="row">
            <div class="form-group col-mid-6 mb-2">
                <label for="name" class="form-label"> Title:</label>
                <input type="text" value="<?=$title?>" class="form-control" id="title" name="title">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="descreption" class="form-label"> Description:</label>
                <input type="text" value="<?= $description?>" class="form-control" id="description" name="description">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="price" class="form-label"> Price:</label>
                <input type="text" value="<?= $price?>" class="form-control" id="price" name="price">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="category_id" class="form-label">Category:</label>
                <select name="category_id" id="category_id" class="form-select">
                  <?php foreach($categories as $cat): ?>
                    <?php if($category==$cat['id']):?>
                    <option selected value="<?= $cat['id']?>"><?= $cat['category']?></option>
                    <?php else :?>
                        <option value="<?= $cat['id']?>"><?= $cat['category']?></option>
                        <?php endif;?>
                    <?php endforeach; ?>

                </select>
                </div>
               <div class="text-center">
                <button class="btn btn-primary" name="update">Update Product</button>
               </div>
        </div>
         </form>
        </div>
    </div>
       
</div>


















<?php

require_once '../shared/footer.php';
?>