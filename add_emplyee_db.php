<?php 
    include 'connectDB.php';
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $bdate = $_POST['bdate'];
    $departement = $_POST['departement'];
    $salary = $_POST['salary'];
    $fonction = $_POST['fonction'];
    $picture = $_POST['picture'];

    if(($fname != "") and ($lname != "") and ($bdate != "") and ($departement != "") and ($salary != "") and ($fonction != "") and ($picture != "")){
        $sql = "INSERT INTO employees(first_name,last_name,birth_date,departement,salary,fonction,picture) VALUES('$fname','$lname','$bdate','$departement','$salary','$fonction','$picture');";
        mysqli_query($connect, $sql);
        
    }
    header("Location: http://localhost/Gestion_des_employ%c3%a9s/");
?>