<?php
require_once "controller/courController.php";
if(isset($_GET['action'])){
    $page = $_GET['action'];
    switch($page){
        case "create":
           createAction();
        break;
        case "update":
           updateAction();
        break;
        case "delete":
           deleteAction();
        break;
        case "deleted":
           deletedAction($_GET['deleted']);
        break;
        case "store":
           storeAction();
        break;
    }
}
else{
    affichageCouresAction();
}



