<?php
	include('connectDB.php');
	$id=$_GET['id'];
	$query=mysqli_query($connect,"select * from `employees` where id='$id';");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modify employee</title>
</head>
<body>
    <header>
        <h1>Employee management</h1>
    </header>
    <main>
        <section class="section1">
            <h1>Modify an employee</h1>
            <form class="form" action="updateDB.php?id=<?php echo $id; ?>" method="POST" >
                <div class="userid">
                    <label>Employee ID :</label>
                    <input type="text" <?php echo 'value="'. $row['id'] .'"'; ?> name="userid">
                </div>
                <div class="fname">
                    <label>First name :</label>
                    <input type="text" <?php echo 'value="'. $row['first_name'] .'"'; ?> name="fname">
                </div>
                <div class="lname">
                    <label>Last name :</label>
                    <input type="text" <?php echo 'value="'. $row['last_name'] .'"'; ?> name="lname">
                </div>
                <div class="bdate">
                    <label>Birth Date :</label>
                    <input type="date" <?php echo 'value="'. $row['birth_date'] .'"'; ?> name="bdate">
                </div>
                <div class="departement">
                    <label>Departement :</label>
                    <input type="text" <?php echo 'value="'. $row['departement'] .'"'; ?> name="departement">
                </div>
                <div class="salary">
                    <label>Salary :</label>
                    <input type="number" <?php echo 'value="'. $row['salary'] .'"'; ?> name="salary">
                </div>
                <div class="fonction">
                    <label>Fonction :</label>
                    <input type="text" <?php echo 'value="'. $row['fonction'] .'"'; ?> name="fonction">
                </div>
                <div class="picture">
                    <label>Picture link:</label>
                    <input type="text" <?php echo 'value="'. $row['picture'] .'"'; ?> name="picture">
                </div>
                <div>
                    <button class="submit" type="submit" name="submit">MODIFY</button>
                </div>
            </form>
            <form class="form" action="cancel.php">
                <div>
                    <button class="cancel" type="submit" name="cancel">CANCEL</button>
                </div>
            </form>
        </section>
    </main>
    <style><?php include 'style.css'; ?></style>
</body>
</html>