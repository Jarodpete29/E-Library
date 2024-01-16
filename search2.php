<?php

include ("config.php");

if(isset($_POST['input'])){

  $input = $_POST['input'];

  $query = "SELECT * FROM books WHERE ID like '%{$input}%' OR Title like '%{$input}%' OR Author like '%{$input}%' OR Description like '%{$input}%' OR Category like '%{$input}%' OR Course like '%{$input}%' OR Year_lvl like '%{$input}%' ORDER BY ID Desc ";

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
        <td><?php echo $id;?></td>
        <td style="max-width: 15vw; "><img src=<?= $row['img']; ?>></td>
        <td><?php echo $title;?></td>
        <td><?php echo $author;?></td>
        <td><?php echo $description;?></td>
        <td><?php echo $category;?></td>
        <td><?php echo $course;?></td>
        <td><?php echo $yearlvl;?></td>
        <td class="btn-cont">
                                  
                                
                                  <form action="UserRead.php" method="POST" class="d-inline" >
                                    <button type ="submit"  name="read1" value="<?= $row['ID'];?>" class="btn1 btn-primary  btn-block">Read</a>
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
