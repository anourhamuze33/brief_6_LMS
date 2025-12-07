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
if($id==null){
    $id= $_GET['affich'];
}
if(!isset($_POST['course_id'])){
    echo "noooo";
}
$course ="SELECT id, title, description, level FROM courses where id = $id";
$result = $conn->query($course)-> fetch_assoc();

$sections = "SELECT * FROM sections where course_id = $id";
$resultat = $conn->query($sections);
echo  '<div class="cont2">';
?>
  <div class="course-header">
        <div class="course-name"><?= $result['title'] ?></div>
    </div>
    <?php echo '<div class="sections-grid">' ?>
        
<?php while($section = $resultat->fetch_assoc()): ?>

        <div class="section-card">
            <?php
                 if($section["position"]<10){
                     echo    '<div class="section-number">0'.$section["position"].' </div>';
                 }
                 else{
                     echo    '<div class="section-number">'.$section["position"].' </div>';

                 }
            ?>

            <div class="section-header">
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
        </div>
<?php 
endwhile;
echo "</div>
<a href='index.php'><button class='open-modal-btn'> go back</button></a>";

echo"</div> 
" ?>
</body>
</html>