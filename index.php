<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <header>
        <div class="header-content">
            <div class="brand">
                <div class="logo">
                    <div class="logo-inner">
                        <div class="sparkle"></div>
                        <div class="sparkle"></div>
                        <div class="sparkle"></div>
                        <div class="book"><img src="https://cdn-icons-png.flaticon.com/512/906/906334.png" alt="Logo">
</div>
                    </div>
                </div>
                <h1>
                    LMS
                    <span class="separator">–</span>
                    <span class="courses">Courses</span>
                </h1>
            </div>
            
            <nav>
                <a href="#accueil" class="nav-link active">Accueil</a>
                <a href="#courses" class="nav-link">Courses</a>
                <a href="#sessions" class="nav-link">Sessions</a>
                <a href="#profile" class="nav-link">Profile</a>
            </nav>
        </div>
    </header>

<button class="open-modal-btn btn-add">Ajouter un Cours</button>
<div class="container" id="coursesScreen">
  <h2>Available Courses</h2>
  <?php include "affichage.php" ?>
</div>


<div id="courseModal" class="modal none">
  <div class="modal-content">
    <span class="close">&times;</span>

    <h2>Ajouter un Cours</h2>

    <form class="form" action="validation_course_form.php" method="POST">
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

      <button class="btn" type="submit">Ajouter le cours</button>
    </form>
  </div>
  





</div>



 <div class="container">
    <h1>Ajouter une Section</h1>
    
    <div class="success-message" id="successMessage">
      ✓ Section ajoutée avec succès!
    </div>

    <form id="sectionForm">
      <div class="form-group">
        <label for="titre">Titre de la section *</label>
        <input
          type="text"
          id="titre"
          name="titre"
          placeholder="Ex: Introduction à HTML"
          required
        />
      </div>

      <div class="form-group">
        <label for="numero">Numéro de la section *</label>
        <input
          type="number"
          id="numero"
          name="numero"
          placeholder="Ex: 1"
          min="1"
          required
        />
      </div>

      <div class="form-group">
        <label for="description">Description *</label>
        <textarea
          id="description"
          name="description"
          placeholder="Décrivez le contenu de cette section..."
          required
        ></textarea>
      </div>

      <div class="form-group">
        <label for="duree">Durée (en minutes) *</label>
        <input
          type="number"
          id="duree"
          name="duree"
          placeholder="Ex: 30"
          min="1"
          required
        />
      </div>

      <div class="form-group">
        <label for="niveau">Niveau de difficulté *</label>
        <select id="niveau" name="niveau" required>
          <option value="">-- Sélectionnez un niveau --</option>
          <option value="debutant">Débutant</option>
          <option value="intermediaire">Intermédiaire</option>
          <option value="avance">Avancé</option>
        </select>
      </div>

      <div class="button-group">
        <button type="submit" class="open-modal-btn">Ajouter la Section</button>
        <button type="reset" class="btn-reset">Réinitialiser</button>
      </div>
    </form>
  </div>




<script src="script.js"></script>
</body>
</html>