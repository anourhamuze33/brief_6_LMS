<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1><?= $addOrEdit ?></h1>

        <div class="success-message" id="successMessage">
            ✓ Section ajoutée avec succès!
        </div>

        <form id="sectionForm" action="../../index.php?section_action=store_section&add=<?= $_GET['add']?>" method="POST">
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
    <script src="script.js"></script>
</body>

</html>