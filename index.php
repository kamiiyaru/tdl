<?php
require_once "app/app.php";

$App = new App();

if(isset($_POST['submit'])){
    $task = $_POST['task'];
    $App->addTask($task);
    unset($_POST['task']);
}
?>
<link rel="stylesheet" href="assets/style.css">
<form method="post">
    <input type="text" name="task" placeholder="Task" required><br>
    <input type="submit" name="submit" value="Add Task">
</form>

<ul>
    <?php $App->showTask();?>
</ul>