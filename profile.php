<?php
    include("header2.php");
    include("connection.php");
    session_start();
    if($_SESSION["user"]){
    $user = $_SESSION["user"];
    $village = $_SESSION["village"];
    $number = $_SESSION['number'];
    $sql = mysqli_query($conn, "SELECT * from booking WHERE username='$user' AND user_number='$number'");
    $usercount = mysqli_fetch_assoc($sql);
    }else{
        header("location:index.php?active=0");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <style>
        .form{
            margin-left: 2%;
            margin-right: 2%;
            border: 3px solid #f1f1f1;
            padding: 10px;
            margin-top: 5%;
        }
        .profile_pic {
            background-color: blue;
            height: 100px;
            width: 100px;
            margin: auto;
            border-style: solid;
            border-radius: 10px;
            border-width: 3px;
            border-color: black;
            margin-top:10%;
            /* margin-top: 10%;
            margin-bottom: 5%; */
        }
        .profile_post{
            /* background-color: blueviolet; */
            width:100%;
            /* margin-left: 10%;
            margin-right: 10%; */
            /* border-style: solid;
            border-radius: 1px;
            border-width: 1px; */
            /* border-color: black; */
            margin-top:10px;
        }
        .edit,.delete{
            /* background-color: blue; */
            border: none;
            color: white;
            padding: 5px 3px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            /* margin: 4px 2px; */
            cursor: pointer;
            display: inline-block;
        }
        .edit{
            background-color: green;
            margin-left:10px;
            
        }
        .delete{
            background-color: red;
            margin-left:20px;
        }
    </style>
</head>
<body>
    <div class="profile_pic">
        
    </div>
    <form action="profile_upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="filename">
        <input type="submit" value="Upload Profile Image" name="file_upload">
    </form>
    <div class="form">
        <?php 
            foreach($sql as $usercount) {
        ?>
        <div class="profile_post">
            Name of Driver: <?php echo $usercount['name']; ?><br/>
            Contact details: <?php echo $usercount['number']; ?><br/>
            Vehicle Type: <?php echo $usercount['vehicle_type']; ?><br/>
            Vehicle Number:<?php echo $usercount['vehicle_number']; ?><br/>
            <?php 
                echo "<a href='edit.php?id=".$usercount['id']."' class='edit'>Edit</a>
                <a href='delete.php?id=".$usercount['id']."' class='delete'>Delete</a>";
            ?>
            <hr />
        </div>
            <?php } ?>
    </div>
</body>
</html>
