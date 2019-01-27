<?php
include('server.php');
$user = $_SESSION['Student_reg'];
$query2="SELECT id from users WHERE Student_reg='$user'";
mysqli_query($db,"SET CHARACTER SET utf8");
$result2 = mysqli_query($db,$query2);
$row = mysqli_fetch_assoc($result2);
$id= $row['id'];

if (!isset($_SESSION['Student_reg'])) {
$_SESSION['msg'] = "You must log in first";
header('location: login.php');
}

$sql3="SELECT * FROM reg ";
           mysqli_query($db,"SET CHARACTER SET utf8");
           $result = mysqli_query($db,$sql3);



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
       background-color: #94b8b8;
       border-color: #94b8b8;

    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      height:30px;
      width:100%;
      position:fixed;
      bottom:0px;
      background-color: #94b8b8;
      padding: 25px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
    center{
      width: 95%;
      margin-left: 2%;
      margin-top: 5%;
      border: 5px;
    }
  h3{
    
    margin-bottom: 2%;
  }
  </style>
</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <img src="alex-log.png" style="width: 200px; height: 80px; padding:3%">
      </div>
      <div class="collapse navbar-collapse" id="myNavbar" style="margin-top: 20px;font-size: 21px;">
        <ul class="nav navbar-nav navbar-right" >
          <li><a style="color: black; margin-top: 4px;" href="adminpage.php">الصفحة الرئسية</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
          </ul>
      </div>
    </div>
  </nav>
<center>
  <strong><h3 > جــدول المــحاضــرات</h3>  </strong>
  <div class="table-responsive">
    <table class="table table-bordered" >
      <thead>
        <tr>
          <th >الي </th>
          <th >من </th>
          <th >المكان </th>
          <th  >اسم الماده</th>

        </tr>
      </thead>
      <?php foreach ($result as $key => $value) {
        ?>
      <tbody>
        <tr>
        <td><?php echo $value['too']; ?></td>
        <td><?php echo $value['fromm']; ?></td>
        <td><?php echo $value['place']; ?></td>
        <td><?php echo $value['subject']; ?></td>

  </tr>
        <?php } ?>
      </tbody>
    </table>

</center>








        <footer class="container-fluid text-center">
          <p> <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small></p>
        </footer>



      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


    </body>
  </html>
