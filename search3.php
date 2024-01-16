<?php

include ("config.php");

if(isset($_POST['input'])){

  $input = $_POST['input'];

  $query = "SELECT * FROM users WHERE (ID like '{$input}%' OR Name like '{$input}%' OR Course_Yrlevel like '{$input}%' OR ID_Number like '{$input}%' OR Email like '{$input}%' OR Password like '{$input}%' OR Account_type like '{$input}%') AND verified IS NULL ORDER BY ID Desc ";

  $result = mysqli_query($conn,$query);

  if(mysqli_num_rows($result) > 0){?>
  <table class="table table-bordered table-hover">
  <thead>
      <tr>
      <th></th>
      </tr>
      <th>#</th>
      <th>Name</th>
      <th>Course and Year Level</th>
      <th>ID Number</th>
      <th>Email</th>
      <th>Password</th>
      <th>Account Type</th>
      </tr>
  </thead>
 
  <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)){
      $id = $row['ID'];
      $name = $row['Name'];
      $course = $row['Course_Yrlevel'];
      $idnum = $row['ID_Number'];
      $email = $row['Email'];
      $pass = $row['Password'];
      $acc = $row['Account_type'];
      

      ?>
      <tr>
        <td><?php echo $id;?></td>
        <td><?php echo $name;?></td>
        <td><?php echo $course;?></td>
        <td><?php echo $idnum;?></td>
        <td><?php echo $email;?></td>
        <td><?php echo $pass;?></td>
        <td><?php echo $acc;?></td>
        <td>
                <a href="EditAccounts.php?ID=<?= $row['ID']; ?>" class="btn btn-success btn-sm">Edit</a>
               
                <form action="create.php" method="POST" class="d-inline">
                  <button type ="submit" name="delete_account" value="<?=$row['ID'];?>" class="btn btn-danger btn-sm">Delete</a>
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
