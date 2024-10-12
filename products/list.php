<?php

require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';
$search='';
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM `products` WHERE id = $id";
    $delete = mysqli_query($con, $deleteQuery);
    if($delete)
    {
        path('products/list.php');
    }
}
// $selectQuery="SELECT products.id AS pro_id,products.title,products.description,
// categories.id as cat_id ,categories.category
// FROM `products`  JOIN `categories` ON products.category_id = categories.id";
$selectQuery="SELECT * FROM `procat`";
if(isset($_GET['search']))
{
    $search = $_GET['search'];
    $selectQuery="SELECT * FROM `procat` where title like '%$search%' ";
    


}
$select = mysqli_query($con, $selectQuery);
$numofRows = mysqli_num_rows($select);

?>


<div class="container pt-5">
    
    <div class="card border-0">
    

    <div class="card-body bg-dark text-light">
    <h2 class="text-center text-light">LIST ALL products: <?=$numofRows?> </h2>
    <form action="" class="d-flex">
    <input type="text" value="<?=$search?>" name="search" class="form-control form-control-lg me-2" >
    <button   class="btn btn-info btn-lg">Search</button>
    <?php if(!empty($search)):?>
    <a href="<?=URL('products/list.php')?>" class="btn btn-secondary">Cancel</a>
    <?php endif;?>
     </form>
        
        <table class="table table-dark">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <!-- <th>Department</th> -->
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
                    <td><?= $dep['title']?></td>
                    <td><?= $dep['description']?></td>
                    <td><?= $dep['price']?></td>
                    <td> <a class= "text-reset" href="catproducts.php?cat_id=<?=$dep['cat_id']?>&category=<?=$dep['category']?>"><?= $dep['category']?></a></td>
                    
                    <!--  -->
                    <td>
                    <a href="show.php?show=<?= $dep['pro_id'];?>" class="btn btn-info">Show</a>

                    <!-- </td>
                    <td> -->
                    <a href="edit.php?edit=<?= $dep['pro_id'];?>" class= "btn btn-warning">EDIT</a>
                <!-- </td>
                <td> -->

                    <a href="?delete=<?= $dep['pro_id'];?>" class= "btn btn-danger">DELETE</a>
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