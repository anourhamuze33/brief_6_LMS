<?php
require_once "model/userModel.php";
function inscrireUserAction()
{
    $inputs = array("user_nom", "user_prenom", "user__name", "user_password", "user_email", "confirm_password");
    $user=[];
    require_once "views/userViews/inscription.php";
    // if(isset($_POST['user_ajout'])){
    if($_SERVER['REQUEST_METHOD']=="POST"){
        foreach($inputs as $input){
            $user[] = $_POST[$input];
        }
       $new_user = inscrire($user);
    }
}

function loginAction()
{
    require_once "views/userViews/login.php";
}

?>