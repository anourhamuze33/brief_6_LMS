<?php
include "connect.php";
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = "DELETE FROM courses WHERE id = $id";
    mysqli_query($conn, $delete);
    header('location:index.php');
}
?>