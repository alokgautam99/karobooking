<?php
    if(isset($_POST['submit'])){
        $filecount = count($_FILES['file']['name']);
        $filename = $_FILES['file']['name'][0];
        if($filename == NULL){
            echo "null";
        }else{
            for($i=0;$i<3;$i++){
                $bytes = uniqid();
                $filename = $_FILES['file']['name'][$i];
                $ext = explode(".",$filename);
                $filename = $ext[0].$bytes;
                $file_upload[$i] = $filename.".".$ext[1];
                move_uploaded_file($_FILES['file']['tmp_name'][$i], 'upload/'.$file_upload[$i]);
            }
            print_r($file_upload);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="multiplefileupload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file[]" id="file" multiple>
        <input type="submit" name="submit" value="upload">
    </form>
</body>
</html>