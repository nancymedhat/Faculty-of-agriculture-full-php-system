<?php include('server.php')
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>برنامج تسجيل كليه زراعه سبابشا</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css.css">
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
    .header {
        width: 60%;
        margin: 3.5% auto 0px;
        color: white;
        background: #94b8b8;
        text-align: center;
        border: 1px solid #B0C4DE;
        border-bottom: none;
        border-radius: 10px 10px 0px 0px;
        padding: 0.5%;
    }
    .input-group {
        margin: 5% 0px 1% 0px;
        width: 60%;

    }

    .input-group label {
        display: block;
        float: right;
        text-align: right;
        margin-right: -65% ;
        margin-bottom: 1%;
    }
    .input-group input {
        height: 40%;
        width: 50%;
        padding: 5px 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid grey;
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
      <img  src="alex-log.png" style="width: 200px; height: 80px; padding: 3%;">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" style="margin-top: 1%;font-size: 21px;">
			<ul class="nav navbar-nav navbar-right" >
        <li style="margin-bottom:5%;"><a style="color: white;text-align: right; font-size: 28px;  padding-top: 10px; margin-top:2.5%;"  > برنامج تسجيل زراعه سابا باشا</a></li>
      </ul>

    </div>
  </div>
</nav>
<div class="header">
	 <h2>تسجيل الدخول</h2>
 </div>
 <form style="background-color:#F8F8FF; width: 60%;" action="index.php" method="post">
          <?php include('errors.php'); ?>
		<div class="input-group">
			<label style="float: right; text-align: right; font-size: 24px;">:إسم المستخدم</label>
      <br><br>
			<input type="text" name="Student_reg" style="width: 170%; height: 40%;" >
		</div>
		<div class="input-group">
			<label style="float: right; text-align: right; font-size: 24px;">:كلمة المرور</label>
      <br><br>
			<input type="password" name="password" style="width: 170%; height: 40%;">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user" style="color: black;font-size: 24px;">دخول</button>
		</div>
		<div >
			  	<input type="checkbox" name="remember" style=" transform: scale(2); width: 25px;"><label style="font-size: 22px;">تذكرنى</label>
		</div >
	</form>

  <footer class="container-fluid text-center">
    <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small>
  </footer>

</body>
</html>
