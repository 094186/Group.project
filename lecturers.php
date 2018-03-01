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
        <h3>Latest News</h3>
        <h4>An incoming Lecturer</h4>
        <h5>August 1st, 2017</h5>
        <p>Following the resignation of Mr. John as piano teacher last month we have spought the services of another teacher.<br /><a href="#">Read more</a></p>
        <p></p>
        <h4>Interruption of services</h4>
        <h5>July 28th, 2017</h5>
        <p>The facility will remain closed as it will be a national holiiday. Enjoy! .<br /><a href="#">Holiday!</a></p>
      </div>
      <div id="content">
        <h1>Lecturers of The Starlight Music School</h1>
        <?php 
          $lecturers_sql = "SELECT * FROM lecturers";
          $results = $db_select->query($lecturers_sql);
          if ($results->num_rows > 0) { ?>
          <table>
          <tr>
            <th>Full name</th>
            <th>Email Address</th>
            <th>Registered on</th>
            <th colspan="2">Actions</th>
          </tr>
          <?php  
            while($row = $results->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['firstname'].' '.$row['lastname'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['reg_date'] ?></td>
              <td><a style="color:red;" href="lectedit.php?userid=<?php echo $row['userid'] ?>">Edit</a></td>
              <td><a style="color:red;" href="lectdel.php?userid=<?php echo $row['userid'] ?>" onclick="alert('Are you sure you wanna delete this record? This action can not be reversed even if you went to the moon and came back.')">Delete</a></td>
            </tr>
        <?php } ?>
          </table>
         <?php } else { ?>
            <h3>Register as a <a href="register.php">New Lecturer</a></h3>
         <?php } ?>
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