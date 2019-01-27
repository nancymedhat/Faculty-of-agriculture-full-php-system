<?php
 include('server.php');
 $user = $_SESSION['Student_reg'];
 $s="SELECT name From proff where userno = '$user'";
              mysqli_query($db,"SET CHARACTER SET utf8");
              $result22 = mysqli_query($db,$s);
              $row1 = mysqli_fetch_assoc($result22);
              $name= $row1['name'];
?>
<!DOCTYPE html>
<head>
  <title>برنامج تسجيل كليه زراعه ســـابا بــاشا </title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<style>
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
       background-color: #94b8b8;
       border-color: #94b8b8;

    }
    footer {
      height:30px;
      width:100%;
      position:fixed;
      bottom:0px;
      background-color: #94b8b8;
      padding: 25px;
    }
    .trad{
      border-style:groove;
      border-width: thin;
      box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
      padding: 10px;
      float:center;
       margin-left: 30%;
      margin-right: 25%;
    }
    .card {
      float:center;
    }
    .srad{

      border-style:groove;
      border-width: thin;
      box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
      padding: 10px;
      float:right;
      padding-bottom: 5px;
    }
    .button {
    position: relative;
    background-color: #94b8b8;
    border: none;
    font-size: 28px;
    color: #FFFFFF;
    padding: 10px;
    width: 100px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}

.button:after {
    content: "";
    background: #90EE90;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px!important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.button:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin-left:20%; 
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color:#94b8b8;
    color: white;
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
      <img src="alex-log.png" style="width: 200px; height: 80px; padding:3%;">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" style="margin-top: 20px;font-size: 21px;">
      <ul class="nav navbar-nav navbar-right" >
        <li><a style="color: black; margin-top: 4px;" href="mainprof.php">الصفحة الرئسية</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
        </ul>
    </div>
  </div>
</nav>
<br> <br>
<div  class="trad" style="float:center;text-align:center;">
  <label style="font-size: 250%;">المقررات</label>
  <br>
 <label style="font-size: 200%; "> <?php
  echo $year;
?>:لعام </label>
<br>
  <label style="font-size: 200%;">الترم: <?php if ($month >=1 && $month <=5 ) {
   echo 'التانى';
 }
 elseif ($month >= 6 && $month <= 8) {
  echo 'سمر';
 }
 else{
  echo 'الاول';
 }
  ?> </label>
</div>
<br>
<div class="card">
<form action="show-subject.php" method="post" style="margin:5%;">
  <center>
   <label style="font-size:22px;">:الماده</label> <br>
   <select style="width:300px;height:30px;font-size:18px;" name="subjuct">
      <option selected> اختر الماده</option>
      <?php
          $myvaluee=$_POST['subjuct'];
           $sql36="SELECT * FROM course c, $tableName t 
             where c.Course_code=t.Course_code and t.drs_names='$name'";
                       mysqli_query($db,"SET CHARACTER SET utf8");
                       $result1 = mysqli_query($db,$sql36);
            foreach ($result1 as $key => $value) {
           ?>
      <option><?php echo $value['name'] ; ?></option>
      <?php } ?>
   </select>
   </center> <br>
   <?php

      $queryy = "SELECT id FROM course WHERE name = '$myvaluee' ";
      mysqli_query($db,"SET CHARACTER SET utf8");
      $result = mysqli_query($db,$queryy);
      $roww = mysqli_fetch_row($result);
       $u=$roww[0];

      $sql35="SELECT A.name , A.Student_reg  from users A, rcourse r
      where   A.id=r.student_id and r.courseid= '$u' ";
      mysqli_query($db,"SET CHARACTER SET utf8");
      $result = mysqli_query($db,$sql35);

      ?>
      <center>
      <button class="button" type="submit"><span> عرض </span></button>
 </center>
</form>
</select><br><br>
</div>
<div style="margin-left:10%;" class="table-responsive">
<table id="customers">
   <thead>
      <tr>

         <th scope="col">اسم الطالب  </th>
         <th scope="col">  الرقم الجامعي  </th>
      </tr>
   </thead>
   <?php foreach ($result as $key => $value) {
      ?>

   <tbody>
      <tr>

         <td><?php echo $value['name']; ?></td>
         <td><?php echo $value['Student_reg']; ?></td>
      </tr>
      <?php } ?>
   </tbody>
</table>
</div>
<br> <br> <br> <br>
 <footer class="container-fluid text-center">
  <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>
