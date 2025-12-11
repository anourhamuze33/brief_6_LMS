<?php
require_once "views/included_parts.php/header.php";
?>
<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>editer un Cours</h2>
    <form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="title">Titre du cours</label>
        <input class="updat" type="text" id="title" name="title" required />
        <label for="description">Description</label>
        <textarea class="updat" id="description" name="description" rows="4" placeholder="Une brève description du cours..." required></textarea>
        <label for="level">Niveau</label>
        <select class="updat" id="level" name="level" required>
            <option value="">-- Choisir un niveau --</option>
            <option value="Débutant">Débutant</option>
            <option value="Intermédiaire">Intermédiaire</option>
            <option value="Avancé">Avancé</option>
        </select>
        <button class="btn" type="submit">editer le cours</button>
        <a href="index.php" class="btn btn-delete btn_back">Go back</a>
    </form>
</div>