<?php 
	session_start();
	$username = (isset($_SESSION["username"])) ? $_SESSION["username"] : "";
  $lecturer = (isset($_SESSION["lecturer"])) ? $_SESSION["lecturer"] : "";
  include "connect.php";
    
  if (isset($_POST['RegisterNow'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insert_sql = "INSERT INTO lecturers (firstname, lastname, email, password)
        VALUES ('$firstname', '$lastname', '$email', '$password')";
    if ($db_select->query($insert_sql) === TRUE) {
        header("Location: login.php");
    } else {
        header("Location: register.php");
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
          <h1><a href="index.php">The <span class="logo_colour">StarLight Music  School</span></a></h1>
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
        <h4>An incoming C.T.O</h4>
        <h5>August 1st, 2017</h5>
        <p>Following the resignation of Mr. John as the Chief Technology Officer last month we have another one in place.<br /><a href="#">Read more</a></p>
        <p></p>
        <h4>The Launch of a New Website</h4>
        <h5>July 1st, 2017</h5>
        <p>2017 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
      </div>
      <div id="content">
        <h1>Sign up as a Lecturer</h1>
	<?php 
		if ($db_error) echo "<h3>".$db_errshow."</h3>";
		else { if ($username) { ?>
		<h4>Welcome back</h4>
	<?php } else { ?>
		<h4>Please register to continue</h4>
		<form action="register.php" method="post">
          <div class="form_settings">
            <p><span>First Name</span><input class="contact" type="text" name="firstname" value="" /></p>
            <p><span>Last Name</span><input class="contact" type="text" name="lastname" value="" /></p>
            <p><span>Email Address</span><input class="contact" type="email" name="email" value="" /></p>
            <p><span>Password</span><input class="contact" type="password" name="password" value="" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="RegisterNow" value="Register" /></p>
          </div>
        </form>
	<?php } } ?>
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