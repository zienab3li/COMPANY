<?php

require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';




$message='';

$categoryQuery="SELECT * FROM `categories`";
$category = mysqli_query($con, $categoryQuery);

if(isset($_POST['submit']))
{
    
    $title= $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];

    $insertQuery = "INSERT INTO `products` VALUES (NULL, '$title','$description',$price,$category_id)";
    $insert = mysqli_query($con, $insertQuery);
if($insert)
{
    $message = "Product Added Successfully";
}
}







?>

<div class="container col-4 pt-5">
    
    <div class="card border-0">
    <div class="card-body bg-dark text-light">
    <h2 class="text-center">ADD Product</h2>
        <?php if(!empty($message)):?>
        <div class="alert alert-success">
            <p class="fs-4 mb-0"><?= $message?></p>
        </div>
        <?php endif; ?>
        
         <form  method="POST">
            <div class="row">
            <div class="form-group col-mid-6 mb-2">
                <label for="name" class="form-label"> Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="descreption" class="form-label"> Description:</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="price" class="form-label"> Price:</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="category_id" class="form-label">Category:</label>
                <select name="category_id" id="category_id" class="form-select">
                  <?php foreach($category as $cat): ?>
                    <option value="<?= $cat['id']?>"><?= $cat['category']?></option>
                    <?php endforeach; ?>

                </select>
                </div>
               <div class="text-center">
                <button class="btn btn-primary" name="submit">Add Product</button>
               </div>
        </div>
         </form>
        </div>
    </div>
       
</div>



















<?php

require_once '../shared/footer.php';
?>