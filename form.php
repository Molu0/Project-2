<?php
// Get the form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Connect to the database
$host = '127.0.0.1:3306';
$user = 'root';
$pass = 'sql@molu123';
$db = 'database_name';
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert the user data into the database
$sql = "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "User registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
