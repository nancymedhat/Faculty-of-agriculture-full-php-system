<?php
 include('server.php');

  $now = new \DateTime('now');
   $month = $now->format('m');
   $year = $now->format('Y');
   ?>
   <!DOCTYPE html>
<html lang="en">
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
    .btn {
    border: 3px solid black;
    background-color: white;
    color: black;
    padding: 34px 68px;
    font-size: 20px;
    cursor: pointer;


}

/* Green */
.success {
    border-color: #94b8b8;
    color: black;
    text-align: center;
}

.success:hover {
    background-color: #94b8b8;
    color: white;
}

.bttndiv{
	float: center;
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
        <li><a style="color: black; margin-top: 4px;" href="adminpage.php">الصفحة الرئسية</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
        </ul>
    </div>
  </div>
</nav>
<br> <br>
<form method="post">
</select>
 <label style="font-size: 35px; text-align:center; float:center;margin-left:45%;  "> <?php
  echo $year;
?>:العام </label>
 
 
  <label style="font-size: 35px; text-align:center; float:center;margin-left:45%;">الترم: <?php if ($month >=1 && $month <=5 ) {
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
</br> </br> </br> </br> 
<div class="container-fluid bg-3 text-center">
  <div class="row">
<div class="col-sm-4">
<button class="btn success" style="height: 100px;margin:2%;width:253px;">إضافه طالب جديد
</button>
</div>
<div class="col-sm-4">
<button class="btn success" style="height: 100px;margin:2%;width:253px;">إضافه ماده لطالب
</button>
</div>
<div class="col-sm-4">
<button class="btn success" style="height: 100px;margin:2%; width:253px;">سحب ماده لطالب</button>
</div>

<div class="col-sm-4">
<button class="btn success" type="button"  style="height: 100px;margin:2%; width:253px;" onclick="window.location.href='adminpage.php'" >طرح مقرر
</button>
</div>
<div class="col-sm-4">
<button class="btn success" style="height: 100px;margin:2%;width:253px;">حذف مقرر
</button>
</div>
<div class="col-sm-4">
<button class="btn success" style="height: 100px;margin:2%;width:253px;"> اضافه الجداول</button>
</div>
<div class="col-sm-4">
<button class="btn success" style="height: 100px;margin:2%;width:253px;">No function yet</button>
</div>
<div class="col-sm-4">
<button class="btn success" style="height: 100px;margin:2%;width:253px;">قبول طلبات التخصص</button>
</div>
<div class="col-sm-4">
<button class="btn success" style="height: 100px;margin:2%;width:253px;">تاكيد درجات الطالب</button>
</div>
</div>
</div>
</br> </br> </br> </br>
<footer class="container-fluid text-center">
<small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim 
</small>
</footer>
</body>
</html>
