<?php
    include 'connectDB.php';
    $id=$_GET['id'];
 
    $userid = $_POST['userid'];
	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $bdate = $_POST['bdate'];
    $departement = $_POST['departement'];
    $salary = $_POST['salary'];
    $fonction = $_POST['fonction'];
    $picture = $_POST['picture'];
 
	if(($userid != "") and ($fname != "") and ($lname != "") and ($bdate != "") and ($departement != "") and ($salary != "") and ($fonction != "") and ($picture != "")){
        $sql = "UPDATE employees SET id='$userid',first_name='$fname',last_name='$lname',birth_date='$bdate',departement='$departement',salary='$salary',fonction='$fonction',picture='$picture' WHERE id='$id';";
        mysqli_query($connect, $sql);
    }
    header("Location: http://localhost/Gestion_des_employ%c3%a9s/");