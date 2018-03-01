<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "starlight";
$db_error = false;
$db_errshow = null;

// Create connection
$db_conn = new mysqli($db_host, $db_username, $db_password);
// Check connection
if ($db_conn->connect_error) {
	$db_error = true;
    $db_errshow = "Connection failed: " . $db_conn->connect_error;
} 

// Create database
$sql_query = "CREATE DATABASE IF NOT EXISTS " . $db_name;
$db_query = $db_conn->query($sql_query);

if ($db_query) {
	$db_select = new mysqli($db_host, $db_username, $db_password, $db_name);
    $students_sql = "CREATE TABLE IF NOT EXISTS students (
		userid INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		admno VARCHAR(30) NOT NULL,
		marks INT(10),
		class VARCHAR(10) NOT NULL,
		email VARCHAR(50),
		password VARCHAR(50),
		reg_date TIMESTAMP
		)";

	$lectures_sql = "CREATE TABLE IF NOT EXISTS lecturers (
		userid INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		class VARCHAR(10) NOT NULL,
		email VARCHAR(50),
		password VARCHAR(50),
		reg_date TIMESTAMP
		)";

	$db_query = $db_select->query($students_sql);
	$db_query = $db_select->query($lectures_sql);
} else {
    $db_error = true;
    $db_errshow = "Error creating database: " . $db_conn->error;
}

$db_conn->close();
?>