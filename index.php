<!--we start the session with a cookie-->
<?php 
  session_start();
  $username = (isset($_SESSION["username"])) ? $_SESSION["username"] : "";
  $lecturer = (isset($_SESSION["lecturer"])) ? $_SESSION["lecturer"] : "";
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
          <li class="selected"><a href="index.php">Home</a></li>
          <?php if ($lecturer) { ?>
          <li><a href="lecturers.php">Lecturers</a></li>
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
        <h4>End of semester Exam</h4>
        <h5>Start Date:July 11th, 2017</h5>
        <p>The end of semester Exams are set to begin on 11th July, all students who have not cleared with the music director are required to do so before the said date.<br /><a href="students.php">confirm exam registration</a></p>
        <p></p>
        <h4>Guest Lucturer</h4>
        <h5>June 30th, 2017</h5>
        <p>A Renowned Pianist will visit our school and conduct a lecturer on the pachelbel notes. Interested parties are required to confirm attendance <br /><a href="students.php">Confirm attendance</a></p>
      </div>
      <div id="content">
        <h1>Welcome to The Starlight Music School</h1>
  <?php
    include "connect.php"; 
    if ($db_error) echo "<h3>".$db_errshow."</h3>";
    else { if ($username) { ?>
    <h4>Welcome back <?php if ($lecturer) echo "Lecturer"; else echo "Student"; ?><br>
    Please read important notes on the right side</h4><hr><br>
    <?php 
        if ($lecturer) {
          $lecturer_sql = "SELECT firstname, lastname FROM lecturers WHERE email='$username'";
          if ($result=mysqli_query($db_select,$lecturer_sql)) {
              while ($row=mysqli_fetch_row($result)) {
                  echo '<table style="color:#fff;background:#000;width:100%;">';
                  echo "<tr><td><b>Full Name: </b></td><td>".$row[0]." ".$row[1]."</td></tr>";
                  echo "<tr><td><b>Email Address: </b></td><td>".$username."</td></tr>";
                  echo "</table>";
              }
            }
        } else {
          $student_sql = "SELECT firstname, lastname, class, marks FROM students WHERE admno='$username'";
          if ($result=mysqli_query($db_select,$student_sql)) {
              while ($row=mysqli_fetch_row($result)) {
                  echo '<table style="color:#fff;background:#000;width:100%;">';
                  echo "<tr><td><b>Full Name: </b></td><td>".$row[0]." ".$row[1]."</td></tr>";
                  echo "<tr><td><b>Adm. No: </b></td><td>".$username."</td></tr>";
                  echo "<tr><td><b>Class: </b></td><td>".$row[2]."</td></tr>";
                  echo "<tr><td><b>Marks: </b></td><td>".$row[3]."</td></tr>";
                  echo "</table>";
              }
            }
        }
     } else { ?>
    <h4>Please log in to contine</h4>
    <form action="login.php" method="post">
          <div class="form_settings">
            <p><span>Email Address or Adm. No</span><input class="contact" type="text" name="username" value="" /></p>
            <p><span>Password</span><input class="contact" type="password" name="password" value="" /></p>
            <p style="padding-top: 15px"><span><input class="submit" type="submit" name="StudentIn" value="Login as a Student" /></span><input class="submit" type="submit" name="LecturerIn" value="Login as a Lecturer" /></p>
          </div>
        </form>
  <?php } } ?>
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

</body>
</html>