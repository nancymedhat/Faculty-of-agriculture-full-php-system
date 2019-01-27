<?php
include('server.php');
$user = $_SESSION['Student_reg'];
$query2="SELECT id from users WHERE Student_reg='$user'";
mysqli_query($db,"SET CHARACTER SET utf8");
$result2 = mysqli_query($db,$query2);
$row = mysqli_fetch_assoc($result2);

if (!isset($_SESSION['Student_reg'])) {
$_SESSION['msg'] = "You must log in first";
header('location: login.php');
}


$u="SELECT c.id ,c.Course_code , t.drs_names ,c.name ,c.hours from course c, $tableName t
where c.Course_code=t.Course_code ";
           mysqli_query($db,"SET CHARACTER SET utf8");
           $result = mysqli_query($db,$u);
        

if (isset($_POST['save'])) {
  if (!isset($_POST["mm"])) {
     echo "Select first";
  }else {
    //Remove the last save
     $query=" Select * from rcourse WHERE student_id= '".$row['id']."'";
    mysqli_query($db,"SET CHARACTER SET utf8");
    $results=mysqli_query($db, $query);
    if ($results) {
      $query3="delete from rcourse WHERE student_id= '".$row['id']."' ";
      mysqli_query($db,"SET CHARACTER SET utf8");
      $results=mysqli_query($db, $query3);
    }
  $checkbox1=$_POST["mm"];
  for ($i=0; $i <sizeof($checkbox1) ; $i++) {
   //Insert the new save
   $query1="INSERT INTO rcourse (courseid, student_id) VALUES ('".$checkbox1[$i]."', '".$row['id']."')";
    mysqli_query($db,"SET CHARACTER SET utf8");
    $results1=mysqli_query($db, $query1);
    if ($results1 ) {
      $value=1;
    }else {
      $value=0;
    }
  }
  if ($value==1) {
    $prompt_msg = "تم اضافه المواد";
     echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
     header('location: elsgl.php');
  }
  if ($value==0) {
    $prompt_msg = "حاول مره اخرى";
     echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
  }
  }

}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <title>تــسجيل المــواد</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<style>

footer {
    background-color: #94b8b8 ;
    color: white;
    padding: 10px;
    margin-top: 10%;
  }
  center{
    margin-top: 6%;

  }
  table {
  border: 5px solid #94b8b8;

  }
button{
  color: #94b8b8;
}


center{
  width: 98%;
  margin-left: 1%;
}

.collapsible{


   padding: 10px;
  margin-left: 15px;
  margin-right: 15px;
  background-color: #eeeeee;
}

</style>
</head>
  <body>
    <nav>
   <div class="nav-wrapper" style="background-color:#94b8b8">
     <a class="navbar-brand" href="#">
   <img src="alex-log.png"  style="width: 50%;margin-bottom:3%;margin-left:3%; padding:10 %;" >
</a>

     <ul class="right hide-on-med-and-down">


      <li><a href="index.php" style="text-decoration:none; color:black;"><i class="material-icons right">exit_to_app</i>تسجيل الخروج</a></li>
       <li><a href="main.php" style="text-decoration:none; color:black;">الصفحــه الرئيسيه </a></li>
     </ul>
   </div>
 </nav>
 <center>

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
             <form  method="post">
               <input type="checkbox" name="mm[]" id= <?php echo $value['id']; ?> value="<?php echo $value['id']; ?>" class="check"/>
                 <label for="<?php echo $value['id']; ?>" </label>
    </p>
  </td>
     <?php } ?>
   </tbody>
 </table>
 <button class="btn-large" type="submit" name="save"> حــفظ التســجيل
 <i class="material-icons right">send</i>
 </button>

</center>







      </form>
    <!-- <div>

        <ul class="collapsible" data-collapsible="accordion">
         <li>
           <div class="collapsible-header collapsible-right"> :المجموع </div>
           <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
         </li>
         <li>
     </div>-->




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
