<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LMS</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require_once "views/included_parts.php/header.php" ?>
  <div class="cont">
    <button class="open-modal-btn btn-add">Ajouter un Cours</button>
    <div class="container" id="coursesScreen">
      <h2><?= $title ?? "ajouter un cour" ?></h2>
      <?= $cards ?? ""?>
    </div>
    <?= $form ?? "" ?>
  </div>
<script src="script.js"></script>
</body>

</html>