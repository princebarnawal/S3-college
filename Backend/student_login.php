<?php
session_start();
	if(isset($_POST['btw'])){
        $stu_id = $_POST['stu_id'];
		$name = $_POST['name'];
		$pwd = $_POST['pwd'];

		$con=mysqli_connect('localhost','root','','S3_College') or die('DB connection error');
		$select = "select * from t_insert_student_id where student_id = '$stu_id' ";
		$result = mysqli_query($con,$select) or die("Retrieval Error");
		
		if(mysqli_num_rows($result) == 0){
			echo "Student Id does not match";
		} else {
			$row = mysqli_fetch_assoc($result);
			$pass = $row['password'];

			if(($pwd == $pass)){
				
				setcookie('name',$name,time()+180);
				setcookie('pwd',$pwd,time()+180);
				
				echo 'Login Successful. ';

		}else{
			echo "Student_id or Password does not match";
		}
			}
		}
		
?>



