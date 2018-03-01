<?php 
	session_start();
	$username = (isset($_SESSION["username"])) ? $_SESSION["username"] : "";
  include "connect.php";
  $userid = $_GET['userid'];
  $delete_sql = "DELETE FROM students WHERE userid='$userid'";

  if ($db_select->query($delete_sql) === TRUE) {
      header("Location: students.php");
  } else {
      header("Location: index.php");
  }
?>