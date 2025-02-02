<?php
require_once 'app/app.php';
$App = new App();

if(isset($_GET['id'])){
    $status = $_POST['status'];
    $id = $_POST['id'];
    $App->changeStatus($id, $status);
}