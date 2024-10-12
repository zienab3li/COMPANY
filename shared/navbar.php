<?php
require_once 'C:xampp/htdocs/company/app/functions.php';
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="<?= URL('index.php')?>">COMPANY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Move the items to the right -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URL('index.php')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Department
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= URL('departments/add.php')?>">ADD DEPARTMENT</a></li>
            <li><a class="dropdown-item" href="<?= URL('departments/list.php')?>">LIST DEPARTMENTS</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= URL('categories/add.php')?>">ADD CATEGORY</a></li>
            <li><a class="dropdown-item" href="<?= URL('categories/list.php')?>">LIST CATEGORIES</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Employee
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= URL('employees/add.php')?>">ADD EMPLOYEE</a></li>
            <li><a class="dropdown-item" href="<?= URL('employees/list.php')?>">LIST EMPLOYEES</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Products
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= URL('products/add.php')?>">ADD Product</a></li>
            <li><a class="dropdown-item" href="<?= URL('products/list.php')?>">LIST products</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
