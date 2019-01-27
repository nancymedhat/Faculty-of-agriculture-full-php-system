<?php
   include('server.php');

   $sql3="SELECT * FROM course ";
              mysqli_query($db,"SET CHARACTER SET utf8");
              $result = mysqli_query($db,$sql3);

   if (isset($_POST['save'])) {
   $subjectF = $_POST["subject"];
   $hours="SELECT hours FROM course WHERE name='$subjectF'    ";
   mysqli_query($db,"SET CHARACTER SET utf8");
   $result = mysqli_query($db,$hours);
   $placeF = $_POST["place"];
   $checkbox1=$_POST["dd"];
   $checkbox2=$_POST["tt"];
   for ($i=0; $i <sizeof($checkbox1) ; $i++){
     for ($j=0; $j <sizeof($checkbox2) ; $j++){
       $sql = "INSERT INTO reg (subject, place,day,timee )
               VALUES ('$subjectF', '$placeF', '$checkbox1[$i]','$checkbox2[$j]')";
               mysqli_query($db,"SET CHARACTER SET utf8");
               $results1=mysqli_query($db, $sql);
               if ($results1 ) {
                 $value=1;
               }else {
                 $value=0;
               }
             $dus="SELECT place FROM reg WHERE (place='$placeF' AND day='$checkbox1[$i]'AND timee='$checkbox2[$j]')";
             $rs=mysqli_query($db,$dus);
             if ($rs){ $numrows =mysqli_num_rows($rs); }
               $row = mysqli_fetch_assoc($rs);
              if ($row >0) {
             //callfunction

        "myFunction()";

             }

     }
   }

   }
   /*$dupesql = "SELECT place FROM reg WHERE (place = '$placeF' AND  (fromm <= '$frommF' OR too <='$tooF' OR fromm >= '$frommF') AND(fromm >= '$frommF' OR too >='$tooF' ) AND (fromm >= '$frommF' OR too <='$tooF' ) AND (fromm <= '$frommF' OR too >='$tooF') )";
   $result= mysqli_query($db,$dupesql);
   if ($result){ $numrows =mysqli_num_rows($result); }
     $row = mysqli_fetch_assoc($result);
    if ($row >0) {
      $prompt_msg = "غير مسموح يوجد ماده فى نفس المعاد و المكان";
       echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
   }
   else {*/
   /*$sql = "INSERT INTO reg (subject, place,day,timee )
           VALUES ('$subjectF', '$placeF', '$frommF',$tooF)";
           mysqli_query($db,"SET CHARACTER SET utf8");

   if (mysqli_query($db, $sql)) {
   $prompt_msg = " تم اضافه الماده فى المعاد و المكان";
    echo("<script type='text/javascript'> alert('".$prompt_msg."'); </script>");
   }
   else  {
      mysqli_close($db);
   }
   }

   }*/


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
         .table1 {
         width: 40%;
         border-style:groove;
         border-width: thin;
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
      <div class="container-fluid text-center">
      <div class="row content">
      <div class="col-sm-10 text-right" >
         <h1>تسـجــيل الجــدول </h1>
         <hr style=" border-width: 5px; ">
         <center>
            <form action="register2.php" method="post" style="margin:5%;">
               <label style="font-size:22px;">:الماده</label> <br>
               <select  style="width:200px;height:30px;font-size:18px;" name="subject">
                  <option selected> اختر الماده</option>
                  <?php
                     $sql3="SELECT * FROM course c, $tableName t
                     where c.Course_code=t.Course_code  ";
                                mysqli_query($db,"SET CHARACTER SET utf8");
                                $result = mysqli_query($db,$sql3);
                        foreach ($result as $key => $value) {
                       ?>
                  <option><?php echo $value['name'] ; ?></option>
                  <?php } ?>
               </select>
               <br><br>
               <label style="font-size:22px;">:المكان</label> <br>
               <select  style="width:200px;height:30px;font-size:18px;" name="place">
                  <option selected>اختر مكان</option>
                  <option>مدرج 1</option>
                  <option>مدرج 2</option>
                  <option>مدرج 3</option>
                  <option>مدرج 4</option>
                  <option>معمل أ</option>
                  <option>معمل ب</option>
                  <option>معمل ج</option>
                  <option>معمل د </option>
               </select>
               <br><br>
            <form  method="post">
               <table class="table1 table-bordered">
                  <thead>
                     <tr>
                        <th  class="text1">الساعه</th>
                        <th  class="text2">اليوم</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <div id="myR">
                              <input type="radio" name="tt[]" value="8:10"> 8:10
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="10:12"> 10:12
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="12:2"> 12:2
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="2:4">  2:4
                           </div>
                        </td>
                        <td>
                           <div >
                              السبت   <input type="radio" name="dd[]" value="السبت">
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div >
                              <input type="radio" name="tt[]" value="8:10"> 8:10
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="10:12"> 10:12
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="12:2"> 12:2
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="2:4">  2:4
                           </div>
                        </td>
                        <td>
                           <div >
                              الأحــد  <input type="radio" name="dd[]" value="الأحد">
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div >
                              <input type="radio" name="tt[]" value="8:10"> 8:10
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="10:12"> 10:12
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="12:2"> 12:2
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="2:4">  2:4
                           </div>
                        </td>
                        <td>
                           <div >
                              الأثنيــن   <input type="radio" name="dd[]" value="الأثنين">
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <div >
                              <input type="radio" name="tt[]" value="8:10"> 8:10
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="10:12"> 10:12
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="12:2"> 12:2
                           </div>
                           <div>
                              <input type="radio" name="tt[]" value="2:4">  2:4
                           </div>
                        </td>
                        <td>
                           <div >
                              الثـلاثـاء  <input type="radio" name="dd[]" value="الثـلاثـاء">
                              </div
                        </td>
                     </tr>
                     <tr>
                     <td>
                     <div >
                     <input type="radio" name="tt[]" value="8:10"> 8:10
                     </div>
                     <div>
                     <input type="radio" name="tt[]" value="10:12"> 10:12
                     </div>
                     <div>
                     <input type="radio" name="tt[]" value="12:2"> 12:2
                     </div>
                     <div>
                     <input type="radio" name="tt[]" value="2:4">  2:4
                     </div>
                     </td>
                     <td><div>
                     الأربعــاء   <input type="radio" name="dd[]" value="الأربعــاء">
                     </div></td>
                     </tr>
                     <tr>
                     <td>
                     <div >
                     <input type="radio" name="tt[]" value="8:10"> 8:10
                     </div>
                     <div>
                     <input type="radio" name="tt[]" value="10:12"> 10:12
                     </div>
                     <div>
                     <input type="radio" name="tt[]" value="12:2"> 12:2
                     </div>
                     <div>
                     <input type="radio" name="tt[]" value="2:4">  2:4
                     </div>
                     </td>
                     <td><div >
                     الخميــس  <input type="radio" name="dd[]" value="الخميــس">
                     </div </td>
                     </tr>
                  </tbody>
               </table>
               <br>
               <br>
               <button  type="button"class="btn btn-info"  style="font-size:22px;width:100px;" onclick="window.location.href='elgadwal.php'"> الجدول</button>
               <button type="submit" class="btn btn-info" name="save" style="font-size:22px;width:100px;">حفظ</button>
            </form>
         </center>
         <hr>
         </div>
         <div class="col-sm-2 sidenav" style="height:150%;">
         <div class="well">
         <p>رؤية الكلية  <br>
         <hr>
         أن تكون كلية الزراعة سابا باشا مؤسسة تعليمية بحثية فعالة قادرة علي تحقيق أهدافها
         </p>
         </div>
         <div class="well">
         <p>
         أهداف الكلية <br>
         <hr>
         رفع كفاءة وقدرة خريج الكلية بما يناسب سوق العمل ويزيد الطلب علي خريجي الكلية  <br>
         و  أن تكون برامج ومخرجات الكلية متميزه بالتناغم مع المجتمع والنمو والأرتقاء.   <br>
         </p>
         </div>
         </div>
         <br>
         <br>
         <br>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <footer class="container-fluid text-center">
         <p> <small>&copy; Copyright 2017 &nbsp; &nbsp; &nbsp; Mange By:Bardees, Heba, Nancy, Tasnim </small></p>
      </footer>
      <script>
         /*function toggleTable()
            {
                 var elem=document.getElementById("loginTable");
                 var hide = elem.style.display =="none";
                 if (hide) {
                     elem.style.display="table";
                }
                else {
                   elem.style.display="none";
                }
            }*/
            function myFunction()
               {
                    var elem=document.getElementById("myR");
                    var hide = elem.style.display =="none";
                    if (hide) {
                        elem.style.display="table";
                   }
                   else {
                      elem.style.display="none";
                   }
               }
           /*    function toggleTable2()
                  {
                       var elem=document.getElementById("loginTable2");
                       var hide = elem.style.display =="none";
                       if (hide) {
                           elem.style.display="table";
                      }
                      else {
                         elem.style.display="none";
                      }
                  }
      </script>
   </body>
</html>
