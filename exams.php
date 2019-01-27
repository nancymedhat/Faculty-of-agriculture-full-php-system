<?php
include('server.php');
$yea = $now->format('Y');
if (!isset($_SESSION['Student_reg'])) {
$_SESSION['msg'] = "You must log in first";
header('location: login.php');
}
   $sql36="SELECT * FROM course c, $tableName t
          where c.Course_code=t.Course_code  ";
                   mysqli_query($db,"SET CHARACTER SET utf8");
                    $result1 = mysqli_query($db,$sql36);


         if(isset($_POST['save'])){
            $db = mysqli_connect('localhost', 'root', '', 'registration1');


               $sql="INSERT INTO exams (cid,day,month,year)
               VALUES  ";
               for($i = 0 ; $i < count($_POST['cid']) ; $i++){

                         $idd = $_POST['cid'][$i];
                         $day=$_POST['day'][$i];
                         $month=$_POST['month'][$i];
                         $year=$_POST['year'][$i];


                        // echo $date;

                           $sql .= "(   ".$idd. ",".$day. ",".$month. ",".$year. "),";
                       }
                       $sql = rtrim($sql, ','); // omit the last comm
             mysqli_query($db,"SET CHARACTER SET utf8");
              $result = mysqli_multi_query($db,$sql);
              if ($result) {
                //echo "yes";

              }else{
                echo "noo";
                 echo mysqli_error($db);
              }


  }





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
       background-color: #94b8b8;
       border-color: #94b8b8;

    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      height:30px;
      width:100%;
      position:fixed;
      bottom:0px;
      background-color: #94b8b8;
      padding: 25px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
    center{
      width: 95%;
      margin-left: 2%;
      margin-top: 5%;
      border: 5px;
    }
  h3{

    margin-bottom: 2%;
  }
  #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  
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
    font-size:30px; 


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
    background-color: #4CAF50;
    border: none;
    font-size: 28px;
    color: #FFFFFF;
    padding: 10px;
    width: 150px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
   margin-bottom:20%; 

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
#ex2 {
    border: 1px solid;
    padding: 10px;
    box-shadow: 5px 10px #888888;
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
        <img src="alex-log.png" style="width: 200px; height: 80px; padding:3%">
      </div>
      <div class="collapse navbar-collapse" id="myNavbar" style="margin-top: 20px;font-size: 21px;">
        <ul class="nav navbar-nav navbar-right" >
          <li><a style="color: black; margin-top: 4px;" href="adminpage.php">الصفحة الرئسية</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a style="color: black;" href="index.php" name="logout" ><span class="glyphicon glyphicon-log-in" style="color: black;"></span> تسجيل الخروج</a></li>
          </ul>
      </div>
    </div>
  </nav>
  <br> <br>
<div  class="trad " style="float:center;text-align:center;">
  <label style="font-size: 250%;">جدول الامتحانات</label>
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
  <div class="table-responsive">
    <table id="customers">
      <thead>
        <tr>
          <th >ميعاد الامتحان</th>
          <th >كود المادة </th>
          <th >اسم المادة </th>
        </tr>
      </thead>

      <?php foreach ($result1 as $key => $value) {
        ?>
      <tbody>
        <tr>
  <div class="form-group">
    <div class="form-inline">

          <form action="exams.php" method="post">
      <td>
         <div class="form-group pull-left" >
          <select name="day[]" id="day" onchange="" class="form-control" >
          <option value="--">اختر يوم</option>
           <option value="01">01</option>
           <option value="02">2</option>
           <option value="03">3</option>
           <option value="04">4</option>
           <option value="05">5</option>
           <option value="06">6</option>
           <option value="07">7</option>
           <option value="08">8</option>
           <option value="09">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option>
           <option value="14">14</option>
           <option value="15">15</option>
           <option value="16">16</option>
           <option value="17">17</option>
           <option value="18">18</option>
           <option value="19">19</option>
           <option value="20">20</option>
           <option value="21">21</option>
           <option value="22">22</option>
           <option value="23">23</option>
           <option value="24">24</option>
           <option value="25">25</option>
           <option value="26">26</option>
           <option value="27">27</option>
           <option value="26">26</option>
           <option value="27">27</option>
           <option value="28">28</option>
           <option value="29">29</option>
           <option value="30">30</option>
           <option value="31">31</option>
         </select>
       </div>
               <div class="form-group pull-left" >
                 <select name="month[]" id="month" onchange="" class="form-control" >
                  <option value="--" selected>الشهر</option>
                  <option value="01">يناير</option>
                  <option value="02">فبراير</option>
                  <option value="03">مارس</option>
                  <option value="04">أبريل</option>
                  <option value="05">مايو</option>
                  <option value="06">يونيو</option>
                  <option value="07">يوليو</option>
                  <option value="08">أغسطس</option>
                  <option value="09">سبتمبر</option>
                  <option value="10">أكتوبر</option>
                  <option value="11">نوفمبر</option>
                  <option value="12">ديسمبر</option>
           </select>
         </div>
     <div class="form-group pull-left">
     <input value="<?php echo $yea  ?>"  type="number"  name="year[]" id="year" class="form-control">
     </div>
  </div>
  </div></td>
        <td><?php echo $value['Course_code']; ?></td>
        <td><?php echo $value['name']; ?></td>
       <input type="hidden" name="cid[]" size="100" value= "<?php echo $value['id'] ; ?>">

  </tr>
        <?php } ?>
      </tbody>
    </table>

</center>
<center>
 <button class="button" type="submit" id="ex2"><span> حفظ الجدول </span></button>
</center>
</form>

        <footer class="container-fluid text-center">
          <p> <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small></p>
        </footer>



      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


    </body>
  </html>
