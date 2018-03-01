<?php 
  session_start();
  $username = (isset($_SESSION["username"])) ? $_SESSION["username"] : "";
  $lecturer = (isset($_SESSION["lecturer"])) ? $_SESSION["lecturer"] : "";
   include "connect.php"; 
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
        <h3>Latest News</h3>
        <h4>To new students</h4>
        <h5>August 1st, 2017</h5>
        <p>Ensure you have your school ID at all times..<br /><a href="#">Read more</a></p>
        <p></p>To continuing students</h4>
        <h5>July 1st, 2017</h5>
        <p>Hand in your old ID for new one's.<br /><a href="#">Read more</a></p>
      </div>
      <div id="content">
        <h1>Students of The Starlight School</h1>
        <?php 
          $students_sql = "SELECT * FROM students";
          $results = $db_select->query($students_sql);
          if ($results->num_rows > 0) { ?>
          <table>
          <tr>
            <th>Full name</th>
            <th>Adm. No</th>
            <th>Class</th>
            <th>Marks</th>
            <th>Registerd on</th>
            <th colspan="2">Actions</th>
          </tr>
          <?php  
            while($row = $results->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['firstname'].' '.$row['lastname'] ?></td>
              <td><?php echo $row['admno'] ?></td>
              <td><?php echo $row['class'] ?></td>
              <td><?php echo $row['marks'] ?></td>
              <td><?php echo $row['reg_date'] ?></td>
              <td><a style="color:red;" href="studedit.php?userid=<?php echo $row['userid'] ?>">Edit</a></td>
              <td><a style="color:red;" href="studdel.php?userid=<?php echo $row['userid'] ?>">Delete</a></td>
            </tr>
        <?php } ?>
          </table>
         <?php } else { ?>
            <h3>No students</h3>
         <?php } ?>
         <h3><a href="studnew.php">Add new Students?</a></h3>
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