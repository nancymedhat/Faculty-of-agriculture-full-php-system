<?php
   include('server.php');
    $user = $_SESSION['Student_reg'];
    $s="SELECT name From proff where userno = '$user'";
              mysqli_query($db,"SET CHARACTER SET utf8");
              $result22 = mysqli_query($db,$s);
              $row15 = mysqli_fetch_assoc($result22);
              $name= $row15['name'];
    
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



    }
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
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
    text-align: left;
    background-color: #94b8b8;
    color: white;
}
.button {
    position: relative;
    background-color: #94b8b8;
    border: none;
    font-size: 28px;
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
        <li><a style="color: black; margin-top: 4px;" href="mainprof.php">الصفحة الرئسية</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
        </ul>
    </div>
  </div>
</nav>
<br> <br>
<div  class="trad " style="float:center;text-align:center;">
  <label style="font-size: 250%;">إضــافة تــقديرات المقــررات</label>
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
<br>
<div class="card">
   <form action="tsgeleldrgat.php" method="post" style="margin:5%;">
     <center>
      <label style="font-size:35px;margin-right:2%;"> الماده</label> <br>
      <select style="width:300px;height:30px;font-size:18px; " name="subjuct">
         <option selected > اختر الماده</option>
         <?php
            $myvalue=$_POST['subjuct'];
            $mid=$_POST['mid'];
            $oral=$_POST['oral'];
            $final=$_POST['final'];
            $total=$_POST['total'];


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
         $query = "SELECT id FROM course WHERE name = '$myvalue' ";
         mysqli_query($db,"SET CHARACTER SET utf8");
         $result = mysqli_query($db,$query);
         $row = mysqli_fetch_row($result);
          $m=$row[0];

         $sql35="SELECT A.name , A.Student_reg  from users A, rcourse r
         where   A.id=r.student_id and r.courseid= '$m' ";
         mysqli_query($db,"SET CHARACTER SET utf8");
         $result = mysqli_query($db,$sql35);

         ?>
         <center>
      <button class="button save" type="submit"><span> عرض </span></button>
    </center>
   </form>
   </select>
</div>
<center>
  <lable style="font-size:28px;"><?php echo $myvalue ?> </lable>
  <br> <br>
   <div class="table-responsive">
   <table id="customers">
      <thead>
         <tr>

            <th >total </th>
            <th >final </th>
            <th >oral </th>
            <th >midterm </th>
            <th >اسم الطالب  </th>
            <th > الرقم الجامعي  </th>

         </tr>
      </thead>
      </center>

      <?php foreach ($result as $key => $value) {

         ?>

      <tbody>
         <tr>
              <form action="tsgeleldrgat.php" method="post">

            <td class= "sum"> <input name="total[]" ></td>
            <td> <input  name="final[]"   ></td>
            <td><input  name="oral[]"  ></td>
            <td><input  name="mid[]"  ></td>
            <td><?php echo $value['name']; ?></td>
            <td><input  name="reg[]" value= "<?php echo $value['Student_reg']; ?>" ></td>
            <input type="hidden" name="cid[]" value= "<?php echo $m ; ?>">
         </tr>


         <?php }?>
      </tbody>
   </table>
   <center>
  <button class="button" type="submit" name="save" style="margin-left:2%;margin-top:10%;width:200px;"><span>حفظ </span></button>
  <br> <br> <br> <br>
</center>
 </form>
   <?php

   $regg = "SELECT reg FROM grads WHERE cid = '$m' ";
   mysqli_query($db,"SET CHARACTER SET utf8");
   $resultt = mysqli_query($db,$regg);
   $roow = mysqli_fetch_row($resultt);
    $R=$roow[0];



   if(isset($_POST['save'])){

            $db = mysqli_connect('localhost', 'root', '', 'registration1');

            for($i=0;$i<count($_POST['cid'])&& $i<count($_POST['reg']);$i++){
    $up = "update grads set mid = '".$_POST['mid'][$i]."',oral = '".$_POST['oral'][$i]."',final = '".$_POST['final'][$i]."',total = '".$_POST['total'][$i]."'  where reg = '".$_POST['reg'][$i]."' and cid= '".$_POST['cid'][$i]."' ";
    mysqli_query($db,"SET CHARACTER SET utf8");
     $result = mysqli_multi_query($db,$up);

}


               $sql="INSERT INTO grads (mid,oral,final,total,reg,cid)
               VALUES  ";
               for($i = 0 ; $i < count($_POST['mid']) ; $i++){


                           $mid = $_POST['mid'][$i];
                           $oral = $_POST['oral'][$i];
                           $final = $_POST['final'][$i];
                           $total = $_POST['total'][$i];
                           $reg = $_POST['reg'][$i];
                           $idd = $_POST['cid'][$i];

                           $sql .= "(   " .$mid. " , " .$oral. " , " .$final. " , " .$total. "," .$reg. "," .$idd. "),";
                       }
                       $sql = rtrim($sql, ','); // omit the last comm
             mysqli_query($db,"SET CHARACTER SET utf8");
              $result = mysqli_multi_query($db,$sql);

              $q="DELETE a from grads a, grads b where a.cid=b.cid and a.reg=b.reg and a.id>b.id ";
              mysqli_query($db,"SET CHARACTER SET utf8");
              $result2 = mysqli_multi_query($db,$q);
              if ($result2) {
                echo "yees";
              }else{
                echo "noo";
                echo mysqli_error($db);
              }

            if ($result) {
                echo "yee";
               
              }
              else{
                echo mysqli_error($db);
              }

       }




?>


    <footer class="container-fluid text-center">
  <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small>
</footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  </body>
</html>
