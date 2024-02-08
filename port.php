<?php
// $name = $_POST['name'];
// $email = $_POST['email'];
// $message = $_POST['message'];

// echo "this is users name :".$name."</br>";
// echo "this is users Email :".$email."</br>";
// echo "this is users message :".$message."</br>";

$conn = mysqli_connect("localhost","root","RagulSam@2002");
if(!$conn){
    die("Couldn't connect mysql".mysqli_connect_error());
}
else echo "connected";
$db = mysqli_query($conn,"create database portfolio");
$dbuse = mysqli_query($conn,"use portfolio");
$table = mysqli_query($conn,"create table portfolio_table(name varchar(50),email varchar(100),message varchar(255))");
if(!$table){
    die("Couldn't create table");
}
else echo "table created";


$table = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS user_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(100),
    message VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");
if(!$table){
    die("Couldn't create table");
}
else echo "table created";
// Insert data into the portfolio_table

$insertQuery = "INSERT INTO user_details (name, email, message) VALUES ('$name', '$email', '$message')";

$insertResult = mysqli_query($conn, $insertQuery);

if ($insertResult) {
    echo "Form details stored successfully in the database.";
} else {
    echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
}

?>