<?php
 include('server.php');

 $res ="SELECT Course_code FROM $tableName";
 mysqli_query($db,"SET CHARACTER SET utf8");
  $result = mysqli_query($db,$res);
?>
<!DOCTYPE html>           
<head>
  <title>برنامج تسجيل كليه زراعه ســـابا بــاشا </title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <li><a style="color: black; margin-top: 4px;" href="mainAP.php">الصفحة الرئسية</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
        </ul>
    </div>
  </div>
</nav>
<br> <br>
<div style="float:center;text-align:center;">
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
   <?php
        foreach ($result as $key => $value)
        {
           ?>

    <button onclick="select()" > <?php echo $value['Course_code'] ?></button>
           <?php
       }
       ?>


<?php

</body>
</html>