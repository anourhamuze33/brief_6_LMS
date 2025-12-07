<link rel="stylesheet" href="style.css">
<?php
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
        header('location:index.php');
    }
}
?>
<div class="container">
    <h2>editer un Cours</h2>
    <form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="title">Titre du cours</label>
        <input type="text" id="title" name="title" required />
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Une brève description du cours..." required></textarea>
        <label for="level">Niveau</label>
        <select id="level" name="level" required>
            <option value="">-- Choisir un niveau --</option>
            <option value="Débutant">Débutant</option>
            <option value="Intermédiaire">Intermédiaire</option>
            <option value="Avancé">Avancé</option>
        </select>
        <button class="btn" type="submit">editer le cours</button>
        <a href="index.php" class="btn btn-delete btn_back">Go back</a>
    </form>
</div>