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
    <title>Delete employee</title>
</head>
<body>
    <header>
        <h1>Employee management</h1>
    </header>
    <main>
        <section class="section1">
            <h1>You are about to delete an employee</h1>
            <div class="deleteContainer">
                <h4>Are you sure you want to delete this employee ?</h4>
                <p>ID : <?php echo $row['id']; ?></p>
                <p>Complete Name : <?php echo $row['first_name'] . " " . $row['last_name']; ?></p>
                <form class="form" action="deleteDB.php?id=<?php echo $id; ?>">
                    <div>
                        <button class="submit" type="submit" name="submit">Confirm</button>
                    </div>
                </form>
                <form class="form" action="cancel.php">
                    <div>
                        <button class="cancel" type="submit" name="cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="section2">
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last name</th>
                    <th>Birth date</th>
                    <th>Departement</th>
                    <th>Salary</th>
                    <th>Fonction</th>
                    <th>Picture</th>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM employees WHERE id='$id';";
                    $result = mysqli_query($connect, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0){
                        while ($row = mysqli_fetch_assoc($result)){ 
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['last_name'];?></td>
                    <td><?php echo $row['birth_date'];?></td>
                    <td><?php echo $row['departement'];?></td>
                    <td><?php echo $row['salary'];?></td>
                    <td><?php echo $row['fonction'];?></td>
                    <td><?php echo '<a class="picture" href="'. $row['picture'] .'">Picture</a>';?></td>
                </tr>
                <?php
					    }
                    }
				?>
                </tbody>
            </table>
        </section>
    </main>
    <style><?php include 'style.css';?></style>
</body>
</html>