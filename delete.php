<?php
    include("connection.php");
    session_start();
    if($_SESSION["user"]){
        $user = $_SESSION["user"];
        $village = $_SESSION["village"];
        $user_number = $_SESSION['number'];
    }else{
        header("location:index.php?message=login first");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        //$user = "alok";
        $delete = mysqli_query($conn,"DELETE FROM booking WHERE username='$user' AND id='$id'");
        if($delete){
            header("location:profile.php?message=deleted");
        }else{
            header("location:profile.php?message=error");
        }
    }
?>