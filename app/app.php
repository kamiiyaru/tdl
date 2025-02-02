<?php

require_once "conn.php";

class App {
    public $conn, $id, $task, $status;

    public function __construct() {
        $koneksi = new Koneksi(); // Create an instance of Koneksi
        $this->db = $koneksi->conn(); // Call the conn() method
    }

    public function ShowTask(){
        $query = "select * from task";
        $stmt = $this->db->query($query);
        while($row = mysqli_fetch_array($stmt)):
            $status = ($row['status'] == 0)? $this->status = "belum Selesai" : $this->status = "selesai";
            $check = ($row['status'] == 0)? $this->status = "" : $this->status = "checked";

            echo "<tr>";
            echo "<td>".$row['task']."</td>";
            echo "<td>".$row['created']."</td>";
            echo "<td><a href='delete.php?id=". $row['id']."'><button type='submit'>Delete</button></a></td>";
            
            //checkbox
            echo "<td>";
            echo "<form method='post' action='status.php?id=".$row['id']."' id='checkbox'>";
            echo "<input type='text' name='id' value='".$row['id']."' hidden>";
            echo "<input type='text' name='status' value='".$row['status']."' hidden>";
            echo "<input id='status' type='checkbox' onchange='this.form.submit()' $check>";
            echo "<label for='status' id='stats'>$status</label>";
            echo "</form>";
            echo "</tr>";
        endwhile;
    }

    public function deleteTask($id){
        $this->id = $id;
        $query = "delete from task where id = '$this->id'";
        $res = mysqli_query($this->db , $query);
        Header('Location: index.php');
    }

    public function addTask($task){
        $this->task = $task;

        $query = "insert into task (task, status, created) values ('$this->task', 0, '".date("Y-m-d")."')";
        $res = mysqli_query($this->db , $query);
    }

    public function changeStatus($id, $status){
        $this->id = $_POST['id'];
        $this->status = $_POST['status'];

        if($this->status == 1){
            $NewStatus = $this->status - 1;
        }else{
            $NewStatus = $this->status + 1;
        }

        $query = "update task set status = '$NewStatus' where id = '$this->id'";
        $pdo = mysqli_query($this->db, $query);
        header("Location: index.php");
    }
}