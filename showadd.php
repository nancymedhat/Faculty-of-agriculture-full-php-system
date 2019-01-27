<?php
 include('server.php');

 if (isset($_POST['submitt'])) {
 $code=$_POST['code'];
  $drs_names=$_POST['drs_names'];
  $u=$_POST['u'];

$query2="SELECT id from users WHERE Student_reg='$u'";
mysqli_query($db,"SET CHARACTER SET utf8");
$result2 = mysqli_query($db,$query2);
$row = mysqli_fetch_assoc($result2);
$iid= $row['id'];

 
//insert
 $sql = "INSERT INTO $tableName (Course_code,id,drs_names)
VALUES ('".$_POST["code"]."',LAST_INSERT_ID(),'".$_POST["drs_names"]."')";
mysqli_query($db,"SET CHARACTER SET utf8");
$results=mysqli_query($db, $sql);

$q= "SELECT id from course where Course_code= '$code'";
mysqli_query($db,"SET CHARACTER SET utf8");
$results6=mysqli_query($db, $q);
$row = mysqli_fetch_assoc($results6);
$id1= $row['id'];
/*if ($results6) {
  echo $id1;
  echo $iid;
  echo "yess";
  $prompt_msg = "تم تسجيل الدخول";
        echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
}
else{
  $prompt_msg = " حاول مره اخرى";
  echo mysqli_error($db);
   echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
}*/
$query="INSERT INTO rcourse (courseid, student_id) VALUES ('$id1', '$iid')";
mysqli_query($db,"SET CHARACTER SET utf8");
$results=mysqli_query($db, $query);

if ($results) {
       $prompt_msg = "تم اضافه الماده";
        echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
        header('location: addcourse.php');
} else {
  $prompt_msg = " حاول مره اخرى";
  echo mysqli_error($db);
   echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");

}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>برنامج تسجيل كليه زراعه ســـابا بــاشا </title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
  <style>
  html { overflow-x: hidden; }
  table {
  border: 5px solid #94b8b8;

  }


center{
  width: 98%;
  margin-left: 1%;
  margin-top: 6%;
}
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
       <li><a href="mainAP.php" style="text-decoration:none; color:black;">الصفحــه الرئيسيه </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
        </ul>
    </div>
  </div>
</nav>
<br>
<div style="float:center;text-align:center;">
  <label style="font-size: 200%;">اضافه ماده لطالب</label>
<br>



<hr>
<form method="post" >
  <?php 
$uid=$_POST['id'];
 $d=$uid;
$query="SELECT * from users where Student_reg = '$d' ";
mysqli_query($db,"SET CHARACTER SET utf8");
$result7 = mysqli_query($db,$query);
$row = mysqli_fetch_assoc($result7);
$name= $row['name'];
$idd=$row['Student_reg'];
?>
<strong><div style="float: right; width : 20%;">
<label style="font-size:130%;">الاسم: <?php
echo $name;
?></label>
<br>

  <input style="background-color: transparent;
    border: 0px solid;width:70px;font-size:120%;" name="u" value="<?php
echo $d;
?>"><label style="font-size:130%;" name="num">:الرقم الجامعي</label>
</input>

<br>
<label style="font-size:130%;">   المستــوى : الأول </label>
<br>
     <label style=" font-size: 130%;">الفصل الدراسي:
   <?php if ($month >=1 && $month <=5 ) {
     echo 'التانى ';
   }
   elseif ($month >= 6 && $month <= 8) {
    echo 'صيف ';
   }
   else{
    echo 'الاول ';
   }
echo $year;
    ?>
      </label>
      <br><br>
</div>
</strong>
<br> <br> <br> <br><br> <br><br>
 
<div style="text-align:right; border-radius: 20px; border: 2px solid black;width: 90%;height:80%; margin-left:5%;">
<br>
    <div >
      <label  style="font-size: 210%;float:right;margin-right: 3%; "> :كود الماده</label>
    <select style="font-size:20px; width: 50%; float:left; margin-left: 30%;margin-top: 1%; " name="code">
     <option>
     <?php 
      $sql4="SELECT * from course";
      mysqli_query($db,"SET CHARACTER SET utf8");
                     $result5 = mysqli_query($db,$sql4);
             foreach ($result5 as $key => $value) {
     ?>
     </option>
     <option  name="code"> <?php echo $value['Course_code']; ?></option>
     <?php } ?>
    </select>
    </div>

  <br><br><br>
     <div>
     <label  style="font-size: 210%;float:right;margin-right: 3%;"> :إسم دكتور الماده</label>
     <select style="font-size:20px; width: 50%; float:left; margin-left: 30%;margin-top: 1%;" name="drs_names">
     <option>
     <?php 
      $sql5="SELECT name from proff";
      mysqli_query($db,"SET CHARACTER SET utf8");
                     $result6 = mysqli_query($db,$sql5);
             foreach ($result6 as $key => $value) {
     ?>
     </option>
     <option  name="drs_names"> <?php echo $value['name']; ?></option>
     <?php } ?>
    </select>
    </div>
    <br><br>
<div style="text-align:center;float:center;">
 <button name="submitt" style="width: 100px; height: 50px; font-size: 22px;color:#4CAF50; border: 2px solid #4CAF50;background:white;border-radius: 50%;margin-top:5%;position:static;">اضافه</button>
  
</div>
<br><br>
</div>
<br>
</form>

</br> </br> <br> <br>
<footer class="container-fluid text-center">
<small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim 
</small>
</footer>