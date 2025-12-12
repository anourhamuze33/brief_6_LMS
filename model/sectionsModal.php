<?php
function listsection()
{
    include "connect.php";
    $id = $_POST['course_id'] ?? null;
    if ($id == null) {
        $id = $_GET['affich'];
    }
    if (!$id) {
    die("ERROR: Missing course ID. Please use ?affich=COURSE_ID in the URL.");
}
    // if (!isset($_POST['course_id'])) {
    //     echo "noooo";
    // }
    $course = "SELECT id, title, description, level FROM courses where id = $id";
    $result = $conn->query($course)->fetch_assoc();
    $sections = "SELECT * FROM sections where course_id = $id";
    $resultat = $conn->query($sections);

    $reults= array($result, $resultat, $id);
    return $reults;
}


function addSection()
{
include "connect.php";
// if(isset($_GET['edit_section'])){
//   $id = $_GET["edit_section"];
// $inputs = array("title", "content", "niveau", "duree", "position");
// if (isset($_POST["title"])) {

//     $inps = [];
//     foreach ($inputs as $input) {
//         $inps[] = $_POST[$input];
//     }
//         $select = "UPDATE sections SET title = '$inps[0]', content =' $inps[1]', niveau = '$inps[2]', duree = '$inps[3]', position = '$inps[4]' WHERE id = $id";
//         $update_select = mysqli_query($conn, $select);
//     header("location:affichage_section.php?affich=$id2");
// }
// return $update_select ?? null;
// }
    if (!isset($_GET["add"])) {
return null;
    }
        $id_aff = $_GET["add"];
        $inputs = array("title", "content", "niveau", "duree", "position");
        if (isset($_POST["title"])) {
            $inps = [];
            foreach ($inputs as $input) {
                $inps[] = $_POST[$input];
            }
            $sql = "INSERT INTO sections (title, content, niveau, duree, position, course_id) VALUES(?,?,?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("sssiii", $inps[0], $inps[1], $inps[2], $inps[3], $inps[4], $id_aff);
            $stm->execute();
            $stm->close();
        }     
return $id_aff;
}



function deleteSection()
{
include "connect.php";
if(isset($_GET['delete_section'])){
    $id = $_GET['delete_section'];
    $id2 = $_GET['affich'];
    $select1 = "SELECT * FROM courses Where id= $id2";
    $result_title = mysqli_query($conn, $select1)->fetch_assoc();
    $select = "SELECT * FROM sections Where id= $id";
    $result_sect = mysqli_query($conn, $select)->fetch_assoc();
    return $result = array($result_title, $result_sect, $id2, $id);
}

}

function deletedSection()
{
    include "connect.php";
if(isset($_GET['delete_section'])){
    $id = $_GET['delete_section'];
    $id2 = $_GET['affich'];
    $delete = "DELETE FROM sections WHERE id = $id";
    mysqli_query($conn, $delete);
    return $id2;
}
}



function select_update_section($id)
{
include "connect.php";
$select_update = "SELECT * FROM sections where id=$id";
$selected = $conn->query($select_update);
 return $selected-> fetch_assoc();
}



function update_section()
{
include "connect.php";
if(isset($_GET['edit_section'])){
$id = $_GET["edit_section"];
$inputs = array("title", "content", "niveau", "duree", "position");
if (isset($_POST["title"])) {
    $inps = [];
    foreach ($inputs as $input) {
        $inps[] = $_POST[$input];
    }
        $select = "UPDATE sections SET title = '$inps[0]', content =' $inps[1]', niveau = '$inps[2]', duree = '$inps[3]', position = '$inps[4]' WHERE id = $id";
        $update_select = mysqli_query($conn, $select);
    return $select;
}
}
}
?>