<?php
require 'Config.php';
if(isset($_POST["submit"])){
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Course_Yrlevel = mysqli_real_escape_string($conn, $_POST['Course_Yrlevel']);
    $ID_Number =  mysqli_real_escape_string($conn,$_POST['ID_Number']);
    $Email=  mysqli_real_escape_string($conn,$_POST['Email']);
    $Password =  mysqli_real_escape_string($conn,$_POST['Password']);
    $ConfirmPassword =  mysqli_real_escape_string($conn,$_POST['ConfirmPassword']);
    $Account_type =  mysqli_real_escape_string($conn,$_POST['Account_type']);

$select ="SELECT * FROM users WHERE Email = '$Email' && Password = '$Password'";
$result = mysqli_query($conn, $select);
if(mysqli_num_rows($result)>0){
    echo
    "<script> alert('User Already Exist'); </script>";
}
    else{
        if($Password == $ConfirmPassword){
            $query = "INSERT INTO users VALUES('', '$Name', '$Course_Yrlevel', '$ID_Number', '$Email', '$Password', '$Account_type', NULL)";
            mysqli_query($conn,$query);
            echo
            
             "<script> alert('Registration Successful! Wait until the Admins accept your request'); 
             window.location.href='welcome.php';</script>";
            
        }
        else{
            echo
            "<script> alert('Password does not match'); </script>";
        }}
    }

    
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="reg.css" rel="stylesheet">
</head>
<body>
    <div class="form-container">

   
   
    <form class="" action="" method="post" autocomplete="off">
    <h1>Register Now</h1>

        
        <input type="text" name="Name" required placeholder="Enter your Name"> 
        <input type="text" name="Course_Yrlevel" required placeholder="Enter your Course and Year Level">
        <input type="text" name="ID_Number" required placeholder="Enter your ID Number"> 
        <input type="text" name="Email" required placeholder="Enter your Email"> 
        <input type="password" name="Password" required placeholder="Enter your Password"> 
        <input type="password" name="ConfirmPassword" required placeholder="Confirm Password"> 

    
        <select name="Account_type">
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select><br><br>
        <input type="submit" name="submit" value="Signup" class="form-btn"><br><br>
        <p>Already have an account? <a href="login.php">Login now</a></p>
     
    </form>
    <br>
    
    </div>
    </div>
</body>
</html>