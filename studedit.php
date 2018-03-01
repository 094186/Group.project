<?php 
	session_start();
	$username = (isset($_SESSION["username"])) ? $_SESSION["username"] : "";
  $lecturer = (isset($_SESSION["lecturer"])) ? $_SESSION["lecturer"] : "";
  include "connect.php";
    
  if (isset($_POST['UpdateNow'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $class = $_POST['class'];
    $marks = $_POST['marks'];
    $admno = $_POST['admno'];
    $password = $_POST['password'];

    $update_sql = "UPDATE students SET firstname='$firstname', lastname='$lastname', class='$class', 
      marks='$marks', admno='$admno', password='$password' WHERE userid='$userid'";
    if ($db_select->query($update_sql) === TRUE) {
        header("Location: students.php");
    } else {
        header("Location: studedit.php?userid=".$userid);
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
          <li class="selected"><a href="students.php">Students</a></li>
          <?php } ?>
          <li><a href="logout.php">Logout</a></li>
        <?php } else { ?>
        	  <li class="selected"><a href="index.php">Home</a></li>
          	<li><a href="login.php">Login</a></li>
          	<li><a href="register.php">Register</a></li>
        <?php } ?>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h3>Important notes</h3>
        <h4>To new Students</h4>
        <h5>August 1st, 2017</h5>
        <p>Register with your music teachers by friday.<br /><a href="register.php">Register</a></p>
        <p></p>
        <h4>To continuing students</h4>
        <h5>July 1st, 2017</h5>
        <p>Confirm registration with your music teacher's.<br /><a href="#">Confirm</a></p>
      </div>
      <div id="content">
        <h1>Edit this Student</h1>
        <?php
        $userid = $_GET['userid'];
        $student_sql = "SELECT firstname, lastname, admno, password, class, marks FROM students WHERE userid='$userid'";
        if ($result=mysqli_query($db_select,$student_sql)) {
            while ($row=mysqli_fetch_row($result)) { ?>
            <form action="studedit.php?userid=<?php echo $userid ?>" method="post">
            <div class="form_settings">
              <input type="hidden" name="userid" value="<?php echo $userid ?>" />
              <p><span>First Name</span><input class="contact" type="text" name="firstname" value="<?php echo $row[0] ?>" /></p>
              <p><span>Last Name</span><input class="contact" type="text" name="lastname" value="<?php echo $row[1] ?>" /></p>
            <p><span>Adm. No</span><input class="contact" type="text" name="admno"  value="<?php echo $row[2] ?>" /></p>
            <p><span>Password</span><input class="contact" type="password" name="password"  value="<?php echo $row[3] ?>" /></p>
              <p><span>Class</span><input class="contact" type="text" name="class" value="<?php echo $row[4] ?>" /></p>
              <p><span>Marks</span><input class="contact" type="text" name="marks" value="<?php echo $row[5] ?>" /></p>
              <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="UpdateNow" value="Update " /></p>
            </div>
          </form>
            <?php } mysqli_free_result($result);
          }
        ?>
		    
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
    </div>  </div>
</body>
</html>