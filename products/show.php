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
        <img src="https://th.bing.com/th?id=OIP.53WIX2fcS_2xo5F6WYscggHaFj&w=288&h=216&c=8&rs=1&qlt=90&r=0&o=6&dpr=1.5&pid=3.1&rm=2" alt="img" class="img-fluid">
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