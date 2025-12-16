<?php
function inscrire($user)
{
include "connect_pdo.php";
//  $sql = "INSERT INTO users (name, prenom, user_name, PASSWORD, email) values (?,?,?,?,?)";
    $sql = "INSERT INTO users (name, prenom, user_name, PASSWORD, email);
    values (:nom, :prenom, :username, :password, :email)";
    if($user[3]!== $user[5]){
    $error_msg = "confirmation of the password doesn't matchj le password";
    }
if(empty($error_msg)){
    $stm = $db_con->prepare($sql);
    $hashedpassword = password_hash($user[3], PASSWORD_DEFAULT);
    $new_user = $stm->execute([
    'nom'     => $user[0],
    'prenom'  => $user[1],
    'usernME' => $user[2],
    'Password'=> $hashedpassword,
    'email'   => $user[4],
    ]);
    return $new_user;
}
}
?>