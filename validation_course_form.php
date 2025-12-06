<?php
include "connect.php";
$inputs = array("title", "description", "level");
if(isset($_POST["title"])){
    $inps = [];
    foreach($inputs as $input){
        $inps[] = $_POST[$input];
    }
    $sql = "INSERT INTO courses (title, description, level ) VALUES(?,?,?)";
    $stm = $conn->prepare($sql);
    $result = $stm->execute([$inps[0], $inps[1], $inps[2]]);
    header('location:index.php');
    $stm->close();
}
mysqli_close($conn);
?>