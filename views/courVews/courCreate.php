<?php ob_start(); ?>
<div id="courseModal" class="modal none">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Ajouter un Cours</h2>
        <form class="form" action="../../index.php?action=store" method="POST" enctype="multipart/form-data">
            <label for="title">Titre du cours</label>
            <input type="text" id="title" name="title" required />

            <label for="start">upload le fichier de l'image</label>
            <div class="file-input-wrapper">
                <input id="start" name="start" type="file" />
            </div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Une brève description du cours..." required></textarea>

            <label for="level">Niveau</label>
            <select id="level" name="level" required>
                <option value="">-- Choisir un niveau --</option>
                <option value="Débutant">Débutant</option>
                <option value="Intermédiaire">Intermédiaire</option>
                <option value="Avancé">Avancé</option>
            </select>

            <button class="btn" type="submit">Ajouter le cours</button>
        </form>
    </div>
</div>
<?php $form = ob_get_clean(); ?>
<?php include_once "views/courVews/cadre.php"; ?>