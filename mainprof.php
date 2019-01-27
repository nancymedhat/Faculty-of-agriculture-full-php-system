<?php
 include('server.php');
$user = $_SESSION['Student_reg'];

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

.success {
    border-color: #94b8b8;
    color: black;
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
        <li><a style="color: black; margin-top: 4px;" href="mainprof.php">الصفحة الرئسية</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
        </ul>
    </div>
  </div>
</nav>
<br> <br> <br>
<?php
 $sql3="SELECT name FROM proff WHERE userno = $user";
            mysqli_query($db,"SET CHARACTER SET utf8");
            $result = mysqli_query($db,$sql3);

            $user_data = mysqli_fetch_array($result);
?>
<div style="float:center;text-align:center;">
  <label style="font-size: 270%;">الدكتور : <?php echo $user_data['name'];?></label>
  <br>
 <label style="font-size: 200%; "> <?php
  echo $year;
?>:العام </label>
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
</br> <br> <br>

<div class="container-fluid bg-3 text-center">
  <div class="row">
<div class="col-sm-4">
<button class="btn success" type="button" style="height: 100px;margin:2%;width:253px;" onclick="window.location.href='show-subject.php'">طلاب الماده  
</button>
</div>
<div class="col-sm-4">
<button class="btn success" type="button" style="height: 100px;margin:2%;width:253px;" onclick="window.location.href='tsgeleldrgat.php'">تسجيل الدراجات
</button>
</div>
<div class="col-sm-4">
<button class="btn success" type="button" style="height: 100px;margin:2%; width:253px;" >مراجعة موقع الطالب</button>
</div>
<div class="col-sm-4">
<button class="btn success" type="button" style="height: 100px;margin:2%;width:253px;text-align: center;" onclick="window.location.href='graph.php'">احصائيه تقديرات المقرر
</button>
</div>
<div class="col-sm-4">
<button class="btn success" type="button" style="height: 100px;margin:2%; width:253px;" onclick="window.location.href='sheetprof.php'">تقديرات الطالبه</button>
</div>
<div class="col-sm-4">
<button class="btn success" type="button" style="height: 100px;margin:2%; width:253px;" >إضافة طالب</button>
</div>
</div>
</div>
</br> </br> </br>
<footer class="container-fluid text-center">
<small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim 
</small>
</footer>
</body>
</html>