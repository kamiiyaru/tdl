<?php
require_once "app/app.php";
$App = new App();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $App->deleteTask($id);
}else{
    echo "404";
}