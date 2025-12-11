<?php
$title = "Suprimmer un cour";
$form = '';
ob_start();
?>
<p class="textt">conffirmer la suppression de cette cour</p>
    <div class="course-card containe" data-id="<?= $select_deleted["id"] ?>">
        <div class="course-title"><?= $select_deleted["title"] ?></div>
        <div class="course-title"><img src="views/assets/<?= $select_deleted["img"] ?>" width="300"></div>
        <div class="course-desc"><?= $select_deleted["img"] ?></div>
        <div class="course-level"><?= $select_deleted["level"] ?></div>
    </div>
<div class="btn-container ccc">
    <a href="../../index.php" class="btn-edit-sec">
        Canale
    </a>
    <a href="../../index.php?action=deleted&deleted=<?= $_GET['delete'] ?>" class="btn-delete-sec">
        Delete
    </a>
</div>
<?php $cards = ob_get_clean();
include_once "views/courVews/cadre.php";
?>