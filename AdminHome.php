<?php
require 'Config.php';

if(!isset($_SESSION['admin'])){
  header("location: login.php");
  die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="homepage.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="AdminHome.php"><img src="logo2.png"><span class="text">IETI</span> E-Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="AdminHome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AdminBooks.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="accounts.php">Accounts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AdminAnnouncement.php">Announcement</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item"  href=<?= "AdminAbout.php?ID=".$_SESSION["admin"] ?>>About me</a></li>
           
            <li><hr class="dropdown-divider"></li>
            <li> <a class="dropdown-item"  href="logout.php">Logout</a></li>
            
          </ul>
        </li>
        
      </ul>
    
    </div>
  </div>
</nav>


<div class="slide1 d-flex justify-content-center gap-5 p-5">
  <h1 class="text-uppercase text-white text-center">IETI E-LIBRARY</h1>
  <div class="search-bar1" id="ss">
    <input type="text" class="form" id="search1" autocomplete="off" placeholder="Search for keyword, title, author, description, etc." >
    <a class="submit"  name="submit2" id="searchbtn" ><img src="img/search.png" ></a>
  </div>
  <h4 class="text-white h6 text-center" id="hh">Discover academic books, journals, articles & more</h4>
</div>

<script>
  $(function(e) {
    const searchBar = $("#search1")

    $("#searchbtn").click(function(e) {
      location.href = `AdminBooks.php?query=${searchBar.val()}`
    })
  })
</script>





<div class="custom-card-container d-flex align-items-center justify-content-around flex-column flex-md-row my-4">

  <div class="custom-card-body w-25 d-flex align-items-center">
   <img src="./img/book.png" class="card1-img-top" alt="...">
      <h5 class="card-title text-center m-0">Number of Books</h5>
      <?php
        $rowCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM books WHERE archive = 1"));
        echo "<h5><center>".$rowCount."</center</h5>";
      ?>
  </div>

  <div class="custom-card-body w-25 d-flex align-items-center">
   <img src="./img/usercheck.png" class="card1-img-top" alt="...">
      <h5 class="card-title text-center m-0"> Active Users</h5>
      <?php
        $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM visitors"));
        echo "<h5><center>".$result['active_user']."</center</h5>";
      ?>
  </div>

  <div class="custom-card-body w-25 d-flex align-items-center">
   <img src="./img/acc.png" class="card1-img-top" alt="...">
      <h5 class="card-title text-center m-0">Accounts</h5>
      <?php
        $rowCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE verified= 1"));
        echo "<h5><center>".$rowCount."</center</h5>";
      ?>
  </div>

</div>



<div class="container py-5 ">
  <h1 class="text-center" id="aw">Explore More</h1>
  <br>
  <div class="row row-cols-1 row-cols-md-3 g-3 py-3 ">

    
<div class="col" >
<div class="card1" value="BSIT" id="btn1" >
  <center><img src="./img/online-test.png"   class="card1-img-top"  alt="..."></center>
  <div class="card-body1" >
    <h5 class="card-title" ><center>BSIT</center></h5>
   
  </div>
  </div>
  </div>

  <script>
  $(function(e) {
    const explore = $("#btn1")

    explore.click(function(e) {
      location.href = `AdminBooks.php?query=BSIT`
    })
  })
</script>



  <div class="col">
<div class="card1" id="btn2">
  <center><img src="./img/cpe.png" class="card1-img-top" alt="..."></center>
  <div class="card-body1">
    <h5 class="card-title"><center>BSCPE</center></h5>
   
  </div>
  </div>
  </div>

  <script>
  $(function(e) {
    const explore = $("#btn2")

    explore.click(function(e) {
      location.href = `AdminBooks.php?query=BSCPE`
    })
  })
</script>



  <div class="col">
<div class="card1" id="btn3">
  <center><img src="./img/education.png" class="card1-img-top" alt="..."></center>
  <div class="card-body1">
    <h5 class="card-title"><center>BSED</center></h5>
   
  </div>
  </div>
  </div>

  <script>
  $(function(e) {
    const explore = $("#btn3")

    explore.click(function(e) {
      location.href = `AdminBooks.php?query=BSED`
    })
  })
</script>



  <div class="col">
<div class="card1" id="btn4">
 <center> <img src="./img/hrm.png" class="card1-img-top" alt="..."></center>
  <div class="card-body1">
    <h5 class="card-title"><center>BSHRM</center></h5>
   
  </div>
  </div>
  </div>
  <script>
  $(function(e) {
    const explore = $("#btn4")

    explore.click(function(e) {
      location.href = `AdminBooks.php?query=BSHRM`
    })
  })
</script>


  <div class="col">
<div class="card1" id="btn5">
  <center><img src="./img/dit.png" class="card1-img-top" alt="..."></center>
  <div class="card-body1">
    <h5 class="card-title"><center>DIT</center></h5>
   
  </div>
  </div>
  </div>
  <script>
  $(function(e) {
    const explore = $("#btn5")

    explore.click(function(e) {
      location.href = `AdminBooks.php?query=DIT`
    })
  })
</script>



  <div class="col">
<div class="card1" id="btn6">
  <center><img src="./img/bsa.png" class="card1-img-top" alt="..."></center>
  <div class="card-body1">
    <h5 class="card-title"><center>BSA</center></h5>
  
  </div>
  </div>
  </div>
  <script>
  $(function(e) {
    const explore = $("#btn6")

    explore.click(function(e) {
      location.href = `AdminBooks.php?query=BSA`
    })
  })
</script>



  <div class="col">
<div class="card1" id="btn7">
  <center><img src="./img/bsba.png" class="card1-img-top" alt="..."></center>
  <div class="card-body1">
    <h5 class="card-title"><center>BSBA</center></h5>
    
  </div>
  </div>
  </div>
  <script>
  $(function(e) {
    const explore = $("#btn7")

    explore.click(function(e) {
      location.href = `AdminBooks.php?query=BSBA`
    })
  })
</script>


  <div class="col">
<div class="card1" id="btn8">
  <center><img src="./img/custom.png" class="card1-img-top" alt="..."></center>
  <div class="card-body1">
    <h5 class="card-title"><center>BSCA</center></h5>
    
  </div>
  </div>
  </div>
  <script>
  $(function(e) {
    const explore = $("#btn8")

    explore.click(function(e) {
      location.href = `AdminBooks.php?query=BSCA`
    })
  })
</script>


  <div class="col">
<div class="card1" id="btn9">
  <center><img src="./img/beed.png" class="card1-img-top" alt="..."></center>
  <div class="card-body1">
    <h5 class="card-title"><center>BEED</center></h5>
    
  </div>
  </div>
  </div>
  <script>
  $(function(e) {
    const explore = $("#btn9")

    explore.click(function(e) {
      location.href = `AdminBooks.php?query=BEED`
    })
  })
</script>


</div>
</div>



<footer class="bg-dark text-white pt-5 pb-4" id="as">
  <div class="container text-center text-md-left">
    <div class="row text-center text-md-left">
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">IETI - San Pedro</h5>
        <p style="font-size: x-large;">The School <span class="txt">that cares </span>and make your dreams <span class="txt">come true</span> </p>
      </div>
      
      

      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
      <h5 class=" text-uppercase mb-4 font-weight-bold text-warning">Contact us</h5>
        <p>
          <i class="fas fa-home mr-3"></i> Purok II, Brgy. Magsaysay, San Pedro City, Laguna, 4023
        </p>
        <p>
          <i class="fas fa-envelope mr-3"> </i> ietisanpedrolaguna@yahoo.com
        </p>
        <p>
          <i class="fas fa-phone mr-3"> </i> +63 283563817
        </p>
        
      </div>

    </div>
    <hr class="mb-4">
    <div class="row align-items-center">
      <div class="col-md-7 col-lg-8">
        <p> Copyright ©2023 All rights reserved by:
          <a href="#" style="text-decoration: none;">
            <strong class="text-warning">IETI College of Science and Technology - San Pedro</strong>
          </a>
        </p>
      </div>

      <div class="col-md-5 col-lg-4">
        <div class="text-center text-md-right">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a href="https://web.facebook.com/IETISPCSL" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="http://www.ieti.edu.ph/" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-google"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="https://web.facebook.com/IETISPCSL/about" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook-messenger"></i></a>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
  </div>



</footer>

