<?php 
	session_start();
	if(isset($_SESSION['id']))
    {
        header('Location:index.php');
    }
	include('includes/connect.php');
	if(isset($_POST['register-btn']))

	{

		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=md5(trim($_POST['password']));

		$query="INSERT INTO user(name,email,phone,password) VALUES ('$name', '$email','$phone','$password')";
		$query_run=mysqli_query($connect,$query);
		if($query_run)
		{
			header('Location:login.php');
		}
		else
		{
			header('Location:register.php');
		}

}
	// if(isset($_POST['login-btn']))
	// {
	// 	$email=$_POST['email'];
	// 	$password=md5($_POST['password']);
	// 	$query="SELECT id, name, email, phone, password FROM user WHERE emai='{$email}'AND password='{$password}'";
	// 	$query_run=mysqli_query($connect,$query);
	// 	// if(mysqli_num_rows($query_run)==1)
	// 	 if($query_run)
	// 	{
	// 		list($id,$name,$email,$phone,$password)=mysqli_fetch_array($query_run,MYSQLI_NUM);
	// 		$_SESSION['id']=$id;
	// 		$_SESSION['name']=$name;
	// 		$_SESSION['email']=$email;
	// 		$_SESSION['phone']=$phone;
	// 		$_SESSION['password']=$password;
	// 		header('Location:index.php');
	// 	}
	// 	else
	// 	{
	// 		$message="<p style='color:red, font-size:10px'>Tài Khoản Hoặc Mật Khẩu Không Đúng.</p>";
	// 		// header('Location:login.php');
	// 	}
	// }

if(isset($_POST['login-btn']))
 {
 	$errors=array();
 	if(empty($_POST['email']))
 	{
 		$errors[]='email';
 	}
 	else
 	{
 		$email=$_POST['email'];
 	}
 	if(empty($_POST['password']))
 	{
 		$errors[]='password';
 	}
 	else
 	{
 		$password=md5($_POST['password']);
 	}
 	if(empty($errors))
 	{
 		$query="SELECT id,name,email, phone,passwordFROM user WHERE email='{$email}' AND password='{$password}'";
 		$result=mysqli_query($connect,$query);
 		if($result)
 		{
 			list($id,$name,$password,$email)=mysqli_fetch_array($result,MYSQLI_NUM);
 			$_SESSION['id']=$id;
 			$_SESSION['name']=$name;
 			$_SESSION['email']=$email;
 			$_SESSION['phone']=$phone;
 			$_SESSION['password']=$password;
 			
 			header('Location:index.php');
 		}
 		else{
 			$message = "<p style='color:red, font-size:10px'>Tài Khoản Hoặc Mật Khẩu Không Đúng.</p>" ;
 		}
 	}

 }
 ?>