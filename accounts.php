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
    <link rel="stylesheet" href="account.css">
    
</head>
<body>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="Adminhome.php" id="br"><img src="logo2.png"><span class="text">IETI</span> E-Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="AdminHome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AdminBooks.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="accounts.php">Accounts</a>
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

<div class="container mt-3">
<div class="table-responsive">
    <?php include('message.php')?>
    <nav class="navbar ">
  
    
            <div class="card"  >
            <div class="card-header">
          <h4>
            <a href="request.php" class="btn btn-primary float-end"> Requests</a>
            <div class="search-bar">
              <input type="text" class="form" id="search1" autocomplete="off" placeholder="Search..." >
          </h4>
    </form>      
</div>

<div class="container " id="dd" >

  <table class="table table-bordered striped table-hover"  >

<div id="searchresult"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $("#search1").keyup(function(){
      
      var input = $(this).val();
      //alert(input);

      if(input !=""){
        $.ajax({
          url:"accountsearch.php",
          method:"POST",
          data:{input:input},

          success:function(data){
            $("#searchresult").html(data);
            $("#searchresult").css("display","block");
          }
        })
      }else{

          $("#searchresult").css("display","none");
      }
    });
  });


</script>
</div>
</div>
</div>



<?php include('message.php')?>
<div class="container mt-2"  >
  

    <div class="row">
        <div class="col-md-12" >
            
            
   
    <table class="table table-bordered striped table-hover" >
      <thead >
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Course and Year Level</th>
          <th>ID Number</th>
          <th>Email</th>
          <th>Password</th>
          <th>Account Type</th>
        </tr>
      </thead>
      
      <tbody  >
      
        <?php
        $query ="SELECT * FROM users WHERE verified= 1 ORDER BY ID Desc";
        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run)>0){
          foreach($query_run as $users)
          {
            ?>
             <tr>
              <td><?= $users['ID']; ?></td>
              <td><?= $users['Name']; ?></td>
              <td><?= $users['Course_Yrlevel']; ?></td>
              <td><?= $users['ID_Number']; ?></td>
              <td><?= $users['Email']; ?></td>
              <td><?= $users['Password']; ?></td>
              <td><?= $users['Account_type']; ?></td>
              <td>
                <a href="EditAccounts.php?ID=<?= $users['ID']; ?>" class="btn btn-success btn-sm">Edit</a>
               
                <form action="create.php" method="POST" class="d-inline">
                  <button type ="submit" name="delete_account" value="<?=$users['ID'];?>" class="btn btn-danger btn-sm">Delete</a>
                </form>
               
               
              </td>
        
        </tr>
        
        <?php
          }
        }
        else{
          echo "<h5> No Record Found</h5>";
        }
        ?>
      </tbody>
    </table>
    </div>  
    </div>
</div>
</div>
</div>
</div>
