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
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = mysqli_query($conn, "SELECT * from booking WHERE username='$user' AND id='$id'");
        $usercount = mysqli_fetch_assoc($sql);
    }
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $number = $_POST['number'];
        $vehicle_number = $_POST['vehicle_number'];
        $vehicle_type = $_POST['vehicle_type'];
        $update = mysqli_query($conn, "UPDATE booking SET name='$name', number='$number', vehicle_number = '$vehicle_number', vehicle_type = '$vehicle_type' WHERE id='$id'");
        header("location:profile.php?message=success");
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
<form action="edit.php?id=<?php echo $id ;?>" method="post">
    <div class="form">
        <b>Name:</b>
        <?php echo "<input type='text' name='name' class='input' value=".$usercount['name'].">"?><br />
        <b>Mobile Number:</b>
        <?php echo "<input type='number' name='number' class='input' value=".$usercount['number'].">"?><br />
        <b>Vehicle Number:</b>
        <?php echo "<input type='text' name='vehicle_number' class='input' value=".$usercount['vehicle_number'].">"?><br />
        <b>Vehicle Type:</b>
        <?php echo "<input type='text' name='vehicle_type' class='input' value=".$usercount['vehicle_type'].">"?><br />
        <button type="submit" class="submit" name="update">Update</button>
    </div>
</form>
<form action="profile.php" method="post">
    <div class="cancbutton">
        <button type="submit" class="cancel">Cancel</button>
    </div>
</form>
</body>
</html>