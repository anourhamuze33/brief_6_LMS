CREATE DATABASE certification;
CREATE TABLE courses (
    id int AUTO_INCREMENT PRIMARY KEY,
    title varchar(255) NOT null,
    description text DEFAULT null,
    level ENUM("Débutant", "Intermédiaire", "Avancé"),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
on peut utuluser datetime.
/*
CREATE DATABASE databasename;
DROP DATABASE databasename;

CREATE TABLE table_name (
    column1 datatype,
   ....
);

CREATE TABLE new_table_name AS
    SELECT column1, column2,...
    FROM existing_table_name
    WHERE ....;

DROP TABLE table_name;
TRUNCATE TABLE table_name; it delete just data fom table not table it self; 

ALTER TABLE table_name <
ALTER TABLE nom_table 
CHANGE COLUMN ancien_nom nouveau_nom TYPE;
ADD column_name datatype;
DROP COLUMN column_name;
MODIFY COLUMN column_name datatype;
CHANGE COLUMN ancien_nom nouveau_nom TYPE;
RENAME COLUMN ancien_nom TO nouveau_nom;
ADD CONSTRAINT nom_contrainte UNIQUE (nom_colonne);

>
*/
/*
CREATE TABLE sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT DEFAULT NULL,
    position INT DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT courses_id
        FOREIGN KEY (course_id) REFERENCES courses(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

*/
CREATE TABLE sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    FOREIGN KEY (course_id) REFERENCES courses(id)
);
*/

CREATE TABLE sections (
id int AUTO_INCREMENT PRIMARY KEY NOT null,
     title VARCHAR(255) NOT NULL,
    content TEXT DEFAULT NULL,
    position INT DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    course_id int,
    FOREIGN KEY (course_id) REFERENCES  courses(id)
    on DELETE CASCADE
    on UPDATE CASCADE
);

/*
CREATE TABLE table_name (
    column1 datatype constraint,
    ....
);
CONSTRAINT CHK_Salary CHECK (Salary > 0)
CHECK (level IN('Débutant','Intermédiaire', 'Avancé'))
salary INT CHECK (salary > 0)

*/
ALTER TABLE courses
ADD CONSTRAINT unique_title UNIQUE (title);
ALTER TABLE sections
ADD CONSTRAINT position_setion_unique UNIQUE (position);
ALTER TABLE sections
ADD CONSTRAINT titre_unique UNIQUE (title);


ALTER  TABLE sections
ADD COLUMN duree Date not null,
ADD COLUMN niveau ENUM('Débutant','Intermédiaire','Avancé');
INSERT INTO sections (title, content, position, course_id, duree, niveau) VALUES ( 'Introduction au Frontend', 'Cette section présente les bases du développement frontend.', 1, 6, 15, 'Débutant');
INSERT INTO sections (title, content, position, duree, niveau, course_id) VALUES
('Introduction au HTML', 'Présentation des bases du HTML et structure d’une page.', 2, 15, 'Débutant', 6),
('Les balises essentielles', 'Découvrir les balises les plus utilisées en HTML.', 3, 12, 'Débutant', 6),
('Listes HTML', 'Apprendre à créer des listes ordonnées et non ordonnées.', 4, 10, 'Débutant', 6),
('Liens et navigation', 'Créer des liens internes et externes.', 5, 13, 'Débutant', 6),
('Images et multimédia', 'Insertion d’images et de vidéos dans une page web.', 6, 14, 'Débutant', 6),
('Introduction au CSS', 'Comprendre le rôle du CSS dans le design web.', 7, 16, 'Débutant', 6),
('Sélecteurs CSS', 'Sélecteurs simples, combinés et avancés.', 8, 18, 'Débutant', 6),
('Couleurs et fonds', 'Changer la couleur du texte et l’arrière-plan.', 9, 12, 'Débutant', 6),
('Typographie', 'Gérer les polices, tailles et styles.', 10, 15, 'Débutant', 6),
('Box Model', 'Comprendre margin, padding, border et content.', 11, 20, 'Débutant', 6),
('Flexbox – Introduction', 'Créer des mises en page flexibles.', 12, 22, 'Débutant', 6),
('Flexbox – Alignement', 'Aligner horizontalement et verticalement.', 13, 25, 'Débutant', 6),
('Flexbox – Layouts', 'Construire un layout complet en Flexbox.', 14, 18, 'Débutant', 6),
('Grille CSS – Introduction', 'Présentation du système CSS Grid.', 15, 20, 'Débutant', 6),
('Grid – Placement des éléments', 'Apprendre à placer des blocs dans la grille.', 16, 22, 'Débutant', 6),
('Grid – Layout avancé', 'Créer des layouts complexes en Grid.', 17, 25, 'Débutant', 6),
('Responsive Design', 'Adapter les pages à tous les écrans.', 18, 30, 'Débutant', 6),
('Media Queries', 'Créer des breakpoints personnalisés.', 19, 20, 'Débutant', 6),
('Unités CSS', 'px, %, vw, vh, rem, em.', 20, 18, 'Débutant', 6),
('Formulaires HTML', 'Créer des formulaires complets.', 21, 22, 'Débutant', 6),
('Inputs avancés', 'Color, range, date, file.', 22, 16, 'Débutant', 6),
('Validation des formulaires', 'Validation HTML5.', 23, 15, 'Débutant', 6),
('Tables HTML', 'Construire et styliser des tableaux.', 24, 20, 'Débutant', 6),
('Introduction au JavaScript', 'Comprendre comment fonctionne JS dans le navigateur.', 25, 25, 'Débutant', 6),
('Variables et types', 'var, let, const et les types primitifs.', 26, 22, 'Débutant', 6),
('Conditions', 'if, else, switch.', 27, 18, 'Débutant', 6),
('Boucles', 'for, while, forEach.', 28, 20, 'Débutant', 6),
('Fonctions', 'Définition, paramètres, return.', 29, 24, 'Débutant', 6),
('DOM – Introduction', 'Sélectionner et modifier des éléments.', 30, 22, 'Débutant', 6),
('DOM – Événements', 'click, mouseover, keydown...', 31, 23, 'Débutant', 6),
('Manipulation du DOM', 'Créer, modifier, supprimer des éléments.', 32, 24, 'Débutant', 6),
('Projets JavaScript simples', 'Mini-projets pour pratiquer.', 33, 30, 'Débutant', 6),
('Animations CSS', 'Créer des animations avec @keyframes.', 34, 28, 'Débutant', 6),
('Transitions CSS', 'Fluidifier le design.', 35, 18, 'Débutant', 6),
('Transformations', 'rotate, scale, translate.', 36, 20, 'Débutant', 6),
('Optimisation des images', 'Réduire le poids pour de meilleures performances.', 37, 18, 'Débutant', 6),
('SEO de base', 'Optimiser le HTML pour Google.', 38, 22, 'Débutant', 6),
('Balises meta', 'Meta description, OG tags.', 39, 15, 'Débutant', 6),
('Accessibilité Web', 'Rendre les sites accessibles à tous.', 40, 25, 'Débutant', 6),
('Versionnement avec Git', 'Introduction à Git et GitHub.', 41, 30, 'Débutant', 6),
('Créer une page portfolio', 'Construire votre portfolio.', 42, 35, 'Débutant', 6),
('Projet HTML/CSS complet', 'Créer une landing page professionnelle.', 43, 40, 'Débutant', 6),
('Projet JavaScript interactif', 'Créer un mini projet dynamique.', 44, 45, 'Débutant', 6),
('Débogage', 'Trouver et corriger les erreurs.', 45, 20, 'Débutant', 6),
('Organisation du code', 'Bonne structure pour les projets web.', 46, 18, 'Débutant', 6),
('BEM – Méthodologie CSS', 'Organiser correctement le CSS.', 47, 25, 'Débutant', 6),
('Finalisation du projet', 'Amélioration et nettoyage.', 48, 30, 'Débutant', 6),
('Déploiement', 'Mettre votre site sur internet.', 49, 35, 'Débutant', 6),
('Conclusion', 'Résumé du cours et étapes suivantes.', 50, 10, 'Débutant', 6);
