<?php
 include('server.php');
$user = $_SESSION['Student_reg'];
if(isset($_POST['save'])){
$name=$_POST['name'];
$username=$_POST['username'];
$row_password=sha1($_POST['row_password']);
$insert ="INSERT INTO users (name,Student_reg,password )
    VALUES  ( '$name',
              '$username',
              '$row_password'
              )";
mysqli_query($db,"SET CHARACTER SET utf8");
 if (mysqli_query($db, $insert)) {
       $prompt_msg = "تم تسجيل الطالب ";
        echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
    } else {
        $prompt_msg = "حول مره اخره ";
        echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
    }
}
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
</style>
<script type="text/javascript">
function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}

function generate() {
    myform.row_password.value = randomPassword(myform.length.value);
}
</script>
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
  <label style="font-size: 250%;">اضافة طالب جديد</label>
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
</br> 
<form name="myform" method="post" action="newstudent">
  <input type="hidden" name="length" value="8">
<div style="text-align:right; border-radius: 20px; border: 2px solid black;width: 90%;height:80%; margin-left:5%;">
<br>
<div >
      <label  style="font-size: 210%;float:right;margin-right: 3%; "> :اسم الطالب</label>
    <input type="text" name="name" style="font-size:20px; width: 50%; float:left; margin-left: 30%;margin-top: 1%;">
    </div>
    <br><br><br>
    <div >
      <label  style="font-size: 210%;float:right;margin-right: 3%; "> :رقم جلوس الطلب</label>
    <input type="text" name="username" style="font-size:20px; width: 50%; float:left; margin-left: 30%;margin-top: 1%;">
    </div>

  <br><br><br>
     <div>
     <label  style="font-size: 210%;float:right;margin-right: 3%;"> :كلمة السر</label>
     <input name="row_password" type="text" style="font-size:20px; width: 50%; float:left; margin-left: 30%;margin-top: 1%;">
      <input type="button" class="button" value="Generate" onClick="generate();" style="margin-right:64%;" >
    </div>

<div style="text-align:center;float:center;">
  <button name="save"  style="width: 100px; height: 50px; font-size: 22px;color:#4CAF50; border: 2px solid #4CAF50;background:white;border-radius: 50%;margin-top:5%;position:static;">اضافه</button>
  <button name="delete" style="width: 100px; height: 50px; font-size: 22px;color:Red; border: 2px solid Red;background:white;border-radius: 50%;position:static;" onclick("newstudent.php") >مسح الكل</button>
</div>
<br><br>
</div>
<br>
</form>

<br> </br>


<footer class="container-fluid text-center">
<small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim 
</small>
</footer>
</body>
</html>    