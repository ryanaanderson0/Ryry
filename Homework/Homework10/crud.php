<?php
// Add the database connection
include('database.php');
/*
*   CHECK IF THE FORM HAS BEEN SUBMITTED AND INSERT
*   NEW USER INTO THE DATABASE
*/
if($_SERVER['REQUEST_METHOD'] == 'POST') {
}
/*
*   QUERY THE DATABASE AND STORE ALL USERS INTO A VARIABLE
*/
// Create your query
$query = "INSERT INTO USER_ANDERSON (first_name, last_name, email, password)
        VALUES ('$firstName', '$lastName', '$email', '$password')

        SELECT * FROM USER_ANDERSON";
// Run your query
$result = mysqli_query($connection, $query);
// Check if the database returned anything
if($result) {
    // If the database query was successful, store
    // the array of users into a variable
    $rows = mysqli_fetch_all($result);
} else {
    // Output an error
    echo "There has been an error connecting to the database";
}
?>

<!doctype html>
<html>
<head>
    <title>My First CRUD</title>
</head>
<body>
    <h1>Create a New User</h1>
    <form action="crud.php" method="POST">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" required><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br>

        <label for="password">Retype Password</label>
        <input type="password" id="password" name="password" required><br>

        <!--Add a second password input so the user has to retype their password -->

        <button>Register</button>
    </form>

    <h2>Output a List of Users</h2>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php // You will be adding a forEach loop here to output the users
            foreach($rows as $row){
                echo "<td>".$row['first_name']. "</td>";
                echo "<td>".$row['last_name']. "</td>";
                echo "<td>".$row['email']. "</td>";
                echo "<td>".$row['password']. "</td>";

            }
            else {
                echo $rows;
            }
            ?>
            </tr>
        </tbody>
    </table>
</body>
</html>