<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Search</title>
</head>
<body>
    <header>
        <h1>Employee management</h1>
    </header>
    <main>
        <section class="section1">
            <h1>Search</h1>
            <form class="form" method="POST">
                <div>
                    <label>Search by :</label>
                    <select name="searchType">
                        <option value="id">ID</option>
                        <option value="firstName">First-Name</option>
                        <option value="lastName">Last-Name</option>
                        <option value="departement">Departement</option>
                    </select>
                </div>
                <div>
                    <input id="searchInput" type="text" name="search" placeholder="Search">
                </div>
                <div>
                    <button class="submit" type="submit">Search</button>
                </div>
            </form>
            <form class="form" action="cancel.php">
                <div>
                    <button class="cancel" type="submit" name="cancel">CANCEL</button>
                </div>
            </form>
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
                    $search = $_POST['search'];
                    $searchType = $_POST['searchType'];
                    if($search != ""){
                        if($searchType == "id"){
                            $sql = "SELECT * FROM employees WHERE id='$search';";
                        }
                        elseif($searchType == "firstName"){
                            $sql = "SELECT * FROM employees WHERE first_name='$search';";
                        }
                        elseif($searchType == "lastName"){
                            $sql = "SELECT * FROM employees WHERE last_name='$search';";
                        }
                        else{
                            $sql = "SELECT * FROM employees WHERE departement='$search';";
                        }
                    }
                    else{
                        $sql = "SELECT * FROM employees";
                    }
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
                    <td><?php echo '<a class="delete" href="delete.php?id='. $row['id'] .'"><b>delete</b></a>';?></td>
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