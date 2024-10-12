
<?php

require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';

if(isset($_GET['cat_id']))
{
    $cat_id = $_GET['cat_id'];
    
    $selectQuery="SELECT * FROM `procat` where cat_id=$cat_id";
    
    if(isset($_GET['category']))
    {
        $category = $_GET['category'];
        $selectQuery="SELECT * FROM `procat` where cat_id=$cat_id";
    }
}
$select= mysqli_query($con, $selectQuery);
$numofRows=mysqli_num_rows($select);


?>

<div class="container pt-5">
    
    <div class="card border-0">
    

    <div class="card-body bg-dark text-light">
    <h2 class="text-center text-light">All category products:<?=$category?>  </h2>
        
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
                    <td> <?= $dep['category']?></td>
                    
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