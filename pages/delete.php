<?php
    require './test_db_conn.php';

    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];

        $sql = "DELETE FROM crud WHERE Id=$id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("location: ./index.php");
        }
    }

    if(isset($_POST['delete_many'])){
        foreach($_POST['item'] as $id){
            $sql = "DELETE FROM crud WHERE Id=$id";
            $result = mysqli_query($conn, $sql); 
        }
        header("location: ./index.php");
    }
?>