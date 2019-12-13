<?php
require_once "admin/object.php";
$menus=$category->getCategoryForMenu();
@session_start();
    if(!isset($_SESSION['user_name']) || empty($_SESSION['user_name'])){
        header('location:index.php?msg=1');
    }
// print_r($menus)

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Food Order</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>
  <body>
    <head> 
    <div class="cotainer">
      <div class="row head">
        <div class="col-md-4">
          <a href="home.php">
            <!-- <h1>Food Ordering System</h1> -->
            <img src="images/logo.png" height="90" width="200">
          </a>
        </div>
        <div class="col-md-5">



          <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item activedropdown">
                  
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <h1> Categories</h1>  
                    </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach ($menus as $menu) {?>
                      <a class="dropdown-item" href="category.php?id=<?php echo $menu->id ?>"><?php echo $menu->name; ?></a>

                   <?php  } ?>
                    
                  </div>
                </li>
               
              </ul>
              
            </div>
          </nav>

           
        </div>
        <div class="col-md-3">

          <nav class="navbar navbar-expand-lg navbar-light ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item activedropdown">
                  
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <h3> welcome <?php echo $_SESSION['user_name'];  ?></h3>  
                    </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="logout.php">logout</a>
                  </div>
                </li>
               
              </ul>
              
            </div>
          </nav>
        </div>
      </div>
    </head>