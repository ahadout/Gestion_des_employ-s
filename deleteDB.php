<?php
    include 'connectDB.php';
    $id=$_GET['id'];
    $sql = "DELETE FROM employees WHERE id='$id'";
    mysqli_query($connect, $sql);
    header("Location: http://localhost/Gestion_des_employ%c3%a9s/");