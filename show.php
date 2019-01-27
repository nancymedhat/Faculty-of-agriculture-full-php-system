<?php
 include('server.php');
$uid=$_POST['id'];

$query2="SELECT id from users WHERE Student_reg='$uid'";
mysqli_query($db,"SET CHARACTER SET utf8");
$result2 = mysqli_query($db,$query2);
$row = mysqli_fetch_assoc($result2);
$iid= $row['id'];

$sql3="SELECT c.id,c.Course_code , t.drs_names ,c.name ,c.hours from course c, rcourse r, $tableName t
where c.id=r.courseid and r.student_id= '$iid' and  c.Course_code=t.Course_code";
           mysqli_query($db,"SET CHARACTER SET utf8");
           $result = mysqli_query($db,$sql3);


if (isset($_POST['save'])) {

  if (isset($_POST["mm"])) {
    $checkbox1=$_POST["mm"];
  for ($i=0; $i <sizeof($checkbox1) ; $i++) {
   //Insert the new save
   $query1="DELETE FROM rcourse where courseid = '".$checkbox1[$i]."'";
    mysqli_query($db,"SET CHARACTER SET utf8");
    $results1=mysqli_query($db, $query1);
    if ($results1 ) {
      $value=1;
    }else {
      $value=0;
    }
  }
  if ($value==1) {
    $prompt_msg = "تم سحب المواد";
     echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
     header('location: deletecourse.php');
  }
  if ($value==0) {
    $prompt_msg = "حاول مره اخرى";
     echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
  }
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }



}
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
    #myDIV {
        display: none;
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
  <label style="font-size: 200%;">سحب ماده لطالب</label>
<br>

<?php
$query="SELECT name from users where Student_reg = '$uid' ";
mysqli_query($db,"SET CHARACTER SET utf8");
$result7 = mysqli_query($db,$query);
$row = mysqli_fetch_assoc($result7);
$name= $row['name'];
?>

<hr>
<strong><div style="float: right; width : 20%;">
<label style="font-size:130%;">الاسم: <?php
echo $name;
?></label>
<br>
<label style="font-size:130%;">الرقم الجامعي:
<?php
echo $uid;
?>
</label>
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
      <br>
</div>
</strong>

<center>
  <br><br><br><br>
<div class="table-responsive">
 <table class="table table-hover table-hover ">
   <thead>
     <tr>
              <th scope="col">عــدد الســاعات </th>
              <th scope="col">اســم المــاده </th>
              <th scope="col"> كــود المــاده</th>
              <th scope="col"> اسم الدكتور</th>
              <th scope="col">#</th>
     </tr>
   </thead>
   <?php
      foreach ($result as $key => $value) {
     ?>
   <tbody>
     <tr>
       <th role="row"><?php echo $value['hours'];?></th>
       <td><?php echo $value['name']; ?></td>
       <td><?php echo $value['Course_code']; ?></td>
       <td><?php echo $value['drs_names']; ?></td>
       <td>
           <p>
             <form  method="post" action="show.php">
               <input type="checkbox" name="mm[]"  class="check" value="<?php echo $value['id']; ?>"/>
                  <label for="<?php echo $value['id']; ?>" </label>
    </p>
  </td>
     <?php } ?>
   </tbody>
 </table>

 <div class="container">
   <button style="background-color: #94b8b8;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">حــذف</button>

   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
     <div class="modal-dialog">

       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">سحب مقــرر </h4>
         </div>
         <div class="modal-body">
           <p>هل تريد حذف المقرر؟؟<br>اضعظ حذف مرتين ثم تأكيد التسجيل </p>
         </div>
         <div class="modal-footer">
           <button type="button" name="del" class="btn btn-default" data-dismiss="modal" onclick="myFunction()">حذف</button>
         </div>
       </div>

     </div>
   </div>

 </div>
 <button style="background-color: #94b8b8;" type="submit" name="save" id="myDIV"> حــفظ التســجيل
 <i class="material-icons right">send</i>
 </button>
</form>
<br> <br>

</center>
</div>




</br> </br> <br> <br>
<footer class="container-fluid text-center">
<small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim
</small>
</footer>
