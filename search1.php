<?php

include ("config.php");

if(isset($_POST['input'])){

  $input = $_POST['input'];

  $query = "SELECT * FROM books WHERE (ID like '%{$input}%' OR Title like '%{$input}%' OR Author like '%{$input}%' OR Description like '%{$input}%' OR Category like '%{$input}%' OR Course like '%{$input}%' OR Year_lvl like '%{$input}%') AND archive=1 ORDER BY ID Desc";

  $result = mysqli_query($conn,$query);

  if(mysqli_num_rows($result) > 0){?>
  <table class="table table-bordered table-hover">
  <thead>
      <tr>
      <th></th>
      </tr>
      <th>#</th>
      <th><center>Book Cover</center></th>
      <th>Title</th>
      <th>Author</th>
      <th>Description</th>
      <th>Category</th>
      <th>Course</th>
      <th>Year Level</th>
      </tr>
  </thead>
    
  <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)){
      $id = $row['ID'];
      $img = $row['img'];
      $title = $row['Title'];
      $author = $row['Author'];
      $description = $row['Description'];
      $category = $row['Category'];
      $course = $row['Course'];
      $yearlvl= $row['Year_lvl'];

      ?>
      <tr>
        <td><?= $row['ID']; ?></td>
        <td class="centers" style="max-width: 150px; "><img class="imahe"  src=<?= $row['img']; ?>></td>
        <td style="max-width: 20vw;  "><?php echo $title;?></td>
        <td style="max-width: 10vw; "><?php echo $author;?></td>
        <td style="max-width: 5vw; "><?php echo $description;?></td>
        <td style="max-width: 10vw; "><?php echo $category;?></td>
        <td style="max-width: 10vw; "><?php echo $course;?></td>
        <td><?php echo $yearlvl;?></td>
        <td class="btn-cont">
        <a href="editbooks.php?ID=<?= $row['ID']; ?>" class="btn1 btn-success btn-sm">Edit</a>
                      
          <form action="create.php" method="POST" class="d-inline" >
            <button type ="submit" id="jj1" name="read" value="<?= $row['ID'];?>" class="btn1 btn-primary btn-sm">Read</a>
            <button type ="submit" style="margin-top:5px" name="search_delete" value="<?= $row['ID'];?>" class="btn1 btn-danger btn-sm">Delete</a>
          </form>
                                  
        </td>
      </tr>

      <?php
    }
    ?>
  </tbody>

  </table>

  <?php


  }else{
    echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6>";
  }

}
?>
