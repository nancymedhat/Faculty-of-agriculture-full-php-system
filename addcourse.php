<?php
 include('server.php');
  
if(isset($_POST['save'])){
   global $id;
   $id=$_POST['id'];
 $qq="SELECT id from users where Student_reg= '$id' ";
$results8=mysqli_query($db, $qq);
$row1 = mysqli_fetch_assoc($results8);
$iid= $row1['id'];
echo $iid;

   $query="SELECT Student_reg from users where Student_reg='$id'";
   mysqli_query($db,"SET CHARACTER SET utf8");
   $results=mysqli_query($db, $query);
   if ($results) {
    echo $id;
    //header('location: show.php');
    $prompt_msg = "تم تسجيل الدخول";
        echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
  }
  else{
  $prompt_msg = " حاول مره اخرى";
  echo mysqli_error($db);
   echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
}

}


   ?>
   <!DOCTYPE html>
<html lang="en">
<head>
  <title>سحب ماده لطالب</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
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
    .button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 10px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
    </style>
    </head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-flid">
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
        <li><a style="color: black; margin-top: 4px;">الصفحة الرئسية</a>
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
  <label style="font-size: 270%;">اضافه ماده لطالب</label>
<br> <br>
<div style="text-align:center; float:center;">
 <label style="font-size: 210%;"> <?php
  echo $year;
?>:العام </label>
<br>
  <label style="font-size: 210%; ">الترم: <?php if ($month >=1 && $month <=5 ) {
   echo 'الثانى';
 }
 elseif ($month >= 6 && $month <= 8) {
  echo 'سمر';
 }
 else{
  echo 'الاول';
 }
  ?> </label>
  </div> <form method="post" action="showadd.php">
      <div style="text-align:right; border-radius:20px; border:2px solid black;width:90%;height:70%;margin-left:5%;">
  
      <label style="font-size: 210%;float:right;margin-right: 3%; "> :برجاء إدخال رقم الطالب
      </label>
    <input style="font-size:20px; width: 50%; float:left; margin-left:30%;margin-top: 1%; " name="id">
    </input>
    <div style="text-align:center;float:center;">
   <button name="save"  style="width: 100px; height: 60px; font-size: 22px;color:#4CAF50; border: 2px solid #4CAF50;background:white;border-radius: 50%;margin-top:5%;position:static;">اضافه</button>
   <button name="s" formaction="sgeladmin.php" style="width: 100px; height: 60px; font-size: 22px;color:#4CAF50; border: 2px solid #4CAF50;background:white;border-radius: 50%;margin-top:5%;position:static;">عرض </button>
   
</div>
<br>
  </div>
</form>
    <br>
 
</br> </br>



<footer class="container-flid text-center">
<small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim 
</small>
</footer>
</body>
</html>