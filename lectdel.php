<?php 
	session_start();
	$username = (isset($_SESSION["username"])) ? $_SESSION["username"] : "";
  include "connect.php";
  $userid = $_GET['userid'];
  $delete_sql = "DELETE FROM lecturers WHERE userid='$userid'";

  if ($db_select->query($delete_sql) === TRUE) {
      header("Location: lecturers.php");
  } else {
      header("Location: index.php");
  }
?>