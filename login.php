<?php
require 'Config.php';

if(isset($_SESSION["user"])){
    header("location: homepage.php");
    die();
}elseif(isset($_SESSION["admin"])){
    header("location: Adminhome.php");
    die();
}

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     if(isset($_POST["submit"])){
//         $Email=  mysqli_real_escape_string($conn,$_POST['Email']);
//         $Password =  mysqli_real_escape_string($conn,$_POST['Password']);
//         $result = mysqli_query($conn, "SELECT * FROM users WHERE Email = '$Email'");
//         $row = mysqli_fetch_assoc($result);
//         if(mysqli_num_rows($result)>0){
//             if($Password == $row["Password"]){
//                 if ($row['Account_type'] == 'student'){
//                     if($row['verified'] == 0 || !isset($row['verified'])){
//                         echo "<script> alert('Account not verified');</script>";
                        
//                     }else{
//                         $_SESSION["user"] = true;
//                         mysqli_query($conn, "UPDATE visitors SET active_user=active_user+1;");
//                         header("location: homepage.php");
//                         die();
//                     }
//                 }
//                 elseif($row['Account_type'] == 'admin'){
//                     $_SESSION["admin"] = true;
//                     header("location: Adminhome.php");
//                     die();
//             }
//             else{
//                     echo "<script> alert('Wrong Password'); </script>";
//                 }
//             }
//         }
//         else{
//             echo "<script> alert('User Not Registered'); </script>";
          
            
//         }
//     }
// }



?>



<?php 

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="login.css" rel="stylesheet">
    <script src="/elibrary/jquery.min.js"></script>
</head>
<body>
    <div class ="form-container1">
        
    <form class="" id="id">
    <h1>Login</h1>
    <input type="text" name="Email" placeholder="Enter your Email"> 
        <input type="password" name="Password" placeholder="Enter your Password"> 
       
        
        <input type="submit" name="submit" value="Login" id="submit" class="form-btn"><br><br>
       
        <p>Don't have an account? <a href="Registration.php">Signup now</a></p>

    </form>
 
    </div>

    </div>
    <script>
    $(function(e) {
        const email = $("input[name=Email]")
        const pwd = $("input[name=Password]")
        $("#id").submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: "POST",
                url: "/elibrary/1login.php",
                headers: {
                    "Content-Type": "application/json"
                },
                data: JSON.stringify({
                    email: email.val(),
                    pwd: pwd.val()
                }),
                success: (res) => {
                    if(!res.includes("php")){
                        alert(res);
                    }else{
                        location.replace(`/elibrary/${res}`)
                    }
                }
            })
        })
    })</script>
</body>
</html>
    
    <?php
}

?>
