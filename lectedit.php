<?php 
	session_start();
	$username = (isset($_SESSION["username"])) ? $_SESSION["username"] : "";
  $lecturer = (isset($_SESSION["lecturer"])) ? $_SESSION["lecturer"] : "";
  include "connect.php";
    
  if (isset($_POST['UpdateNow'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $userid = $_POST['userid'];

    $update_sql = "UPDATE lecturers SET firstname='$firstname', lastname='$lastname', email='$email' WHERE userid='$userid'";
    if ($db_select->query($update_sql) === TRUE) {
        header("Location: lecturers.php");
    } else {
        header("Location: lectedit.php?userid=".$userid);
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
          <h1><a href="index.php">The <span class="logo_colour">StarLight Music School</span> </a></h1>
          <h2>Education is the key to success</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
        <?php if ($username) { ?>
          <li><a href="index.php">Home</a></li>
          <?php if ($lecturer) { ?>
          <li class="selected"><a href="lecturers.php">Lecturers</a></li>
          <li><a href="students.php">Students</a></li>
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
        <h3>Important Notes</h3>
        <h4>Lectuer's Meeting</h4>
        <h5>June 29th, 2017</h5>
        <p>All Lecturer's are requested to be seated at the Auditorium by 9:00am, Friday, 29th July<br /><a href="#">Seating arrangement</a></p>
        <p></p>
        <h4>New Equipment Storage Office </h4>
        <h5>July 21st, 2017</h5>
        <p>The newly built Equipment storage office will be launched on the said date, the guest of honor is yet to be chosen<br /><a href="#">Read more</a></p>
      </div>
      <div id="content">
        <h1>Edit my Details</h1>
        <?php
        $userid = $_GET['userid'];
        $lecturers_sql = "SELECT firstname, lastname, email FROM lecturers WHERE userid='$userid'";
        if ($result=mysqli_query($db_select,$lecturers_sql)) {
            while ($row=mysqli_fetch_row($result)) { ?>
            <form action="lectedit.php?userid=<?php echo $userid ?>" method="post">
            <div class="form_settings">
              <input type="hidden" name="userid" value="<?php echo $userid ?>" />
              <p><span>First Name</span><input class="contact" type="text" name="firstname" value="<?php echo $row[0] ?>" /></p>
              <p><span>Last Name</span><input class="contact" type="text" name="lastname" value="<?php echo $row[1] ?>" /></p>
              <p><span>Email Address</span><input class="contact" type="email" name="email" value="<?php echo $row[2] ?>" /></p>
              <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="UpdateNow" value="Update Details" /></p>
            </div>
          </form>
            <?php } mysqli_free_result($result);
          }
        ?>
		    
      </div>
    </div>
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