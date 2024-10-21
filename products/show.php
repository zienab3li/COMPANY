<?php

require_once 'C:xampp/htdocs/company/app/configDB.php';
require_once 'C:xampp/htdocs/company/app/functions.php';
require_once '../shared/header.php';
require_once '../shared/navbar.php';

if(isset($_GET['show']))
{
    $id = $_GET['show'];
    $selectQuery = "SELECT * FROM `procat` where pro_id=$id";
    $select = mysqli_query($con, $selectQuery);
    $row = mysqli_fetch_assoc($select);
}



?>





<div class="container col-4 pt-5">
    <h2 class="text-center"> Product:<?= $row['title'];?></h2>
    <div class="card border-0">
        <img src="./uploads/<?=$row['image'];?>" alt="img" class="img-fluid">
    <div class="card-body bg-dark text-light">
       <h5 class="card-title">Title: <?= $row['title'];?></h5>
       <p class="card-text"> Description: <?= $row['description'];?></p>
       <p class="card-text"> Price: <?= $row['price'];?></p>
       <p class="card-text"> Category: <?= $row['category'];?></p>
       
    </div>
    </div>
       
</div>











<?php

require_once '../shared/footer.php';
?>