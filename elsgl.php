<?php
include('server.php');
$now = new \DateTime('now');
 $month = $now->format('m');
 $year = $now->format('Y');
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

$sql3="SELECT c.Course_code , t.drs_names ,c.name ,c.hours from course c, rcourse r ,$tableName t
where c.id=r.courseid and r.student_id= '$id'and  c.Course_code=t.Course_code";
           mysqli_query($db,"SET CHARACTER SET utf8");
           $result = mysqli_query($db,$sql3);

           $sum = 0;
           while($read = mysqli_fetch_array($result)){
           $sum += $read['hours'];
         }

$sql6="SELECT name FROM users WHERE Student_reg = $user";
 mysqli_query($db,"SET CHARACTER SET utf8");
$result6 = mysqli_query($db,$sql6);
 $user_data = mysqli_fetch_array($result6);
           ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>الــسجل الاكاديــمي</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
               <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
               <!--Let browser know website is optimized for mobile-->
               <meta name="viewport" content="width=device-width, initial-scale=1"/>
               <!-- Bootstrap CSS -->
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
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
    }
    html { overflow-x: hidden; }
    table {
    border: 2px solid #94b8b8;

    }
  </style>
</head>
             <body style="width:100%;">
               <nav>
              <div class="nav-wrapper" style="background-color:#94b8b8">
                <a class="navbar-brand" href="#">
              <img src="alex-log.png"  style="width: 50%;margin-bottom:3%;margin-left:3%; padding:10 %;" >
           </a>

                <ul class="right hide-on-med-and-down">


                 <li><a href="index.php" style="text-decoration:none; color:black;"><i class="material-icons right">exit_to_app</i>تسجيل الخروج</a></li>
                  <li><a href="main.php" style="text-decoration:none; color:black;">الصفحــه الرئيسيه </a></li>
                </ul>
              </div>
            </nav>
<div id="cc">

  <strong>  <label style="margin-left:40%; margin-top :1%;height:5%; width:100%;font-size:150%;color:black;">المقــررات المسجله </label></strong>
<hr>
<strong><div>
<label style="margin-left:70%; margin-top :1%;height:5%; width:100%;font-size:100%;color:black;">الاسم: <?php echo $user_data['name'];?>

</label>



<label style="margin-left:73%;height:5%; width:100%;font-size:100%;color:black;">الرقم الجامعي:
<?php
echo "$user";
?>
</label>
<label style="margin-left:77%; height:5%; width:100%;font-size:100%;color:black;">   المستــوى : الأول </label>

     <label style="margin-left:71% ; height:1%; width:100%;font-size: 100%;color:black;">الفصل الدراسي:
   <?php if ($month >=1 && $month <=5 ) {
     echo 'التانى';
   }
   elseif ($month >= 6 && $month <= 8) {
    echo 'صيف';
   }
   else{
    echo 'الاول';
   }
echo   "    '   ' $year";
    ?>
      </label>
</div></strong>

<hr>
<center>


 </select>
  <div class="table-responsive">
    <table class="table table-borderd">
      <thead>
        <tr>

          <th scope="col">عدد الساعات</th>
          <th scope="col">اسم الماده</th>
          <th scope="col">اسم الدكتور </th>
          <th scope="col">كود الماده</th>
        </tr>
      </thead>
      <?php foreach ($result as $key => $value) {
        ?>
      <tbody>
        <tr>
        <th role="row"><?php echo $value['hours'];?></th>
       <td><?php echo $value['name']; ?></td>
       <td><?php echo $value['drs_names']; ?></td>
       <td><?php echo $value['Course_code']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

</center>
<div style="margin-left:2%;font-size:100%;color:black;">
<strong>  <label style="color:black;font-size:120%;">اجمالي عدد الساعات : <?php echo $sum;?> </label></strong>
</div>
<div style="margin-left:90%;margin-top:.5%;">
   <a class="btn-floating btn-sm waves-effect waves-light red"onclick="myFunction()"><i class="material-icons">print</i></a>
</div>
</div>
<hr>



</br></br>

        <footer class="container-fluid text-center">
          <p> <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small></p>
        </footer>


<script>
function myFunction() {
    window.print();
}
</script>
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
