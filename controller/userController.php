<?php
require_once "model/userModel.php";
function inscrireUserAction()
{
    $inputs = array("user_nom", "user_prenom", "user__name", "user_password", "user_email", "confirm_password");
    $user = [];
    $errors = [];
    // if(isset($_POST['user_ajout'])){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        foreach ($inputs as $input) {
            //make it associative
            $user[$input] = $_POST[$input];
        }
        if (!filter_var($user["user_email"], FILTER_VALIDATE_EMAIL)) {
            $errors["validemail"] = "email not valide";
        }
        if (strlen($user["user_password"]) < 8) {
            $errors["passwordlengh"] = "Password must contain at least 8 charachter";
        }
        if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9]).+$/', $user["user_password"])) {
            $errors["passwordupercase"] = "Password must contain at least one capital letter and one number";
        }
        if ($user["user_password"] !== $user["confirm_password"]) {
            $errors["confirm"] = "confirmation of the password doesn't match le password";
        }
        if (isEmail($user["user_email"]) == true) {
            $errors["email"] = "this email is already taken, please enter your email";
        }

        if (empty($errors)) {
            // try{
            $new_user = inscrire($user);
            header("Location: profile.php");
            exit;
            // }catch(PDOException $e){
            // car $e->errorInfo = [ 0 => 'SQLSTATE error code',
            //     1 => 'Driver-specific error code',
            //     2 => 'Driver-specific error message'];
            // if($e->errorInfo[1]===1062){
            // }
            // else{
            //      throw $e;
            // }
            // }
        }
    }


    require_once "views/userViews/inscription.php";
}

function loginAction()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once "connect_pdo.php";
        $result = login();
        if ($result) {
            if (password_verify($_POST['password_login'], $result['PASSWORD'])) {
                session_start();
                session_regenerate_id();
                $_SESSION['user_id'] = $result['id'];
                header("location: loged.php?exist_cour=1");
                exit;
            }
        } else {
        }
    }
    require_once "views/userViews/login.php";
}

function logedAction()
{
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("location: login.php");
    }
    $user = get_user_infos($_SESSION['user_id']);

    if((isset($_GET['exist_cour']) && $_GET['exist_cour']==1)){
        $cour_enregistrer = mes_coures();
    }
    require_once "views/userViews/loged.php";
}
function enregistrerAction()
{
    session_start();
    include "connect_pdo.php";
   $cour_id = $_GET['cour_id'];
   $sql = "INSERT into enrollement (cour_id, user_id) values (?,?)";
   $stmt = $db_con->prepare($sql);
   $stmt->execute([$cour_id, $_SESSION['user_id']]);
   header("location: loged.php?exist_cour=1");

}
function statistiquesAction()
{
    $nbr_total_cour = nbr_total_coures_user();
    require_once "views/userViews/stati.php";
}