<?php
  include('server.php');
  $user = $_SESSION['Student_reg'];
  if(isset($_POST['submit'])){

    $db = mysqli_connect('localhost', 'root', '', 'registration1');

    $name =$_POST['a'];
    $nationalid =$_POST['b'];
    $address =$_POST['n'];
    $email =$_POST['h'];
    $homeTeleh = $_POST['f'];
    $mobileTeleh = $_POST['g'];
    $birthDateh = $_POST['e'];

$oldpassword =sha1(@$_POST['oldpassword']);
$newpassword = sha1(@$_POST['newpassword']);
//$repeatnewpassword =md5(@$_POST['repeatnewpassword']);
//check password against db
//connect to db
if ($name& $nationalid & $address & $email & $homeTeleh & $mobileTeleh & $birthDateh || $oldpassword & $newpassword) {


$query="SELECT password FROM users WHERE Student_reg='$user'";
$queryget = mysqli_query ($db,$query);
$row = mysqli_fetch_assoc($queryget);
$oldpassworddb = $row ['password'];
//check passwords
if($oldpassword==$oldpassworddb)

{
  $query1="UPDATE users SET password='$newpassword' WHERE Student_reg='$user'";
$querychange = mysqli_query ($db,$query1) ;
if ($querychange) {
  $prompt_msg = "تم تغيير الرقم السري ";
   echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
}
}
else {
 $prompt_msg = "الرقم السري غير صحيح !";
        echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
}

    $insert ="INSERT INTO info (name, national_id,homeTele,mobileTele,birthDate,address, email)
    VALUES  ( '$name',
              '$nationalid',
              '$homeTeleh',
              '$mobileTeleh',
              '$birthDateh',
              '$address',
              '$email'
              )";


    if (mysqli_query($db, $insert)) {
       $prompt_msg = "تم تغير البيانات ";
        echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
    } else {
        $prompt_msg = "ادخل كل البيانات المطلوبه ";
        echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>برنامج تسجيل زراعــه ســابا بــاشا </title>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<form  method="post">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
       background-color: #94b8b8;
       border-color: #94b8b8;
    }
    footer {
      background-color: #94b8b8;
      padding: 25px;
    }
</style>
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
        <li><a style="color: black; margin-top: 4px;" href="main.php">الصفحة الرئسية</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: black;" href="index.php"><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
      </ul>
    </div>
  </div>
</nav>
</head>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">

    <!-- Left Column -->
    <div class="w3-third" style="float: right;">

      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="cap.png" style="width:100%" alt="Gradutation cap">
          <div class="w3-display-bottomright w3-container w3-text-black">
            <?php
              $sql3="SELECT * FROM users WHERE Student_reg = $user";
            mysqli_query($db,"SET CHARACTER SET utf8");
            $result = mysqli_query($db,$sql3);

            $user_data = mysqli_fetch_array($result);
                ?>
            <h2><?php echo $user_data['name'];?></h2>
          </div>
        </div>
        <div class="w3-container" style="text-align: right;">
          <h4> : رقم الجلوس </h4>
           <h4 style="margin-right: 100px;"><?php echo $user_data['Student_reg'];?></h4>
          <h4>: المستوى </h4>
          <h4 style="margin-right: 100px;">الاول</h4>
          <h4>: التخصص</h4>
          <h4 style="margin-right: 100px;">زراعى</h4>
          <hr>

          <p class="w3-large" ><b style="font-size: 23px">بيانات دراسية</b></p>
          <h4>CGPA</h4>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:0%">0%</div>
          </div>
          <h4>عدد السعات المكتسبه</h4>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:0%">
              <div class="w3-center w3-text-white">0%</div>
            </div>
          </div>
          <br><br><br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird" style="float: left;">

      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16" style="text-align: right; font-size: 42px;">بيانات شخصية</h2>
        <div class="w3-container" style="text-align: right;">
          <label class="col-xs-5" style="font-size: 20px; margin-left:60%;">:الأسم بالأنجليزيه </label>
          <input class="col-xs-5 " type="text" name="a" style=" margin-top:-5%;margin-left:16%;padding:1%; width: 60%;">
          <br>
          <br>
          <br>
          <label  class="col-xs-5" style="font-size: 20px; margin-left:60%;">: الرقم القومي</label>
          <input  class="col-xs-8"  type="text" name="b" style="margin-top:-4%;margin-left:16%;;padding:1%; width: 60%;">
        </div>
        <div class="w3-container" style="text-align: right;" >
          <br>
          <label class="col-xs-5" style="font-size: 20px; margin-left:60%;">:الرقم السري الحــالي  </label>
          <input class="col-xs-8" type="password" name="oldpassword" style="margin-top:-4%;margin-left:16%;;padding:1%; width: 60%;">
          <br><br><br>
          <label  class="col-xs-5" style="font-size: 20px; margin-left:60%;">:الرقم السري الجــديد </label>
          <input class="col-xs-8" type="password"   name="newpassword" style="margin-top:-4%;margin-left:16%;;padding:1%; width: 60%;">
        </div>
        <br><br>
      </div>


      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16" style="text-align: right; font-size: 42px;">بيانات التواصل</h2>
        <div class="w3-container" style="text-align: right;">
           <label class="col-xs-5" style="font-size: 20px;margin-left:60%;">:رقم التليفون </label>
          <input  class="col-xs-8" type="text" name="f" style="margin-top:-4%;margin-left:16%;;padding:1%; width: 60%;">
          <br><br><br>
           <label class="col-xs-5" style="font-size: 20px;margin-left:60%;"> :الموبيل</label>
           <input class="col-xs-8"  type="text" name="g" style="margin-top:-4%;margin-left:16%;;padding:1%; width: 60%;">
        </div>
        <div class="w3-container" style="text-align: right;">
          <br>
          <label  class="col-xs-5"style="font-size: 20px;margin-left:60%;">:البــريد الألكتروني</label>
          <input  class="col-xs-8"  type="email" name="h" style="margin-top:-4%;margin-left:16%;;padding:1%; width: 60%;">
          <br><br><br>
           <label class="col-xs-5" style="font-size: 20px;margin-left:60%;">:العنوان</label>
          <input  class="col-xs-8" type="text"  name ="n" style="margin-top:-4%;margin-left:16%;;padding:1%; width: 60%;">
        <br><br><br> <hr>
        </div>
        <div class="w3-container" style="text-align: center;">
            <input type='submit' name='submit' style="width: 100px; height: 50px; font-size: 22px; background-color: green " value="حفظ">
          <button style="width: 100px; height: 50px; font-size: 22px; background-color: #DC143C">مسح الكل</button>
          <br><br>
        </form>
        </div>
      </div>


    <!-- End Right Column -->
    </div>

  <!-- End Grid -->
  </div>

  <!-- End Page Container -->
</div>

<footer class="container-fluid text-center">
  <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small>
</footer>


</body>
</html>
