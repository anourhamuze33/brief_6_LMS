<?php
function inscrire($user)
{
    include "connect_pdo.php";
    try {
        //  $sql = "INSERT INTO users (name, prenom, user_name, PASSWORD, email) values (?,?,?,?,?)";
        $sql = "INSERT INTO users (name, prenom, user_name, PASSWORD, email)
    values (:nom, :prenom, :username, :password, :email)";
        $hashedpassword = password_hash($user["user_password"], PASSWORD_DEFAULT);
        $stm = $db_con->prepare($sql);
        $new_user = $stm->execute([
            'nom'     => $user["user_nom"],
            'prenom'  => $user["user_prenom"],
            'username' => $user["user__name"],
            'password' => $hashedpassword,
            'email'   => $user["user_email"],
        ]);
    } catch (PDOException $e) {
        echo "error lors de l'insertion: " . $e->getMessage();
        return false;
    }
}

function isEmail($isemail)
{
    include "connect_pdo.php";
    // $select = "SELECT COUNT(id) as cout FROM users where email = ?";
    $select = "SELECT EXISTS(SELECT 1 FROM users where email = ?)";
    $stmt = $db_con->prepare($select);
    $stmt->execute([$isemail]);
    return $stmt->fetchColumn() > 0;
}
function login()
{
    include "connect_pdo.php";
    $sql = "SELECT * FROM users where email=? OR user_name=?";
    $stmt = $db_con->prepare($sql);
    $stmt->execute([$_POST['email_username'], $_POST['email_username']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_user_infos($id)
{
    include "connect_pdo.php";
    $sql = "SELECT * FROM users where id = ?";
    $stmt = $db_con->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function mes_coures()
{
    include "connect_pdo.php";
    $sql = "SELECT courses.id, courses.title, courses.description, courses.level, courses.img from enrollement
            INNER JOIN courses ON enrollement.cour_id=courses.id
    ";
    $stmt = $db_con->prepare($sql);
    $stmt->execute();
    return $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function nbr_total_coures_user()
{
    include "connect_pdo.php";
    $sql = "SELECT COUNT(id) from courses as id";
    $stmt = $db_con->prepare($sql);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql2 = "SELECT COUNT(id) from users as id";
    $stmt2 = $db_con->prepare($sql2);
    $stmt2->execute();
    $resultat2 = $stmt2->fetch(PDO::FETCH_ASSOC);

    $sql3 = "SELECT courses.id, courses.title, COUNT(enrollement.user_id) AS total_inscriptions FROM courses
            LEFT JOIN enrollement ON courses.id = enrollement.cour_id
            GROUP BY courses.title 
            ORDER BY `total_inscriptions` DESC;";

    $stmt3 = $db_con->prepare($sql3);
    $stmt3->execute();
    $resultat3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    $sql4 = "SELECT courses.id, courses.title, COUNT(enrollement.user_id) AS total_inscriptions FROM courses
            LEFT JOIN enrollement ON courses.id = enrollement.cour_id
            GROUP BY courses.id 
            ORDER BY `total_inscriptions` DESC
            limit 3;";

    $stmt4 = $db_con->prepare($sql4);
    $stmt4->execute();
    $resultat4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

    $sql5 = "SELECT ROUND(
                (SELECT COUNT(id) FROM sections) / (SELECT COUNT(id) FROM courses), 2) AS avg_sc;";
    $stmt5 = $db_con->prepare($sql5);
    $stmt5->execute();
    $resultat5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);

    $sql6 = "SELECT courses.id, courses.title, COUNT(enrollement.user_id) AS total_inscriptions FROM courses
            LEFT JOIN enrollement ON courses.id = enrollement.cour_id
            GROUP BY courses.id 
            ORDER BY `total_inscriptions` DESC
            limit 1;";

    $stmt6 = $db_con->prepare($sql6);
    $stmt6->execute();
    $resultat6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);

    $sql7 = "SELECT COUNT(*) AS total_users
FROM (
    SELECT user_id
    FROM enrollement
    GROUP BY user_id
) AS total;";

    $stmt7 = $db_con->prepare($sql7);
    $stmt7->execute();
    $resultat7 = $stmt7->fetchAll(PDO::FETCH_ASSOC);

    $sql8 = "SELECT courses.id, courses.title, count(sections.id) as total_sec
FROM courses
LEFT join sections on sections.course_id=courses.id
GROUP BY courses.id,courses.title
HAVING total_sec>=5;";

    $stmt8 = $db_con->prepare($sql8);
    $stmt8->execute();
    $resultat8 = $stmt8->fetchAll(PDO::FETCH_ASSOC);

    $sql9 = "SELECT courses.id, courses.title, COUNT(enrollement.user_id) AS total_inscriptions
FROM courses
LEFT JOIN enrollement ON courses.id = enrollement.cour_id
GROUP BY courses.id, courses.title
HAVING COUNT(enrollement.user_id) = 0;";

    $stmt9 = $db_con->prepare($sql9);
    $stmt9->execute();
    $resultat9 = $stmt9->fetchAll(PDO::FETCH_ASSOC);

    return array($resultat, $resultat2, $resultat3, $resultat4, $resultat5, $resultat6, $resultat7, $resultat8, $resultat9);
}
