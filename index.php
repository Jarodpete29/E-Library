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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>IETI E-LIBRARY</title>

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css" />
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
          <a class="nav-link " aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="books.php">Books</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="announcement.php">Announcement</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item"  href=<?= "about.php?ID=".$_SESSION["user"] ?>>About me</a></li>
           
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

      const scale = 3,
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