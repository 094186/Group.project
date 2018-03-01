<?php 
	session_start();
	$username = (isset($_SESSION["username"])) ? $_SESSION["username"] : "";
  $lecturer = (isset($_SESSION["lecturer"])) ? $_SESSION["lecturer"] : "";
  include "connect.php";
    
  if (isset($_POST['RegisterNow'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $class = $_POST['class'];
    $marks = $_POST['marks'];
    $admno = $_POST['admno'];
    $password = $_POST['password'];

    $insert_sql = "INSERT INTO students (firstname, lastname, class, marks, admno, password)
        VALUES ('$firstname', '$lastname', '$class', '$marks', '$admno', '$password')";
    if ($db_select->query($insert_sql) === TRUE) {
        header("Location: students.php");
    } else {
        header("Location: studnew.php");
    }
  }
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>The Starlight Music School</title>
  <link rel="stylesheet" type="text/css" href="style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.php">The <span class="logo_colour">StarLight Music School</span></a></h1>
          <h2>Education is the key to success</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
        <?php if ($username) { ?>
          <li><a href="index.php">Home</a></li>
          <?php if ($lecturer) { ?>
          <li><a href="lecturers.php">Lecturers</a></li>
          <li><a href="students.php">Students</a></li>
          <?php } ?>
          <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
        	  <li><a href="index.php">Home</a></li>
          	<li><a href="login.php">Login</a></li>
          	<li class="selected"><a href="register.php">Register</a></li>
        <?php } ?>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h3>Latest News</h3>
        <h4>Register new student/h4>
        <h5>August 1st, 2017</h5>
        <p>Registration can be revoked by the dean.<br><br></p><a href="#">Read more</a></p>
        <p></p><br><br><br><br>
        <h4>The Launch of a New Website</h4>
        <h5>July 1st, 2017</h5>
        <p>We love your feedback. <br /><a href="#footer">Contact Us</a></p>
      </div>
      <div id="content">
        <h1>Register a new student</h1>
		<form action="studnew.php" method="post">
          <div class="form_settings">
            <p><span>First Name</span><input class="contact" type="text" name="firstname" value="" /></p>
            <p><span>Last Name</span><input class="contact" type="text" name="lastname" value="" /></p>
            <p><span>Adm. No</span><input class="contact" type="text" name="admno" value="" /></p>
            <p><span>Password</span><input class="contact" type="password" name="password" value="" /></p>
            <p><span>Class</span><input class="contact" type="text" name="class" value="" /></p>
            <p><span>Marks</span><input class="contact" type="text" name="marks" value="" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="RegisterNow" value="Add Student" /></p>
          </div>
        </form>
      </div>
    </div>
    <div id="footer">
  <div id="footer">                             
           
                
                    <h4><strong>Contact US</strong>
                    </h4>
                    <p>Ole Sangale Road
                        <br>Madaraka, Nairobi-00200<br>
                     Phone - +254701439515<br>
                        <a href"https://www.gmail.com/">stralightmusicschool@gmail.com</a></p>                
                            <a href="https://www.facebook.com/">Facebook</a><br>                         
                            <a href="https://twitter.com/signup?lang=en">Twitter</a><br> 
                            <a href="https://www.instagram.com/?hl=en">Instragram</a> <br>                     
                            Copyright &copy; Starlight Music  | Designed by <a href="#">Sharon Mutua</a>                               
    </div>
  </div>
</body>
</html>