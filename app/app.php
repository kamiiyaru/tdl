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
            if($row['status'] == 0){
                $this->status = "Belum Selesai";
            }else{
                $this->status = "selesai";
            }

            echo "<li>" . $row['task'] . "<p>" . $row['created'] . "</p><p>";
            echo "<a href='delete.php?id=". $row['id']."'><button type='submit'>Delete</button></a>";
            echo "<a href='status.php?id=". $row['id']."&status=". $row['status'] ."'><button type='submit'>$this->status</button></a>";
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
        $this->id = $_GET['id'];
        $this->status = $_GET['status'];

        if($this->status == 1){
            $NewStatus = $this->status - 1;
        }else{
            $NewStatus = $this->status + 1;
        }

        $query = "update task set status = '$NewStatus' where id = '$this->id'";
        $pdo = mysqli_query($this->db, $query);
        header('Location: index.php');
    }
}