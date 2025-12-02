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
