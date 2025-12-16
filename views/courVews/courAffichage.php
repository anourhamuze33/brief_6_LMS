<?php
$title = "Available Courses";
ob_start();
echo '<div class="courses-grid">';
while ($cour = $cours->fetch_assoc()):
  echo '
  <div class="course-card" data-id ="' . $cour["id"] . '">
  <div class="course-title">' . $cour["title"] . '</div>
';
   if (!empty($cour["img"])) { ?>
      <div class="course-title"><img src="/views/assets/<?= $cour["img"] ?>" width="300"></div>
  <?php } 
  echo '
      <div class="course-desc">' . $cour["description"] . '</div>
      <div class="course-level">' . $cour["level"] . '</div>
      <a href="index.php?action=delete&delete=' . $cour["id"] . '" class="btn btn-delete">Enregistrer</a>
    <div class="buttons"> 
      <a href ="index.php?section_action=add_section&add=' . $cour["id"] . '" class="btn btn-add">Add</a>
      <a href="index.php?action=update&edit=' . $cour["id"] . '" class="btn btn-edit">Edit</a>
      <a href="index.php?action=delete&delete=' . $cour["id"] . '" class="btn btn-delete">Delete</a>
    </div>
  <form class="formcache" style="display:none" action="index.php?section_action=affichage" method="POST">
      <input class="inpuuut" type="hidden" name="course_id" value="">
  </form>
  </div>
    ';
endwhile;
echo "</div>";
$cards = ob_get_clean();
include_once "views/courVews/cadre.php";
// <?php
// include "connect.php";

// if(!$resultat){
//     die("invalid: " . $conn->error);
// }

// mysqli_free_result($resultat);
// 
