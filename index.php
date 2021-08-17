<?php
    include("connection.php");
    // if($_GET["active"]){
    // include("header2.php");
    // }else{
    //     include("header.php");
    // }
    if(isset($_POST['search'])){
        $search = $_POST['search'];
        $sql = mysqli_query($conn, "SELECT * from booking WHERE location='$search' OR name = '$search' OR vehicle_type = '$search' ORDER BY id DESC");
        $usercount = mysqli_fetch_assoc($sql);
        if($usercount){
        }else{
            $sql = mysqli_query($conn, "SELECT * from booking WHERE location LIKE '%$search%' OR name LIKE '%$search%' OR vehicle_type LIKE '%$search%' ORDER BY id DESC");
            $usercount = mysqli_fetch_assoc($sql);
        }
    }else{
        $sql = mysqli_query($conn, "SELECT * from booking ORDER BY id DESC");
        $usercount = mysqli_fetch_assoc($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .form{
            margin-left: 2%;
            margin-right: 2%;
            border: 3px solid #f1f1f1;
            padding: 10px;
            margin-top: 2%;
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
        #search{
            width:30%;
            margin-left:35%;
            margin-top:5%;
        }
        .home{
            background-image: url('home.jpeg');
            background-size: cover;
            width: 80px;
            height: 80px;
            font-size: 2em;
            margin-left:50%;
        }
        @media screen and (max-width: 600px) {
            #search{
                width:60%;
                margin-left:20%;
                margin-top:5%;
            }
            .home{
                background-image: url('home.jpeg');
                background-size: cover;
                width: 80px;
                height: 80px;
                font-size: 2em;
                margin-left:40%;
            }
        }
        
    </style>
</head>
<body>
    <button type="submit" class="home"></button>
    <?php  
    if($_GET["active"]){
     include("header2.php");
     }else{
         include("header.php");
     }
     ?>
    <form action="index.php?active=0" method="POST">
        <input type="text" placeholder="Search.." name="search" id="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <div class="form">
    <?php
        if($usercount){

        }else{
            echo "<h1>Nothing Found</h1>";
        }
    ?>
        <?php 
            foreach($sql as $usercount) {
        ?>
        <div class="profile_post" onClick="javascript:document.location.href='wherever.html';">
            <div style="color:green;"><b>Owner:</b> <?php echo "<b>".$usercount['name']."</b>"; ?></div>
            Location: <?php echo $usercount['location']; ?><br/>
            <b>Contact details:</b> <?php echo "<b>".$usercount['number']."</b>"; ?><br/>
            Vehicle Type: <?php echo $usercount['vehicle_type']; ?><br/>
            Vehicle Number: <?php echo $usercount['vehicle_number']; ?><br/>
            <hr /><hr />
        </div>
            <?php } ?>
    </div>
</body>
</html>
