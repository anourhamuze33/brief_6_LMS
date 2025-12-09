<?php
include "connect.php";
$inputs = array("title", "description", "level");
if(isset($_POST["title"]) && isset($_FILES['start'])){
    $inps = [];
    foreach($inputs as $input){
        $inps[] = $_POST[$input];
    }
       $file=$_FILES['start'];
       $fileName = time() . "_" . basename($file["name"]);
       $path = "C:\\laragon\\www\\brief_6_LMS\\";
       $filePath = $path . $fileName;
       move_uploaded_file($file["tmp_name"], $filePath);
        
    $sql = "INSERT INTO courses (title, description, level, img ) VALUES(?,?,?,?)";
    $stm = $conn->prepare($sql);
    $result = $stm->execute([$inps[0], $inps[1], $inps[2], $fileName]);
    header('location:index.php');
    $stm->close();
}

mysqli_close($conn);
?>