<?php
require_once 'app/app.php';
$App = new App();

if(isset($_GET['id'])){
    $status = $_GET['status'];
    $id = $_GET['id'];
    $App->changeStatus($id, $status);
}