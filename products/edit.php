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
$image = '';
$errors=[];
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
    $image = $row['image'];

    if(isset($_POST['update']))
    {
        $title=filterString($_POST['title']);
        $description=filterString($_POST['description']);
        $price=$_POST['price'];
        $category=$_POST['category_id'];
        if(stringvalidation($title,5))
    {
        $errors[]='Title must be at least 5 characters long';
    }
    if(stringvalidation($description,10))
    {
        $errors[]='Description must be at least 10 characters long';
    }
    //image upload
            //image uploade 
        if(!empty($_FILES['image']['name'])) {  
        $realName = $_FILES['image']['name'];
        $imgsize=$_FILES['image']['size'];
        $imgName= "company_" .rand(0,10000) ."_".time(). $realName;
        $tmpname = $_FILES['image']['tmp_name'];
        $location = 'uploads/' . $imgName;
        if(imagevalidation($realName,$imgsize,5))
        {
            $errors[]='Image is required & must be less than 3MB and must be a valid image';
        }
        if(empty($errors)){
            move_uploaded_file($tmpname,$location);
                if($row['image']!= 'placeholder.jpeg')
                {
                    $oldimage = 'uploads/' . $row['image'];
                    unlink($oldimage);
                }    
                 }
            }
                 else{
                    $imgName=$row['image'];
                 }
                 if(empty($errors))
                 {
                    $updateQuery="UPDATE `products` SET `title`='$title',`description`='$description', price=$price, category_id=$category,`image`='$imgName' where id=$id";
                    $update=mysqli_query($con,$updateQuery);
                    if($update)
                    {
                        path('products/list.php');
                    }
                 }

}
}



?>

<div class="container col-4 pt-5">
    <h2 class="text-center">Update Product</h2>
    <div class="card border-0">
    <div class="card-body bg-dark text-light">
         <form  method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="form-group col-mid-6 mb-2">
                <label for="name" class="form-label"> Title:</label>
                <input type="text" value="<?=$title?>" class="form-control" id="title" name="title">
            </div>
            <div class="form-group col-mid-6 mb-2">
                <label for="descreption" class="form-label"> Description:</label>
                <textarea rows="1" value="<?= $description?>" class="form-control" id="description" name="description"><?= $description?></textarea>
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
                <div class="form-group col-mid-6 mb-2">
                <label for="image" class="form-label"> Product image</label>
                <input type="file" value="" class="form-control" id="image" name="image">
                <img class="" src="uploads/<?=$image?>" width="150" alt="">
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