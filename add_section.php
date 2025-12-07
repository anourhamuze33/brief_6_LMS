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
if(isset($_GET['edit_section'])){
  $id = $_GET["edit_section"];
$inputs = array("title", "content", "niveau", "duree", "position");
if (isset($_POST["title"])) {
    $inps = [];
    foreach ($inputs as $input) {
        $inps[] = $_POST[$input];
    }    $id2 = $_GET['affich'];
            $id2 = $_GET['affich'];
        $select = "UPDATE sections SET title = '$inps[0]', content =' $inps[1]', niveau = '$inps[2]', duree = '$inps[3]', position = '$inps[4]' WHERE id = $id";
        mysqli_query($conn, $select);
    header("location:affichage_section.php?affich=$id2");
}

}


    if (isset($_GET["add"])) {
        $id = $_GET["add"];
        $inputs = array("title", "content", "niveau", "duree", "position");
        if (isset($_POST["title"])) {
            $inps = [];
            foreach ($inputs as $input) {
                $inps[] = $_POST[$input];
            }
            $sql = "INSERT INTO sections (title, content, niveau, duree, position, course_id) VALUES(?,?,?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("sssiii", $inps[0], $inps[1], $inps[2], $inps[3], $inps[4], $id);
            $stm->execute();
            header("location:affichage_section.php?affich=$id");
            $stm->close();
        }
        mysqli_close($conn);
    }
    ?>



    <div class="container">
        <h1>Ajouter une Section</h1>

        <div class="success-message" id="successMessage">
            ✓ Section ajoutée avec succès!
        </div>

        <form id="sectionForm" method="POST">
            <div class="form-group">
                <label for="titre">Titre de la section *</label>
                <input
                    type="text"
                    id="titre"
                    name="title"
                    placeholder="Ex: Introduction à HTML"
                    required />
            </div>

            <div class="form-group">
                <label for="numero">Numéro de la section *</label>
                <input
                    type="number"
                    id="numero"
                    name="position"
                    placeholder="Ex: 1"
                    min="1"
                    required />
            </div>

            <div class="form-group">
                <label for="description">Description *</label>
                <textarea
                    id="description"
                    name="content"
                    placeholder="Décrivez le contenu de cette section..."
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="duree">Durée (en minutes) *</label>
                <input
                    type="number"
                    id="duree"
                    name="duree"
                    placeholder="Ex: 30"
                    min="1"
                    required />
            </div>

            <div class="form-group">
                <label for="niveau">Niveau de difficulté *</label>
                <select id="niveau" name="niveau" required>
                    <option value="">-- Sélectionnez un niveau --</option>
                    <option value="Débutant">Débutant</option>
                    <option value="Intermédiaire">Intermédiaire</option>
                    <option value="Avancé">Avancé</option>

                </select>
            </div>

            <div class="button-group">
                <button type="submit" class="open-modal-btn">Ajouter la Section</button>
                <button type="reset" class="btn-reset">Réinitialiser</button>
            </div>
        </form>
    </div>

    </div>
</body>

</html>