<?php
    include("header2.php");
    include("connection.php");
    session_start();
    if($_SESSION["user"]){
        $user = $_SESSION["user"];
        $village = $_SESSION["village"];
        $user_number = $_SESSION['number'];
    }else{
        header("location:index.php?message=login first");
    }
    if(isset($_POST['upload'])){
        $name = htmlspecialchars(@$_POST['name']);
        $number = htmlspecialchars(@$_POST['number']);
        $vehicle_number = htmlspecialchars(@$_POST['vehicle_number']);
        $vehicle_type = htmlspecialchars(@$_POST['vehicle_type']);
        $sqlCommand = "INSERT INTO booking VALUES('','$user','$user_number','$name','$number','$vehicle_number','$vehicle_type','$village')";
        $query = mysqli_query($conn , $sqlCommand) or die(mysql_error());
        header("location:profile.php?message=success");
    }
    if(isset($_GET['message'])){
        $message = $_GET['message'];
        if($message == "success"){
            echo "<div style='color:green;'>Submitted successfully</div>";
        }else{
            echo"<div style='color:red'><b>Error:</b>Check your internet connection</div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .form{
            margin-left: 15%;
            margin-right: 15%;
            border: 3px solid #f1f1f1;
            padding: 16px;
        }
        .input{
            width: 100%;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin: 8px 0;
            padding: 12px 20px;
        }
        .submit{
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .cancel{
            width: 100%;
            padding: 10px 18px;
            background-color: #f44336;
            color: white;
        }
        .cancbutton{
            margin-left: 15%;
            margin-right: 15%;
            border: 3px solid #f1f1f1;
            padding: 16px;
        }
    </style>
</head>
<body>
    <form action="upload.php" method="post">
        <div class="form">
            <b>Name of driver:</b>
            <input type="text" name="name" class="input" ><br />
            <b>Mobile Number of Driver:</b>
            <input type="text" name="number" class="input" ><br/>
            <b>Vehicle number</b>
            <input type="text" name="vehicle_number" class="input" ><br/>
            <b>Vehicle Type</b>
            <input type="text" name="vehicle_type" class="input" placeholder="Car,Safari"><br/>
            <button type="submit" class="submit" name="upload">Upload</button>
        </div>
    </form>
    <div class="cancbutton">
        <button type="submit" class="cancel">Cancel</button>
    </div>
</body>
</html>