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
        <h1>edit une Section</h1>

        <div class="success-message" id="successMessage">
            ✓ Section ajoutée avec succès!
        </div>

        <form id="sectionForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <label for="titre">Titre de la section *</label>
                <input
                    type="text"
                    id="titre"
                    class="inputt"
                    name="title"
                    placeholder="Ex: Introduction à HTML"
                    required />
            </div>

            <div class="form-group">
                <label for="numero">Numéro de la section *</label>
                <input
                    type="number"
                    id="numero"
                    class="inputt"
                    name="position"
                    placeholder="Ex: 1"
                    min="1"
                    required />
            </div>

            <div class="form-group">
                <label for="description">Description *</label>
                <textarea
                class="inputt"
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
                    class="inputt"
                    name="duree"
                    placeholder="Ex: 30"
                    min="1"
                    required />
            </div>

            <div class="form-group">
                <label for="niveau">Niveau de difficulté *</label>
                <select class="inputt" id="niveau" name="niveau" required>
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
<script>
    const selected = <?= json_encode($selected, JSON_UNESCAPED_UNICODE) ?>;
    const inputs = document.querySelectorAll(".inputt");
    inputs[0].value = selected.title;
    inputs[1].value = selected.position;
    inputs[2].value = selected.content;
    inputs[3].value = selected.duree;
    inputs[4].value = selected.niveau;
    const reinstall = document.querySelector(".btn-reset");
    reinstall.addEventListener("click", (e)=>{
    inputs.forEach(input=>{
        input.value=null;
    })
    })
</script>
</body>
</html>