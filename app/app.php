<?php

require_once "conn.php";

class App {
    public $conn, $id, $task, $status;

    public function __construct() {
        $koneksi = new Koneksi(); // Create an instance of Koneksi
        $this->db = $koneksi->conn(); // Call the conn() method
    }

    public function ShowTask(){
        $query = "select * from task order by priority desc";
        $stmt = $this->db->query($query);
        while($row = mysqli_fetch_array($stmt)):
            //If Condition
            $status = ($row['status'] == 0)? "belum Selesai" : "selesai";
            $check = ($row['status'] == 0)? "" : "checked";
            $priority = ($row['priority'] == 1) ? "Low" : (($row['priority'] == 2) ? "Medium" : "High");
            $crossed = ($row['status'] == 0)? "" : "<del>";
            $uncross = ($row['status'] == 0)? "" : "</del>";

            //date format the date(string)
            $dateTime = new DateTime($row['created']);
            $this->date = date_format($dateTime, "d-m-Y");

            
                echo "<tr>";
                echo "<td class='non-check'><a href='updatetask.php?id=".$row['id']."'><img src='assets/edit.png' class='edit_icon'></a></td>";
                echo "<td class='non-check'>$crossed".$row['task']."$uncross</td>";
                echo "<td class='non-check'>$this->date</td>";
                echo "<td class='non-check'>".$row['time']."</td>";
                echo "<td class='non-check'>$priority</td>";
                echo "<td class='non-check'><a href='delete.php?id=". $row['id']."'><button type='submit'>Delete</button></a></td>";
            
            //checkbox
            echo "<td class='check-box'>";
            echo "<form method='post' action='status.php?id=".$row['id']."' id='checkbox'>";
            echo "<input type='text' name='id' value='".$row['id']."' hidden>";
            echo "<input type='text' name='status' value='".$row['status']."' hidden>";
            echo "<input id='status' type='checkbox' onchange='this.form.submit()' $check>$status";
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

    public function addTask($task, $date, $time, $priority){
        $this->task = $task;
        $this->date = $date;
        $this->time = $time;
        $this->priority = $priority;
        $task_time = $this->time . ":00";

        $query = "insert into task (task, status, created, time, priority) values ('$this->task', 0, '$this->date', '$task_time', $this->priority)";
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

    public function getTask($id){
        $this->id = $id;
        $query = "select task from task where id = $this->id";
        $stmt = $this->db->query($query);
        $task = mysqli_fetch_array($stmt);
        return $task['task'];
    }

    public function editTask($id, $task, $date, $time, $priority){
        $this->id = $id;
        $this->task = $task;
        $this->date = $date;
        $this->time = $time;
        $this->priority = $priority;
        $task_time = $this->time . "00";

        $stmt = $this->db->query("UPDATE task SET task = '$this->task', created = '$this->date', time = '$task_time', priority = $this->priority where id = $this->id");
        Header('Location: index.php');
    }
}