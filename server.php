<?php
	session_start();
	//year and term
$now = new \DateTime('now');
   $month = $now->format('m');
   $year = $now->format('Y');
    if ($month >=1 && $month <=5 ) {
   $term= 'second';
 }
 elseif ($month >= 6 && $month <= 8) {
  $term= 'summer';
 }
 else{
  $term='first';
 }
  $tableName= $year.$term;


	// variable declaration
	$user = "";
	$email    = "";
	$errors = array();
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration1');

	// REGISTER USER
	/*if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$user = mysqli_real_escape_string($db, $_POST['user']);
		//$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password']);
		//$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($user)) { array_push($errors, "Username is required"); }
		//if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "Try agin");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (Student_reg, password)
					  VALUES('$username', '$password')";
			mysqli_query($db, $query);

			$_SESSION['Student_reg'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: main.php');
		}

	}*/
	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$user = mysqli_real_escape_string($db, $_POST['Student_reg']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($user)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}


		if (count($errors) == 0) {
			$password = sha1($password);
			$query = "SELECT * FROM users WHERE Student_reg='$user' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1 ) {
				$_SESSION['Student_reg'] = $user;
				$_SESSION['success'] = "You are now logged in";
				header('location: main.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
			$query1="SELECT * FROM admin WHERE id='$user' AND password='$password'";
			$results1 = mysqli_query($db, $query1);

			if (mysqli_num_rows($results1) == 1 ) {
				$_SESSION['Student_reg'] = $user;
				$_SESSION['success'] = "You are now logged in";
				header('location: mainAP.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
			$query2="SELECT * FROM proff WHERE userno='$user' AND password='$password'";
			$results2= mysqli_query($db, $query2);

			if (mysqli_num_rows($results2) == 1 ) {
				$_SESSION['Student_reg'] = $user;
				$_SESSION['success'] = "You are now logged in";
				header('location: mainprof.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
	if (isset($_POST['logout'])){
	  session_unset();
	  session_destroy();
	  header("Location: index.php");
	  exit;
	}






?>
