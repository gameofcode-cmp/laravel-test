<?php
require_once 'model-task3.php';
require_once 'view-task3.php';

$view = new view();

session_start();
$csrf_token = 'some-token-here';
$_SESSION['csrf'] = $csrf_token;

//Postback from form
if (isset($_POST['name'])) {
    if (!isset($_POST['csrf']) && $_POST['csrf'] === $_SESSION['csrf']) {
        echo 'Invalid request token';
        die();
    }
    $profile = new ProfileModel();
    $result = $profile->search($_POST['name']);

    if ($result && count($result) >= 1) {
        echo $view->renderTable($result);
    }
    else {
        echo 'No results found';
    }
}

//No postback
else {
    $view->render();
}
