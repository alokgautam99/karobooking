<?php
    include("connection.php");
    echo "alok";
    session_start();
    if($_SESSION["user"]){
    $user = $_SESSION["user"];
    $number = $_SESSION['number'];
     echo $user;
     echo $number;
    // $sql = mysqli_query($conn, "SELECT * from booking WHERE username='$user' AND user_number='$number'");
    // $usercount = mysqli_fetch_assoc($sql);
    // }else{
    //     header("location:index.php?active=0");
     }
if(isset($_POST['file_upload'])){
    echo "alok";
    $postimg = htmlspecialchars(@$_FILES['filename']['size']);
    echo $postimg;
}
if ($postimg == 0) {
     header("location:profile.php");
 } else {
    
     if (((@$_FILES["filename"]["type"]=="image/jpeg") || (@$_FILES["filename"]["type"]=="image/png") || (@$_FILES["filename"]["type"]=="image/gif"))&&(@$_FILES["filename"]["size"] < 1048576)) //1 Megabyte
     {
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      $rand_dir_name = substr(str_shuffle($chars), 0, 15);
      mkdir("image/$rand_dir_name");
  
        if (file_exists("image/$rand_dir_name/".@$_FILES["filename"]["name"])){
            echo @$_FILES["filename"]["name"]." Already exists";
        }else{
            move_uploaded_file(@$_FILES["filename"]["tmp_name"],"image/$rand_dir_name/".$_FILES["filename"]["name"]);
            
             $post_pic_name = @$_FILES["filename"]["name"];
             $post_pic_query = mysqli_query($conn, "UPDATE users SET img='$rand_dir_name/$post_pic_name' WHERE username='$user' AND number='$number'");
             //UPDATE booking SET name='$name', number='$number', vehicle_number = '$vehicle_number', vehicle_type = '$vehicle_type' WHERE id='$id'
             header("location:profile.php");
        }
     } else {
         echo "Invalid File! Your image must be less than 1MB and must be either a .jpg, .png, .gif";
     }

 }

?>