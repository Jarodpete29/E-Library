<?php
require 'Config.php';
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
<div >

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="AdminHome.php"><img src="logo2.png"><span class="text">IETI</span> E-Library</a>
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
<div class="container mt-5">
    <?php include('message.php')?>
    <nav class="navbar ">
  
        
            <div class="card">
            <div class="card-header">
          <h4>
            <a href="accounts.php" class="btn btn-primary float-end"> Back</a>
            <div class="search-bar">
              <input type="text" class="form" id="search3" autocomplete="off" placeholder="Search..." >
          </h4>
    </form>      
</div>

<div class="card-body1">
<div class="container my-5">
  <table class="table table-bordered striped table-hover">

<div id="searchresult"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $("#search3").keyup(function(){
      
      var input = $(this).val();
      //alert(input);

      if(input !=""){
        $.ajax({
          url:"search3.php",
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




<div class="container mt-1">
    
    <div class="row">
        <div class="col-md-12">
            
            

    <table class="table table-bordered striped table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Course and Year Level</th>
          <th>ID Number</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="tbody">
      </tbody>
    </table>
    </div>
    <script>
        $(function(e) {

            function getData() {
                $.ajax({
                    type: "GET",
                    url: "/ELIBRARY/api/request.php",
                    success: (data) => {
                        const decodedData = JSON.parse(data)

                        decodedData.forEach(function(currentValue) {
                            $("tbody#tbody").append(`
                            <tr>
                                <td>${currentValue.ID}</td>
                                <td>${currentValue.Name}</td>
                                <td>${currentValue.Course_Yrlevel}</td>
                                <td>${currentValue.ID_Number}</td>
                                <td>${currentValue.Email}</td>
                                <td>
                                    <button type="submit" data-id="${currentValue.ID}" id="accept" value="" class="btn btn-success btn-sm">Accept</button>
                                    <button type="submit" data-id="${currentValue.ID}" id="reject" value="" class="btn btn-danger btn-sm">Reject</button>
                                </td>
                            </tr>
                            `)
                        })
                    },
                    error: (err) => {
                        console.log(err)
                    }
                })
            }

            getData()

            $("#tbody").on("click","#accept",function(e) {
                const dataId = $(this).attr("data-id")
                const self = $(this)
                $.ajax({
                    type: "PUT",
                    url: `/ELIBRARY/api/request.php?id=${dataId}`,
                    success: (response) => {
                        const decodedResponse = JSON.parse(response)
                        if(decodedResponse == 1){
                            alert("Accepted")
                        }else{
                            alert("Something unkown happened")
                        }
                        self.closest("tr").remove()
                    },
                    error: (err) => {
                        console.log(err)
                    }
                })
            })

            $("#tbody").on("click","#reject",function(e) {
                const dataId = $(this).attr("data-id")
                const self = $(this)
                $.ajax({
                    type: "DELETE",
                    url: `/ELIBRARY/api/request.php?id=${dataId}`,
                    success: (response) => {
                        const decodedResponse = JSON.parse(response)
                        if(decodedResponse == 1){
                            alert("Rejected")
                        }else{
                            alert("Something unknown happened")
                        }
                        self.closest("tr").remove()
                    },
                    error: (err) => {
                        console.log(err)
                    }
                })
            })
        })
    </script>
</div>
</div>
</div>
</div>