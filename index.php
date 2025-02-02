<?php
require_once "app/app.php";

$App = new App();

if(isset($_POST['submit'])){
    $task = $_POST['task'];
    $App->addTask($task);
    unset($task);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<script>
    function Checkbox(){
        document.getElementById("checkbox").submit();
    }

    const checkbox = document.getElementById("status");
    const status = document.getElementById("stats");
  // Automatically keep it checked after interaction

</script>


<link rel="stylesheet" href="assets/style.css">
<form method="post">
    <input type="text" name="task" placeholder="Task" required><br>
    <input type="submit" name="submit" value="Add Task">
</form>

<table>
    <tr>
        <th>Task</th>
        <th>Created in</th>
        <th>Status</th>
    </tr>
    <?php $App->showTask();?>
</table>