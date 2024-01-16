<?php

require 'Config.php';

if(!isset($_SESSION['user'])){
  header("location: login.php");
  die();
}




if(isset($_POST["read1"])){

  $select = "SELECT * FROM books WHERE ID=".$_POST["read1"];
$result = $conn->query($select);
while($row = $result->fetch_object()){
  $pdf = $row->Title;
  $path = $row->file;
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IETI E-LIBRARY</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="homepage.css">
  </head>
<body id="bb">



<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="bb">
  <div class="container-fluid" id="cc">
    <a class="navbar-brand" href="homepage.php"><img src="logo2.png"><span class="text">IETI</span> E-Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="books.php">Books</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="announcement.php">Announcement</a>
        </li>
        
    
    </div>
  </div>
</nav>





<?php

}

?>


    <!-- <iframe src="https://docs.google.com/viewer?url= <?php echo $path; ?>&embedded=true" frameborder= "0" width="100%" height="750px"></iframe> -->

</div>








