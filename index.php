<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LMS</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include "header.php" ?>
  <div class="cont">
    <button class="open-modal-btn btn-add">Ajouter un Cours</button>
    <div class="container" id="coursesScreen">
      <h2>Available Courses</h2>
      <?php include "affichage.php" ?>
    </div>


    <div id="courseModal" class="modal none">
      <div class="modal-content">
        <span class="close">&times;</span>

        <h2>Ajouter un Cours</h2>

        <form class="form" action="validation_course_form.php" method="POST" enctype="multipart/form-data">
          <label for="title">Titre du cours</label>
          <input type="text" id="title" name="title" required />

<label for="img">upload le fichier de l'image</label>
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




  <script src="script.js"></script>
</body>

</html>