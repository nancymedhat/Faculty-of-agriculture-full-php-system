<?php
include('server.php');
$user = $_SESSION['Student_reg'];
 $s="SELECT name From proff where userno = '$user'";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result22 = mysqli_query($db,$s);
	$row15 = mysqli_fetch_assoc($result22);
	$name= $row15['name'];
if (isset($_POST['save'])) {
	$myvalue=$_POST['subjuct'];
	 $query = "SELECT id FROM course WHERE name = '$myvalue' ";
         mysqli_query($db,"SET CHARACTER SET utf8");
         $result = mysqli_query($db,$query);
         $row = mysqli_fetch_row($result);
          $m=$row[0];
	$q="SELECT count(total) as c from studentgrads where total>=90";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result = mysqli_query($db,$q);
	if ($result) {
		 while($row=mysqli_fetch_assoc($result))
	{
		$a=$row['c'];
		 echo $a;
	}       
	}else{
		echo "noo";
	}

	$q1="SELECT count(total) as c from studentgrads where cid ='$m' AND total<90 AND total>=85";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result1 = mysqli_query($db,$q1);
	if ($result1) {
		 while($row=mysqli_fetch_assoc($result1))
	{
		$am=$row['c'];
		 echo $am;
	} 
	}   

	$q2="SELECT count(total) as c from studentgrads where cid ='$m' AND total<85 AND total>=80";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result2 = mysqli_query($db,$q2);
	if ($result2) {
		 while($row=mysqli_fetch_assoc($result2))
	{
		$bp=$row['c'];
		 echo $bp;
	} 
	}    

	$q3="SELECT count(total) as c from studentgrads where cid ='$m' AND total<80 AND total>=75";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result3 = mysqli_query($db,$q3);
	if ($result3) {
		 while($row=mysqli_fetch_assoc($result3))
	{
		$b=$row['c'];
		 echo $b;
	} 
	} 

	$q4="SELECT count(total) as c from studentgrads where cid ='$m' AND total<75 AND total>=70";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result4 = mysqli_query($db,$q4);
	if ($result4) {
		 while($row=mysqli_fetch_assoc($result4))
	{
		$bm=$row['c'];
		 echo $bm;
	} 
	}  

	$q5="SELECT count(total) as c from studentgrads where cid ='$m' AND total<70 AND total>=65";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result5 = mysqli_query($db,$q5);
	if ($result5) {
		 while($row=mysqli_fetch_assoc($result5))
	{
		$cp=$row['c'];
		 echo $cp;
	} 
	}   

	$q6="SELECT count(total) as c from studentgrads where cid ='$m' AND total<65 AND total>=60";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result6 = mysqli_query($db,$q6);
	if ($result6) {
		 while($row=mysqli_fetch_assoc($result6))
	{
		$c=$row['c'];
		 echo $c;
	} 
	}     

	$q7="SELECT count(total) as c from studentgrads where cid ='$m' AND total<60 AND total>=55";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result7 = mysqli_query($db,$q7);
	if ($result7) {
		 while($row=mysqli_fetch_assoc($result7))
	{
		$cm=$row['c'];
		 echo $cm;
	} 
	}   

	$q8="SELECT count(total) as c from studentgrads where cid ='$m' AND total<55 AND total>=53";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result8 = mysqli_query($db,$q8);
	if ($result8) {
		 while($row=mysqli_fetch_assoc($result8))
	{
		$dp=$row['c'];
		 echo $dp;
	} 
	}   

	$q9="SELECT count(total) as c from studentgrads where cid ='$m' AND total<53 AND total>=50";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result9 = mysqli_query($db,$q9);
	if ($result9) {
		 while($row=mysqli_fetch_assoc($result9))
	{
		$d=$row['c'];
		 echo $d;
	} 
	}     

	$q10="SELECT count(total) as c from studentgrads where cid ='$m' AND total<50";
	mysqli_query($db,"SET CHARACTER SET utf8");
	$result10 = mysqli_query($db,$q10);
	if ($result10) {
		 while($row=mysqli_fetch_assoc($result10))
	{
		$f=$row['c'];
		 echo $f;
	} 
	}                           
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
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
    .trad{

      border-style:groove;
      border-width: thin;
      box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
      padding: 10px;
      float:center;
      margin-left: 30%;
      margin-right: 25%;

    }
    .button {
    position: relative;
    background-color: #94b8b8;
    border: none;
    font-size: 20px;
    color: #FFFFFF;
    padding: 10px;
    width: 100px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
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
        <li><a style="color: black; margin-top: 4px;" href="mainprof.php">الصفحة الرئسية</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a  style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
        </ul>
    </div>
  </div>
</nav>

<br> <br>
<div  class="trad " style="float:center;text-align:center;">
  <label style="font-size: 250%;">احصائيه تقديرات المقرر</label>
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
<div class="card">
   <form action="graph.php" method="post" style="margin:5%;">
     <center>
      <label style="font-size:35px;margin-right:2%;"> الماده</label> <br>
      <select style="width:300px;height:30px;font-size:18px; " name="subjuct">
         <option selected > اختر الماده</option>
         <?php
            $myvalue=$_POST['subjuct'];

            $sql3="SELECT * FROM course c, $tableName t
             where c.Course_code=t.Course_code and t.drs_names='$name'";
                       mysqli_query($db,"SET CHARACTER SET utf8");
                       $result1 = mysqli_query($db,$sql3);
               foreach ($result1 as $key => $value) {
              ?>
         <option><?php echo $value['name'] ; ?></option>
         <?php } ?>
      </select>
    </center> <br>
    <?php
        
         ?>
          <center>
      <button class="button save" type="submit" name="save"><span> عرض </span></button>
      <br>
         <lable style="font-size:28px;"><?php echo $myvalue ?> </lable>
          </center>
  <br> <br>

<canvas id="myChart" width="300" height="70"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["A", "A-", "B+", "B", "B-", "C+" , "C", "C-", "D+", "D", "F"],
        datasets: [{
            label: 'تقديرات',
            data: [<?php echo $a;?>, <?php echo $am;?>, <?php echo $bp;?>, <?php echo $b;?>, <?php echo $bm;?>,<?php echo $cp;?> ,<?php echo $c;?>,<?php echo $cm;?>,<?php echo $dp;?>,<?php echo $d;?>,<?php echo $f;?>  ],
            borderColor: [
                'rgba(20, 157, 144,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
</form>
   </select>
</div>
<footer class="container-fluid text-center">
  <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small>
</footer>

</body>
</html>