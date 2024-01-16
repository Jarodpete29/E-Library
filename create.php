
<?php

require 'Config.php';
if(!isset($_SESSION['admin'])){
    header("location: login.php");
    die();
  }

  

  if(isset($_POST["delete_ann"])){

    $ID = mysqli_real_escape_string($conn,$_POST['delete_ann']);
    $query ="DELETE FROM announcement WHERE ID='$ID'  ";
    $query_run = mysqli_query($conn, $query);
    

    if($query_run){
        $_SESSION['message'] = "Deleted Successfully";
        header("location: AdminAnnouncement.php");
        exit();
    }
    else{
        $_SESSION['message'] = "Delete Failed";
        header("location: AdminAnnouncement.php");
        exit();
    }
}






if(isset($_POST["delete_books"])){

    $ID = mysqli_real_escape_string($conn,$_POST['delete_books']);

    $query ="DELETE FROM books WHERE ID='$ID'  ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "Deleted Successfully";
        header("location: Adminbooks.php");
        exit();
    }
    else{
        $_SESSION['message'] = "Delete Failed";
        header("location: Adminbooks.php");
        exit();
    }
}


if(isset($_POST["delete_account"])){

  $ID = mysqli_real_escape_string($conn,$_POST['delete_account']);

  $query ="DELETE FROM users WHERE ID='$ID'  ";
  $query_run = mysqli_query($conn, $query);

  if($query_run){
      $_SESSION['message'] = "Deleted Successfully";
      header("location: accounts.php");
      exit();
  }
  else{
      $_SESSION['message'] = "Delete Failed";
      header("location: accounts.php");
      exit();
  }
}





if(isset($_POST["update_books"])){
    $ID = mysqli_real_escape_string($conn,$_POST['ID']);
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $author = mysqli_real_escape_string($conn,$_POST['author']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $course= mysqli_real_escape_string($conn,$_POST['course']);
    $year= mysqli_real_escape_string($conn,$_POST['year']);


    
    $query ="UPDATE books SET Title='$title',Author='$author',Description='$description',Category='$category',Course='$course',Year_lvl='$year'  WHERE ID='$ID'";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "Updated Successfully";
        header("location: Adminbooks.php");
        exit();
    }
    else{
        $_SESSION['message'] = "Book not Updated";
        header("location: Adminbooks.php");
        exit();
    }
}



if(isset($_POST["update_accounts"])){
  $ID = mysqli_real_escape_string($conn,$_POST['ID']);
  $Name = mysqli_real_escape_string($conn,$_POST['Name']);
  $Course_Yrlevel = mysqli_real_escape_string($conn,$_POST['Course_Yrlevel']);
  $ID_Number = mysqli_real_escape_string($conn,$_POST['ID_Number']);
  $Email = mysqli_real_escape_string($conn,$_POST['Email']);
  $Password= mysqli_real_escape_string($conn,$_POST['Password']);
  


  
  $query ="UPDATE users SET Name='$Name',Course_Yrlevel='$Course_Yrlevel',ID_Number='$ID_Number',Email='$Email',Password='$Password'  WHERE ID='$ID'";
  $query_run = mysqli_query($conn, $query);

  if($query_run){
      $_SESSION['message'] = "Updated Successfully";
      header("location: accounts.php");
      exit();
  }
  else{
      $_SESSION['message'] = "Account not Updated";
      header("location: accounts.php");
      exit();
  }
}


if(isset($_POST["search_delete"])){
    $ID = mysqli_real_escape_string($conn,$_POST['search_delete']);
     
    $query = "UPDATE books SET archive=0 WHERE ID='$ID'";
    $query_run = mysqli_query($conn, $query);
  
    if($query_run){
        $_SESSION['message'] = "Deleted Successfully";
    }
    else{
        $_SESSION['message'] = "Book not Deleted";
    }

    
    header("location: Adminbooks.php");
    exit();
  }



if(isset($_POST["delete"])){
    $ID = mysqli_real_escape_string($conn,$_POST['delete']);
     
    $query = "UPDATE books SET archive=0 WHERE ID='$ID'";
    $query_run = mysqli_query($conn, $query);
  
    if($query_run){
        $_SESSION['message'] = "Deleted Successfully";
    }
    else{
        $_SESSION['message'] = "Book not Deleted";
    }

    
    header("location: Adminbooks.php");
    exit();
  }



if(isset($_POST["Undo_delete"])){
    $ID = mysqli_real_escape_string($conn,$_POST['Undo_delete']);
    
    $query ="UPDATE books SET archive=1 WHERE ID='$ID'";
    $query_run = mysqli_query($conn, $query);
  
    if($query_run){
        $_SESSION['message'] = "Restored Successfully";
    }
    else{
        $_SESSION['message'] = "Not Restored";
        
    }
    header("location: archive.php");
    exit();
  }

  


  if(isset($_POST["real_delete"])){
    $ID = mysqli_real_escape_string($conn,$_POST['real_delete']);
    
    $query ="DELETE from books WHERE ID='$ID'";
    $query_run = mysqli_query($conn, $query);
  
    if($query_run){
        $_SESSION['message'] = " Permanently Deleted";
    }
    else{
        $_SESSION['message'] = "Delete Failed";
        
    }
    header("location: archive.php");
    exit();
  }






if(isset($_POST["add_books"])){
   
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $author = mysqli_real_escape_string($conn,$_POST['author']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $course= mysqli_real_escape_string($conn,$_POST['course']);
    $year= mysqli_real_escape_string($conn,$_POST['year']);
    
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png','pdf','xlsx', 'jfif');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'Uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
            }
            else{
                echo "Your file is too big!"; 
            }
        }
        else{
            echo "There was an error uploading your file!"; 
        }
    }
    else{
        echo "Cannot upload files of this type!";
    }
    
    $upload = $_FILES['upload'];
    $fileName = $_FILES['upload']['name'];
    $fileTmpName = $_FILES['upload']['tmp_name'];
    $fileSize = $_FILES['upload']['size'];
    $fileError = $_FILES['upload']['error'];
    $fileType = $_FILES['upload']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png','pdf','xlsx');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000000){
                $fileNameNew1 = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'FileUploads/'.$fileNameNew1;
                move_uploaded_file($fileTmpName, $fileDestination);
                
            }
            else{
                echo "Your file is too big!"; 
            }
        }
        else{
            echo "There was an error uploading your file!"; 
        }
    }
    else{
        echo "Cannot upload files of this type!";
    }

    $query ="INSERT INTO books (Title, Author, Description, Category, Course, Year_lvl, img, file) VALUES('$title', '$author','$description','$category','$course','$year','/elibrary/Uploads/$fileNameNew' ,'/elibrary/FileUploads/$fileNameNew1')";
    $query_run = mysqli_query($conn, $query);
      
    if($query_run){
        $_SESSION['message'] = "Added Successfully";
        header("location: addbooks.php");
        exit();
    }
    else{
        $_SESSION['message'] = "Book Not Added";
        header("location: addbooks.php");
        exit();
    }
  }
    
 
    




    if(isset($_POST["add_announcement"])){
   
      $txt = mysqli_real_escape_string($conn,$_POST['txt']);
      
      
  
      $file = $_FILES['picture'];
      $fileName = $_FILES['picture']['name'];
      $fileTmpName = $_FILES['picture']['tmp_name'];
      $fileSize = $_FILES['picture']['size'];
      $fileError = $_FILES['picture']['error'];
      $fileType = $_FILES['picture']['type'];
  
      
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array('jpg', 'jpeg', 'png','pdf','xlsx', 'jfif');
  
      
  
      if(in_array($fileActualExt, $allowed)){
          if($fileError === 0){
              if($fileSize < 10000000000){
                  $fileNameNew = uniqid('', true).".".$fileActualExt;
                  $fileDestination = 'pics-announcement/'.$fileNameNew;
                  move_uploaded_file($fileTmpName, $fileDestination);
                  
              }
              else{
                  echo "Your file is too big!"; 
              }
          }
          else{
              echo "There was an error uploading your file!"; 
          }
      }
      else{
          echo "Cannot upload files of this type!";
      }

      $query ="INSERT INTO announcement (text, picture) VALUES('$txt','/elibrary/pics-announcement/$fileNameNew') ";
      $query_run = mysqli_query($conn, $query);
        
      if($query_run){
          $_SESSION['message'] = "Added Successfully";
          header("location: addAnnouncement.php");
          exit();
      }
      else{
          $_SESSION['message'] = "Book Not Added";
          header("location: addAnnouncement.php");
          exit();
      }


      


               
      






}
if(isset($_POST["read"])){

$select = "SELECT * FROM books WHERE ID=".$_POST["read"];
$result = $conn->query($select);
while($row = $result->fetch_object()){
  $pdf = $row->Title;
  $path = $row->file;
  
}
?>

<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>ADMIN</title>

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/elibrary/css/style.css" />
  <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/bootstrap.bundle.js"></script>
  <meta name="pdf_path" content="<?php echo $path; ?>"/>
  
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="homepage.php" id="ad"><img src="logo2.png"><span class="text">IETI</span> E-Library</a>
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
          <a class="nav-link " href="AdminAnnouncement.php">Announcement</a>
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



  <canvas id="pdf-render"></canvas>
  <div class="top-bar">
    <button class="btn1" id="prev-page">
      <i class="fas fa-arrow-circle-left"></i> Prev Page
    </button>
    <button class="btn1" id="next-page">
      Next Page <i class="fas fa-arrow-circle-right"></i>
    </button>
    <button class="btn1" id="prev-page10">
      <i class="fas fa-angle-double-left"></i>
    </button>
    <button class="btn1" id="next-page10">
     <i class="fas fa-angle-double-right"></i>
    </button>
    <span class="page-info">
      Page <span id="page-num"></span> of <span id="page-count"></span>
    </span>
    
  </div>

  

  <script type="module">
      import pdfjsDist from '/elibrary/pdf.mjs'

      // The workerSrc property shall be specified.
      pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdf.worker.mjs';

      const filepath = document.querySelector("meta[name=pdf_path]")
      const url = filepath.getAttribute("content");

      let pdfDoc = null,
      pageNum = 1,
      pageIsRendering = false,
      pageNumIsPending = null;

      const scale = 1.5,
      canvas = document.querySelector('#pdf-render'),
      ctx = canvas.getContext('2d');

      // Render the page
      const renderPage = num => {
      pageIsRendering = true;

      // Get page
      pdfDoc.getPage(num).then(page => {
        // Set scale
        const viewport = page.getViewport({ scale });
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderCtx = {
          canvasContext: ctx,
          viewport
        };

        page.render(renderCtx).promise.then(() => {
          pageIsRendering = false;

          if (pageNumIsPending !== null) {
            renderPage(pageNumIsPending);
            pageNumIsPending = null;
          }
        });

        // Output current page
        document.querySelector('#page-num').textContent = num;
      });
      };

      // Check for pages rendering
      const queueRenderPage = num => {
      if (pageIsRendering) {
        pageNumIsPending = num;
      } else {
        renderPage(num);
      }
      };
      
     

      // Show Prev Page
      const showPrevPage10 = () => {
      if (pageNum <= 1) {
        return;
      }
      if(( pageNum - 10 ) < 1){
          pageNum -= (pageNum - 1)
        }else{
          pageNum -= 10
        }
      queueRenderPage(pageNum);
      };

      // Show Next Page
      const showNextPage10 = () => {
        if (pageNum >= pdfDoc.numPages) {
            return;
          }
        if(( pageNum + 10 ) > pdfDoc.numPages){
          pageNum += (pdfDoc.numPages - pageNum)
        }else{
          pageNum += 10
        }
        queueRenderPage(pageNum);
      };

      // Show Prev Page
      const showPrevPage = () => {
      if (pageNum <= 1) {
        return;
      }
      pageNum -= 1
      queueRenderPage(pageNum);
      };

      // Show Next Page
      const showNextPage = () => {
        if (pageNum >= pdfDoc.numPages) {
            return;
          }
        pageNum += 1
        queueRenderPage(pageNum);
      };

      // Get Document
      pdfjsLib
      .getDocument(url)
      .promise.then(pdfDoc_ => {
        pdfDoc = pdfDoc_;

        document.querySelector('#page-count').textContent = pdfDoc.numPages;

        renderPage(pageNum);
      })
      .catch(err => {
        // Display error
        const div = document.createElement('div');
        div.className = 'error';
        div.appendChild(document.createTextNode(err.message));
        document.querySelector('body').insertBefore(div, canvas);
        // Remove top bar
        document.querySelector('.top-bar').style.display = 'none';
      });

      // Button Events
      document.querySelector('#prev-page').addEventListener('click', showPrevPage);
      document.querySelector('#next-page').addEventListener('click', showNextPage);
      document.querySelector('#prev-page10').addEventListener('click', showPrevPage10);
      document.querySelector('#next-page10').addEventListener('click', showNextPage10); 
      
  </script>
</body>

</html>
<?php

}

?>















    