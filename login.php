<?php
    include("header.php");
    include("connection.php");
    if(isset($_POST['login'])){
        $name = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["name"]);
        $number = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["number"]);
        $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
        $password = md5($password);
        $sql = mysqli_query($conn, "SELECT * from users WHERE username='$name' AND number='$number'");
        $usercount = mysqli_fetch_assoc($sql);
        $password2 = $usercount['password'];
        if($password == $password2){
            session_start();
            $_SESSION["user"] = $usercount['username'];
            $_SESSION["village"] = $usercount['village'];
            $_SESSION["number"] = $usercount['number'];
            header("location:profile.php");

        }else{
            //header("location:login.php?message=error");
        }
        // header("location:profile.php?message=success");
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
        #name{
            width: 100%;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin: 8px 0;
            padding: 12px 20px;
        }
        #number{
            width: 100%;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin: 8px 0;
            padding: 12px 20px;
        }
        #village{
            width: 100%;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin: 8px 0;
            padding: 12px 20px;
        }
        #password{
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
<form action="login.php" method="POST">
    <div class="form">
        <b>Name:</b>
        <input type="text" name="name" id="name">
        <b>Mobile Number:</b>
        <input type='number' name='number' id='number'><br />
        <b>Password</b>
        <input type='password' name='password' id='password'><br />
        <button type="submit" class="submit" name="login">Login</button>
    </div>
</form>
<form action="index.php" method="post">
    <div class="cancbutton">
        <button type="submit" class="cancel">Cancel</button>
    </div>
</form>
</body>
</html>