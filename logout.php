<?php
require 'Config.php';

if(isset($_SESSION['user'])){
    mysqli_query($conn, "UPDATE visitors SET active_user=active_user-1;");
}

session_destroy();
header("location: welcome.php");
?>