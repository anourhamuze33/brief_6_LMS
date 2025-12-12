<?php
require_once "model/sectionsModal.php";
function sectionAffichAction()
{
   $results = listsection();
   $result= $results[0];
   $resultat= $results[1];
   $id = $results[2];
    require_once "views/sectionsViews/afiich_sections.php";
}
function addSectionAction()
{
       $addOrEdit = "Ajouter une Section";
    require_once "views/sectionsViews/add_section.php";
}

function storeSectionAction()
{
   $id_Aff = addSection();
    header("location:affichage_section.php?affich=$id_Aff");
    
}
function deleteSectionAction()
{
$resultat = deleteSection();
$result = $resultat[0];
$section = $resultat[1];
$id = $resultat[2];
$deleted_id = $resultat[3];
require_once "views/sectionsViews/deleteSection.php";
}
function deletedSectionAction()
{
    $id2 = deletedSection();
    header("location:affichage_section.php?affich=$id2");
}

function uppdateSectionAction()
{
    $id = $_GET['edit_section'];
    $id2 = $_GET['affich'];
    $selected = select_update_section($id);
    require_once "views/sectionsViews/update_section.php";
    $updated = update_section();
    if($updated){
     header("location:affichage_section.php?affich=$id2");
    }
}
?>