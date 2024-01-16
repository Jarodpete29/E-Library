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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="addbook.css">
  </head>
<body>

<body>
<div >

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="AdminHome.php"><img src="logo2.png"><span class="text">IETI</span> E-Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="AdminHome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="AdminBooks.php">Books</a>
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
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        
      </ul>
    
    </div>
  </div>
</nav>
<br>
<div class="container mt-5">
    <?php include('message.php'); 
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h3 >
                Add Books
                <a href="AdminBooks.php" class="btn btn-danger float-end">Back</a>
                </h3>
                </div> 
                <div class="card-body">
                    <form action="create.php" method ="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label>Book Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Book Author</label>
                            <input type="text" name="author" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control" required>
                        </div>
                        <div class="  d-flex flex-row ">
                        <div class="mb-3 p-3">
                            <label>Year Level</label>
                            <select name="year">
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            </select>
                        </div >  
                        <div class="mb-3 p-3">
                            <label>Course</label>
                            <select name="course">
                            <option value="BSIT">BSIT</option>
                            <option value="BSCPE">BSCPE</option>
                            <option value="BSCPE">BSCA</option>
                            <option value="BSED">BSED</option>
                            <option value="BSHRM">BSHRM</option>
                            <option value="DIT">DIT</option>
                            <option value="BSBA">BSBA</option>
                            <option value="BSCA">BEED</option>
                            <option value="BSCA">BSA</option>
                            </select>
                        </div>   
                        </div>
                        <div class="mb-3">
                        <label>Upload Book </label>                     
                            <input type="file" name="upload" class="form-control" required>                            
                        </div>                               
                       <div class="mb-3">
                        <label>Upload Book Cover</label>                     
                            <input type="file" name="file" class="form-control">                            
                        </div>  
                        
                        <div class="mb-3">
                            <center><button type="submit" name="add_books" class="btn btn-primary">Save</button></center>
                        </div>
                    </form>
                </div> 
            </div>
                
        </div>
    </div>
</div>