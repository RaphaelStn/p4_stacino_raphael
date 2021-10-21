<?php 

$app::getInstance();
if(!empty($_POST) AND isset($_POST['delete'])) {
    $result = $app->getTable('billet')->delete($_POST['id']);
    if($result) {
        header('location: admin.php');
    }
}
?>
