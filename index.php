<?php
session_start();
require_once "controller/courController.php";
require_once "controller/sectionsController.php";
require_once "controller/userController.php";
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

elseif(isset($_GET['section_action'])){
   $section_page = $_GET['section_action'];
    switch($section_page){
       case "affichage":
         sectionAffichAction();
         break;
         case "add_section":
            addSectionAction();
         break;
         case "store_section":
            storeSectionAction();
         break;
         case "delete_Section":
            deleteSectionAction();
         break;
         case "deleted_Section":
            deletedSectionAction();
         break;
         case "update_Section":
            uppdateSectionAction();
         break;
         }
      }
else{
          affichageCouresAction();
      }