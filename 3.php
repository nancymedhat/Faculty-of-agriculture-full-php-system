 <?php
 include('server.php');
 $user = $_SESSION['Student_reg'];
 $q="SELECT name from users where Student_reg='$user'";
 mysqli_query($db,"SET CHARACTER SET utf8");
$results=mysqli_query($db, $q);
$row = mysqli_fetch_assoc($results);
$name= $row['name'];

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>برنامج تسجيل كليه زراعه سبابشا</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.right {
    float: right;
    width: 250px;
    border: 3px solid #94b8b8;
    padding: 250px;
    margin-right:150px;
    margin-top: 100px;
    height:700px;
    border-radius: 2em;
  }
  .left {
    float: left;
    width: 250px;
    border: 3px solid #94b8b8;
    padding: 130px;
    margin-left: 150px;
     margin-top: 100px;
      height:700px;
      padding:250px;
       border-radius: 2em;
  }
  .rightbtt{
     float: center;
      background-color: #73AD21;
    color: white;
    padding: 15px 50px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    border-radius:12px;
    margin-right: 300px;
     margin-top: 450px;
      margin-bottom:300px;
    position: absolute;

  }

  .leftbtt{
  	float:center;
    background-color: red;
    color: white;
    padding: 15px 50px;
    text-align:center;
    text-decoration: none;
    font-size: 16px;
    border-radius:12px;
   margin-bottom:300px;
   margin-top: 450px;
 position: absolute;


  }


   .butt{
  	float:center;
    background-color:#73AD21;
    color: white;
    padding: 15px 50px;
    text-align:center;
    text-decoration: none;
    font-size: 16px;
    border-radius:12px;
   margin-bottom:150px;
   margin-top: 50px;
   margin-right:90px;
   margin-left: 100px;


  }
  .input{
    text-align:center;
    text-decoration: none;
    font-size: 16px;
   margin-bottom:-70px;
   margin-bottom: 100px;
   margin-top: -200px;
  }
   .navbar {
      margin-bottom:0;
      border-radius: 0;
       background-color:#94b8b8 ;
       border-color:  #94b8b8;
    }
    footer {
      height:30px;
      width:100%;
      position:fixed;
      bottom:0px;
      background-color: #94b8b8;
      padding: 25px;
    }
    /* The container */
.container {
  float: right;
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 70%;
    margin-top: 30%;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    text-align: right;
}

/* Hide the browser's default checkbox */
.container input {
  float: right;
    position: absolute;
    opacity: 0;
}

/* Create a custom checkbox */
.checkmark {
  float: right;
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    margin-left:490%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  float: right;
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  float: right;
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  float: right;
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  float: right;
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  float: right;
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
p {
    width: 140px;
   solid #000000;
}

p.a {
    word-break:normal;
}
.trad{

      border-style:groove;
      border-width: thin;
      box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
      padding: 10px;
      float:center;
      margin-left: 30%;
      margin-right: 25%;

    }

    .tt {
    border: 2px solid ;
    border-radius: 5px;
    margin-right:20%;
    margin-left: 20%; 
    border-style: double;
    text-align: right;
    padding: 1%;
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
        <li><a style="color: black; margin-top: 4px;" href="main.php">الصفحة الرئسية</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a  style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
        </ul>
    </div>
  </div>
</nav>
<br> <br>
<div  class="trad " style="float:center;text-align:center;">
  <label style="font-size: 250%;">تسجيل التخصص</label>
  <br>
 <label style="font-size: 200%; "> <?php
  echo $year;
?>:لعام </label>
<br>
  <label style="font-size: 200%;">الترم: <?php if ($month >=1 && $month <=5 ) {
   echo 'الثانى';
 }
 elseif ($month >= 6 && $month <= 8) {
  echo 'سمر';
 }
 else{
  echo 'الاول';
 }
  ?> </label>
</div>
<br> <br>
<div class="tt" >
<label style="height:5%; width:100%;font-size:20px;color:black;">  <strong>الاسم: </strong> <?php echo $name;?>
</label>
<label style="height:5%; width:100%;font-size:20px;color:black;">
  <strong>الرقم الجامعي: </strong><?php echo "$user";?>
</label>
<label style="height:5%; width:100%;font-size:20px;color:black;"><span style="color:#FF8C00;">ملحوظة:</span> يرجى اختيار التخصص بالأولوية بحيث إختيار التخصص الأول ثم إضافة ثم إختيار الثانى وإضافة..إلخ. والتأكد قبل الحفظ من الترتيب </label>
</div>

<center>
<div align="center">
<div class="right">
	<div class="input">
	<form action="/action_page.php" id="myList2" method="post">
	<div class="di">
    <label class="container"> <p class="a">شعبة إنتاج وتكنولوجيا القطن</p>
  <input type="checkbox"  value="one" class="check">
   <span class="checkmark"></span>
</label>
</div>
<div class="di">
<label class="container"><p class="a">شعبة الاستزراع السمكى والأحياء المائية</p>
  <input type="checkbox"  value="two" class="check">
  <span class="checkmark"></span>
</label>
</div>
<div class="di">
<label class="container"><p class="a">شعبة استصلاح واستزراع الأراضى الصحراوية</p>
  <input type="checkbox"  value="three" class="check">
  <span class="checkmark"></span>
</label>
</div>
<div class="di">
<label class="container"><p class="a">شعبة التخطيط والتنمية الريفية</p>
  <input type="checkbox"  value="four" class="check">
  <span class="checkmark"></span>
</label>
</div>
<div class="di">
<label class="container"><p class="a">شعبة التكنولوجيا الحيوية الزراعية</p>
  <input type="checkbox"  value="five" class="check">
  <span class="checkmark"></span>
</label>
</div>
<div class="di">
<label class="container"><p class="a">شعبة الإنتاج النباتى</p>
  <input type="checkbox"  value="six" class="check">
  <span class="checkmark"></span>
</label>
</div>
<div class="di">
<label class="container"><p class="a">شعبة إنتاج وتكنولوجيا النباتات الطبية والعطرية</p>
  <input type="checkbox" value="seven" class="check">
  <span class="checkmark"></span>
</label>
</div>

 </form>
	</div>
  <br>
   <button class="rightbtt" type="button" onclick="myFunction()">إضافه</button>

</div>
<div class="left">
	<div class="input">
  <form action="/action_page.php" >
  <div id="myList1">

  </div>

</form>
</div>
  <button class="leftbtt" type="button" onclick="myFunctionn()">اعادة التسجيل </button>
</div>
<button class="butt" type="button" onclick="msg()">حفظ التسجيل</button>
</div>
<footer class="container-fluid text-center">
  <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small>
</footer>
<script type="text/javascript">

  function msg() {
    alert("تم الحفظ");
}
function myFunctionn() {
    location.reload();
}
/*function myFunction1() {
      var x=document.getElementById('myList2');
      var inputElements = document.getElementsByClassName('check');
	  var dd = document.getElementsByClassName('di');
      var s=inputElements.length;
      for(var i=0; i<=s; ++i){
		  if(inputElements[i].checked){
			  var node=dd[i];
			 // var ll=document.getElementsByClassName('con');
              x.appendChild(node);
			 // x.appendChild(ll[i]);
            }
        }

    }*/

function myFunction() {

      var x=document.getElementById('myList1');
      var inputElements = document.getElementsByClassName('check');
	  var dd = document.getElementsByClassName('di');
	  var s=inputElements.length;
      for(var i=0; i<=s; ++i){
          if(inputElements[i].checked){
              var node=dd[i];
			  //var ll=document.getElementsByClassName('con');
              x.appendChild(node);
			  //x.appendChild(ll[i]);
              i=-1;
              s--;
            }
        }
    }
</script>
</body>
</html>
