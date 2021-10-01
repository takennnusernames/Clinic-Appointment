<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


    <link rel="stylesheet" href="style.css">
    <title>Clinic Appointment</title>
</head>
<header>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Clinic Appointment</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <?php if($url == "index.php") {?> 
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <?php }else{ ?>
            <a class="nav-link" href="index.php">Home</a>
            <?php }?>
          </li>
          <li class="nav-item">
            <?php if(!isset($_SESSION['username'])){ ?>
              <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Set Appointments
              </a>
            <?php }else if($url == "appointment.php")  {?> 
              <a class="nav-link active" aria-current="page" href="appointment.php">Set Appointments</a>
            <?php }else{ ?>
              <a class="nav-link" href="appointment.php">Set Appointments</a>
            <?php }?>
          </li>
          <li class="nav-item">
            <?php if(!isset($_SESSION['username'])){ ?>
              <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                My Appointments
              </a>
            <?php }else if($url == "myAppointment.php")  {?> 
              <a class="nav-link active" aria-current="page" href="myAppointment.php">My Appointments</a>
            <?php }else{ ?>
              <a class="nav-link" href="myAppointment.php">My Appointments</a>
            <?php }?>
          </li>
        </ul>
      </div>
      <?php if(!isset($_SESSION['username'])){ ?>
      <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        LOGIN
      </button>
      <?php }else{ $username = $_SESSION['username']; ?>
        <form action="logout.inc.php" method="POST" >
          <?php echo $username ?>
          <button type="submit" class="btn btn-outline-success me-2" name="logout">LOGOUT</button>
        </form>
      <?php } ?>
    </div>
  </nav>

  <?php 
    if(isset($_SESSION['username'])){
      if($_SESSION['username'] == "admin")  {
  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">ADMIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <?php if($_SERVER['REQUEST_URI'] == '/project/employee_register.php') {?> 
              <a class="nav-link active" aria-current="page" href="employee_register.php">Register Employee</a>
            <?php }else{ ?>
              <a class="nav-link" href="employee_register.php">Register Employee</a>
            <?php }?>
          </li>
          <li class="nav-item dropdown">
            <?php if($_SERVER['REQUEST_URI'] == '/project/accounts_customer.php' || $_SERVER['REQUEST_URI'] == '/project/accounts_employee.php') {?>
              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Accounts
              </a> 
            <?php }else{ ?>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Accounts
              </a>
            <?php }?>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="accounts_customer.php">Customer</a></li>
              <li><a class="dropdown-item" href="accounts_employee.php">Employee</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <?php if($_SERVER['REQUEST_URI'] == '/project/inventory.php') {?> 
            <a class="nav-link active" aria-current="page" href="inventory.php">Inventory</a>
            <?php }else{ ?>
            <a class="nav-link" href="inventory.php">Inventory</a>
            <?php }?>
          </li>
          <li class="nav-item">
            <?php if($_SERVER['REQUEST_URI'] == '/project/sales.php') {?> 
            <a class="nav-link active" aria-current="page" href="sales.php">Sales</a>
            <?php }else{ ?>
            <a class="nav-link" href="sales.php">Sales</a>
            <?php }?>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <?php    
      }
    }
  ?>
  <?php 
    if($url == "products.php") {
  ?> 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="products.php">Products</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <?php if($_SERVER['REQUEST_URI'] == '/project/products_laptop.php') {?> 
            <a class="nav-link active" aria-current="page" href="products_laptop.php">Laptops</a>
            <?php }else{ ?>
            <a class="nav-link" href="products_laptop.php">Laptops</a>
            <?php }?>
          </li>
          <li class="nav-item">
            <?php if($_SERVER['REQUEST_URI'] == '/project/products_desktop.php') {?> 
            <a class="nav-link active" aria-current="page" href="products_desktop.php">Desktops</a>
            <?php }else{ ?>
            <a class="nav-link" href="products_desktop.php">Desktops</a>
            <?php }?>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Parts
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="products_motherboard.php">Motherboard</a></li>
              <li><a class="dropdown-item" href="products_cpu.php">CPU</a></li>
              <li><a class="dropdown-item" href="products_gpu.php">GPU</a></li>
              <li><a class="dropdown-item" href="products_storage.php">HDD/SSD</a></li>
              <li><a class="dropdown-item" href="products_ram.php">RAM</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php } ?>
</header>
<body>
  <form method="POST">  
    
    <?php include('login_errors.inc.php'); ?>
    
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">LOGIN</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Username</label>
              <input maxlength="16" type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2">
              <button class="btn btn-primary" type="login" name="login">Login</button>
            </div>
          </div>
          <div class="modal-footer">
            No Account Yet?
            <a href="register.php">Register Here</a>
          </div>
        </div>
      </div>
    </div>
  </form>

 
</body>