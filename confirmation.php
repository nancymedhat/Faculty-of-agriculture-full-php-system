<?php
   include('server.php');
       ?>
<!DOCTYPE>
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
.trad{

      border-style:groove;
      border-width: thin;
      box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.75);
      padding: 10px;
      float:center;
      margin-left: 30%;
      margin-right: 25%;

    }
    #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin-left: 6%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color:#94b8b8;
    color: white;

}
.button {
    position: relative;
    background-color: #94b8b8;
    border: none;
    font-size: 22px;
    color: #FFFFFF;
    padding: 10px;
    width: 150px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}

.button:after {
    content: "";
    background: #90EE90;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px!important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.button:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
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
        <li><a style="color: black; margin-top: 4px;" href="mainAP.php">الصفحة الرئسية</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
        </ul>
    </div>
  </div>
</nav>
<br><br>
<div  class="trad " style="float:center;text-align:center;">
  <label style="font-size: 250%;">تــأكيد تقـديرات </label>
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
   <form action="confirmation.php" method="post" style="margin:5%;">
     <center>
      <label style="font-size:35px;margin-right:2%;"> الماده</label> <br>
      <select style="width:300px;height:30px;font-size:18px; " name="subjuct">
         <option selected > اختر الماده</option>
         <?php

          $myvalue=$_POST['subjuct'];
            $sql3="SELECT * FROM course c, $tableName t
             where c.Course_code=t.Course_code ";
                       mysqli_query($db,"SET CHARACTER SET utf8");
                       $result1 = mysqli_query($db,$sql3);
               foreach ($result1 as $key => $value) {
              ?>
         <option><?php echo $value['name'] ; ?></option>
         <?php } ?>
      </select>
    </center> <br>
      <?php

         $query = "SELECT id FROM course WHERE name = '$myvalue' ";
         mysqli_query($db,"SET CHARACTER SET utf8");
         $result = mysqli_query($db,$query);
         $row = mysqli_fetch_row($result);
          $m=$row[0];

         $sql45="SELECT DISTINCT mid,oral,final,total,reg
                  FROM grads WHERE cid='$m'";
         mysqli_query($db,"SET CHARACTER SET utf8");
         $result = mysqli_query($db,$sql45);


         ?>
         <center>
      <button class="button save" type="submit"><span> عرض </span></button>
    </center>
<br>
   <center>
       <lable style="font-size:28px;"><?php echo $myvalue ?> </lable>
     <div class="table-responsive">
       <table class="table table-bordered" id="customers" >
         <thead>
           <tr>

             <th >Grade </th>
             <th >Total </th>
             <th >Final </th>
             <th >Oral </th>
             <th >midterm </th>
             <th  >الرقم الجامعي</th>



           </tr>
         </thead>
         <?php foreach ($result as $key => $value) {
           ?>
         <tbody>
           <tr>


             <?php
                if($value['total'] >= 90 && $value['total'] <= 100)
                        {$a="A";}
                elseif($value['total'] >= 85 && $value['total'] <= 90)
                        {$a="A-";}
                elseif($value['total'] >= 80 && $value['total'] <= 85)
                        {$a="B+";}
                elseif($value['total'] >= 70 && $value['total'] <= 80)
                          {$a="B";}
                elseif($value['total'] >= 70 && $value['total'] <= 75)
                          {$a="B-";}
                elseif($value['total'] >= 65 && $value['total'] <= 70)
                          {$a="c+";}
                elseif($value['total'] >= 60 && $value['total'] <= 65)
                          {$a="c";}
                elseif($value['total'] >= 56 && $value['total'] <= 60)
                          {$a="c-";}
                elseif($value['total'] >= 53 && $value['total'] <= 56)
                          {$a="D+";}
               elseif($value['total'] >= 50 && $value['total'] <= 53)
                          {$a="D";}
                    else {$a="F"; }?>

           <form action="confirmation.php" method="post">

           <td>  <?php echo $a ; ?></td>
           <td><input name="total[]" value="<?php echo $value['total']; ?>"></td>
           <td><?php echo $value['final']; ?></td>
           <td><?php echo $value['oral']; ?></td>
           <td><?php echo $value['mid']; ?></td>
           <td><input type="text" name="reg[]" value="<?php echo $value['reg']; ?>"></td>
           <input type="hidden" name="cid[]" value= "<?php echo $m ; ?>">


     </tr>
           <?php } ?>
         </tbody>
       </table>
       <button class="button" type="submit" name="Save">confirm</button>
          <button class="button" type="button"  onclick="window.location.href='sheet.php'">show</button>

</form>
<?php


if(isset($_POST['Save'])){
$db = mysqli_connect('localhost', 'root', '', 'registration1');
for($i=0;$i<count($_POST['cid']);$i++){
$up = "update studentgrads set total = '".$_POST['total'][$i]."'  where reg = '".$_POST['reg'][$i]."' and cid= '".$_POST['cid'][$i]."' ";
mysqli_query($db,"SET CHARACTER SET utf8");
$result = mysqli_multi_query($db,$up);

}




$INS="INSERT INTO studentgrads (cid,reg,total)
VALUES  ";
for($i = 0 ; $i < count($_POST['cid']) ; $i++){


            $idd = $_POST['cid'][$i];
            $reg = $_POST['reg'][$i];
            $total = $_POST['total'][$i];



            $INS .= "( " .$idd. "," .$reg. ", " .$total. "),";
        }
        $INS = rtrim($INS, ',');

mysqli_query($db,"SET CHARACTER SET utf8");
$result = mysqli_multi_query($db,$INS);

 }
?>
</center>


<footer class="container-fluid text-center">
<small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim 
</small>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>
