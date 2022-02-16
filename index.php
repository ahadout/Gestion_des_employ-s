<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PME</title>
</head>
<body>
    <header>
        <h1>Employee management</h1>
    </header>
    <main>
        <section class="section1">
            <h1>Add an employee</h1>
            <form class="form" action="add_emplyee_db.php" method="POST">
                <div class="fname">
                    <label>First name :</label>
                    <input type="text" name="fname">
                </div>
                <div class="lname">
                    <label>Last name :</label>
                    <input type="text" name="lname">
                </div>
                <div class="bdate">
                    <label>Birth Date :</label>
                    <input type="date" name="bdate">
                </div>
                <div class="departement">
                    <label>Departement :</label>
                    <input type="text" name="departement">
                </div>
                <div class="salary">
                    <label>Salary :</label>
                    <input type="number" name="salary">
                </div>
                <div class="fonction">
                    <label>Fonction :</label>
                    <input type="text" name="fonction">
                </div>
                <div class="picture">
                    <label>Picture link:</label>
                    <input type="text" name="picture">
                </div>
                <div>
                    <button class="submit" type="submit" name="submit">ADD</button>
                </div>
            </form>
            <div id="search">
                <button><a href="search.php">Search</a></button>
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
                    <th>Modify</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                <?php
                    include 'connectDB.php';
                    $sql = "SELECT * FROM employees;";
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
                    <td><?php echo '<a class="modify" href="modify.php?id='. $row['id'] .'"><b>modify</b></a>';?></td>
                    <td><?php echo '<a class="delete" href="deleteDB.php?id='. $row['id'] .'"><b>delete</b></a>';?></td>
                </tr>
                <?php
					    }
                    }
				?>
                </tbody>
            </table>
        </section>
    </main>
    <style><?php include 'style.css'; ?></style>
</body>
</html>