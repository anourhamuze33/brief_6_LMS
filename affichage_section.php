<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "connect.php";
    $id = $_POST['course_id'] ?? null;
    if ($id == null) {
        $id = $_GET['affich'];
    }
    // if (!isset($_POST['course_id'])) {
    //     echo "noooo";
    // }
    $course = "SELECT id, title, description, level FROM courses where id = $id";
    $result = $conn->query($course)->fetch_assoc();

    $sections = "SELECT * FROM sections where course_id = $id";
    $resultat = $conn->query($sections);
    echo  '<div class="cont2">';
    ?>
    <div class="course-header">
        <div class="course-name"><?= $result['title'] ?></div>
    </div>
    <?php echo '
              <a href ="add_section.php?add='.$id.'">
              <button class="open-modal-btn btn-add" style="margin-bottom:3rem">Ajouter une sections</button>
              </a>
    ' ?>
    <?php echo '<div class="sections-grid">' ?>

    <?php while ($section = $resultat->fetch_assoc()): ?>

        <div class="section-card">
            <?php
            if ($section["position"] < 10) {
                echo    '<div class="section-number">0' . $section["position"] . ' </div>';
            } else {
                echo    '<div class="section-number">' . $section["position"] . ' </div>';
            }
            ?>

            <div class="section-header">
                <p class="section-description" style="font-size: 2rem; font-weight:bold"><?=  $section["title"]?></p>
                <div class="section-badge">
                    <span><?= $section["niveau"] ?></span>
                </div>
                <p class="section-description" style="font-weight: bold">
                    <?= $section["content"] ?>
                </p>
            </div>
            <div class="section-meta">
                <div class="meta-item">
                    <div class="meta-icon">⏱</div>
                    <span><?= $section["duree"] ?></span>
                </div>
                <div class="meta-item">
                    <span>12 leçons</span>
                </div>
                <div class="meta-item">
                    <span>2.4k étudiants</span>
                </div>
            </div>

            <div class="section-footer">
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 10%"></div>
                </div>
                <span class="progress-text">0%</span>
            </div>
            <div class="btn-container">
                <a href="add_section.php?edit_section=<?= $section['id']?>&affich=<?=$id?>" class="btn-edit-sec">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Edit
                </a>
                <a href="delete_section.php?delete_section=<?=$section['id']?>&affich=<?=$id?>" class="btn-delete-sec">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                    Delete
                </a>
            </div>
        </div>
    <?php
    endwhile;
    echo "</div>
<a href='index.php'><button class='open-modal-btn'> go back</button></a>";

    echo "</div> 
" ?>
<?php 
$id = null;
?>
</body>

</html>