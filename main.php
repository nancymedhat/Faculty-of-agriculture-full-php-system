<?php
     include('server.php');

     $user = $_SESSION['Student_reg'];

	if (!isset($_SESSION['Student_reg'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['Student_reg']);
		header("location: index.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>برنامج تسجيل كليه زراعه سبابشا</title>
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
      height:5%;
      width:100%;
      position:fixed;
      bottom:0px;
      background-color: #94b8b8;
      padding-bottom: 25px;

    }
    .button {
  border-radius: 4px;
  background-color: #94b8b8;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 300px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  transition: 0.5s;
 position: relative;
 
}

.button span:after {
  content: '\00bb';
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
 position: absolute;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

#ex2 {
    border: 1px solid;
    padding: 10px;
    box-shadow: 5px 10px #888888;
}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="alex-log.png" style="width: 200px; height: 80px;">

      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" style="margin-top: 20px;font-size: 21px;">
      <!-- <label style="color:#1b498b; width:15%;font-size:1.2em; margin-top:4px;">كليه زراعه
        سابا باشا</label> -->
      <ul class="nav navbar-nav navbar-right" >
        <li><a style="color: black; margin-top: 4px;" href="main.php">الصفحة الرئسية</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
        </ul>
    </div>
  </div>
</nav>
<?php
 $sql3="SELECT name FROM users WHERE Student_reg = $user";
            mysqli_query($db,"SET CHARACTER SET utf8");
            $result = mysqli_query($db,$sql3);

            $user_data = mysqli_fetch_array($result);
?>
<br>
<div class="jumbotron" style="border-radius: 25px; border: 2px solid black; padding: 20px; width: 70%;height:30%; margin-left: 15%;" >
  <div class="container text-right " style="margin-right: 3%;">
    <h2 style="text-align: right; margin-top: 8px;"> الاسم:  <span style="font-size: 25px;"> <?php echo $user_data['name'];?></span></h2>
    <h2 style="text-align: right; margin-left: 8px;">المستوى : <span style="font-size: 25px;">الاول</span> </h2>
    <h2 style="text-align: right;  margin-right: -10px;">: التخصص  <span style="font-size: 25px;"></span> </h2>
    <br><br><br><br><br><br>
    <h2 style=" margin-top: -120px;">: CGPA</h2>
    <br> <br>
    <h2 style=" margin-top: -40px;">:عدد الساعات المكتسبة  </h2>
  </div>
</div>

<div class="container-fluid bg-3 text-center">
  
  <div class="row">

    <div class="col-sm-4">
    <button style="height: 100px; font-size: 28px; margin:2%;" type="button" class="button" onclick="window.location.href='info.php'" id="ex2"><span>تسجيــل البيانات</span></button>
  </div>
    <div class="col-sm-4">
      <button style="height: 100px;font-size: 28px; margin:2%;" type="button" class="button" onclick="window.location.href='table.php'" id="ex2" ><span>تسجيل المقرارات</span></button>
    </div>
    <div class="col-sm-4">
      <button style="height: 100px;font-size: 28px; margin:2%;" type="button" class="button" id="ex2"> <span>السـجل الأكاديمي</span> </button>
    </div>
  </div>
</div>

<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="col-sm-4" >
      <button style="height: 100px;font-size: 28px;margin:2%;" type="button" 
      class="button" id="ex2" onclick="window.location.href='3.php'"><span>تسجيل التخصص</span></button>
    </div>
    <div class="col-sm-4">
      <button style="height: 100px;font-size: 28px;margin:2%;" type="button" 
      class="button" id="ex2"><span>جدول الامتحانات</span>  </button>
    </div>
    <div class="col-sm-4">
      <button style="height: 100px;font-size: 28px;margin:2%;" type="button" 
      class="button" onclick="window.location.href='elsgl.php'" id="ex2"><span>المقرارات المسجله هذا الترم</span></button>
    </div>
  </div>
</div>
<div class="container-fluid bg-3 text-center">
  <div class="row">
     <div class="col-sm-4" >
  
    </div>
    <div class="col-sm-4" style="float:center;" >
      <button style="height: 100px;font-size: 28px; margin:2%; " type="button" 
      class="button" id="ex2"> <span>الحذف و الاضافة</span></button>
    </div>
 </div>
</div>   
<br>
<h3 style=" border-radius: 15px 50px 30px;
    background: #94b8b8;
    padding: 20px;
    width: 50%;
    height:30%; margin-left: 25%; "><ul>
    <li style="direction:rtl; margin-right: 20px;" >يتم إلغاء الإنذار الأكاديمي في حالة حصول الطالب على معدل تراكمي 2 على الأقل</li>
    <li style="direction:rtl;margin-right: 20px;">يتم زيادة عدد الإنذارات في كل فصل دراسي إذا إستمر المعدل التراكمي أقل من 2</li>
    <li style="direction:rtl;margin-right: 20px;">سيتم فصل الطالب إذا وصل عدد الإنذارات إلى 4 إنذارات</li>
  </ul></h3><br></br></br>

<footer class="container-fluid text-center">
  <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small>
</footer>

</body>
</html>
