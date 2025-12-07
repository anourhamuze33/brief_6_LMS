<?php
include "connect.php";
if(isset($_GET['delete_section'])){
    $id = $_GET['delete_section'];
    $id2 = $_GET['affich'];
    $delete = "DELETE FROM sections WHERE id = $id";
    mysqli_query($conn, $delete);
    header("location:affichage_section.php?affich=$id2");
}
?>