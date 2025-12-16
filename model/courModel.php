<?php
function listCours()
{
include "connect.php";
$select = "SELECT id, title, description, level, img FROM courses";
 return $cours = $conn->query($select);
}
function create()
{
  include "connect.php";
$inputs = array("title", "description", "level");
if(isset($_POST["title"])){
    $inps = [];
    foreach($inputs as $input){
        $inps[] = $_POST[$input];
    }
       $file=$_FILES['start'];
       $fileName = time() . "_" . basename($file["name"]);
       $path = "C:\\laragon\\www\\brief_6_LMS\\views\\assets\\";
       $filePath = $path . $fileName;
       move_uploaded_file($file["tmp_name"], $filePath);
    $sql = "INSERT INTO courses (title, description, level, img) VALUES(?,?,?,?)";
    $stm = $conn->prepare($sql);
    $result = $stm->execute([$inps[0], $inps[1], $inps[2], $fileName]);
    $stm->close();
}
mysqli_close($conn);
return $result;
}
// && isset($_FILES['start'])

function delete($id)
{
include "connect.php";
if(isset($id)){
    $delete = "DELETE FROM courses WHERE id = $id";
    mysqli_query($conn, $delete);
    //or prepare("DELETE FROM courses WHERE id = ?")
    //execute([$id])
}
}

function select_delete($id)
{
include "connect.php";
$select_delete = "SELECT id, title, description, level, img FROM courses where id = $id";
 $selected = $conn->query($select_delete);
 return $selected-> fetch_assoc();
}

function select_update($id)
{
include "connect.php";
$select_delete = "SELECT id, title, description, level, img FROM courses where id = $id";
 $selected = $conn->query($select_delete);
 return $selected-> fetch_assoc();
}

function update()
{
include "connect.php";
$inputs = array("title", "description", "level");
if (isset($_POST["title"])) {
    $inps = [];
    foreach ($inputs as $input) {
        $inps[] = $_POST[$input];
    }
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $select = "UPDATE courses SET title = '$inps[0]', description =' $inps[1]', level = '$inps[2]' WHERE id = $id";
        mysqli_query($conn, $select);
    }
    return $select;
}
}


