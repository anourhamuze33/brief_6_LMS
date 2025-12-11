<?php
require_once "model/courModel.php";
function affichageCouresAction()
{
    $cours = listCours();
    require_once "views/courAffichage.php";
}

function createAction()
{
    require_once "views/courCreate.php";
}

function storeAction()
{
   $added_cour = create();
//    if(added_Cour)...
    header('location:index.php');
}

function deleteAction () 
{
    $id = $_GET['delete'];
    $select_deleted = select_delete($id);
    require_once "views/delete.php";
}

function deletedAction()
{
    // global $id use it to not post deleted at header 2 times
    $id = $_GET['deleted'];
    delete($id);
    header('location:index.php');
}

function updateAction()
{



    $id = $_GET['edit'];
    $select_updated = select_update($id);
    require_once "views/update.php";
?>
<!-- <script>
    const inputs = document.querySelectorAll(".updat");
    inputs[0].value =  htmlspecialchars($select_updated['title']) ?>;
    inputs[1].value =  htmlspecialchars($select_updated['description']) ?>;
    inputs[2].value =  htmlspecialchars($select_updated['level']) ?>;
</script>  -->
<script>
    const selected = <?= json_encode($select_updated, JSON_UNESCAPED_UNICODE) ?>;
    const inputs = document.querySelectorAll(".updat");
    inputs[0].value = selected.title;
    inputs[1].value = selected.description;
    inputs[2].value = data.level;
</script>

<?php
    $updated = update();
    if($updated){
         header('location:index.php');
    }
}
?>