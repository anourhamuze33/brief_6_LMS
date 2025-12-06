<?php
include "connect.php";
$select = "SELECT id, title, description, level FROM courses";
$resultat = $conn->query($select);
if(!$resultat){
    die("invalid: " . $conn->error);
}
echo '<div class="courses-grid">';
while($cour = $resultat-> fetch_assoc()):
    echo '
  <div class="course-card">
      <div class="course-title">'.$cour["title"] .'</div>
      <div class="course-desc">'.$cour["description"] .'</div>
      <div class="course-level">'.$cour["level"] .'</div>
    <div class="buttons"> 
      <a href ="add.php?add='.$cour["id"].'" class="btn btn-add">Add</a>
      <a href="update.php?edit='.$cour["id"].'" class="btn btn-edit">Edit</a>
      <a href="delete.php?delete='.$cour["id"].'" class="btn btn-delete">Delete</a>
    </div>
  </div>
    ';
endwhile;
echo "</div>";
mysqli_free_result($resultat);
?>