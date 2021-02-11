<?php 

require_once "s_category.php";

if(isset($_POST['type']) == 'oncreate')
{
$category = new category_creation();
$result = $category->categories_create();

}

else if(isset($_GET['handler']) == 'ongetter'){
    $category_update = new category_updating();
    $result = $category_update->categories_updater();
}
else if(isset($_POST['OAuth']) == 'finalupdate'){
    $categoryupdate_finalmove = new categoryupdate_finalmove();
    $RESTresult = $categoryupdate_finalmove->OAuthUpdate();
}
else if(isset($_POST['DeleteOAuth']) == 'remover'){
    $AuthDelete = new category_delete();
    $resultresponse = $AuthDelete->OAuthDelete();
}