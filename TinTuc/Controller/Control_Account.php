<?php 
session_start();
include("Model/Model_Account.php");

class Control_Account{

	

	function RegisterAccount($name,$email,$pass){
		$m_user = new Model_Account();
		$user=$m_user->dangki($name,$email,$pass);
		if($user>0){
			$_SESSION['username']=$name;
			header('location:index.php');
			if(isset($_SESSION['error'])){
				unset($_SESSION['error']);
			}
		}else{
			$_SESSION['error']="Đăng Kí Không Thành Công";
			header('location:dangki.php');
		}

	}

	function Login($email,$pass){
		$m_user= new Model_Account();
		$_pass= md5(md5(md5(md5(md5(md5($pass))))));
		$user=$m_user->dangnhap($email,$_pass);
		if($user>0){
			$_SESSION['username']=$user->name;
			if(isset($_SESSION['error']))
			unset($_SESSION['error']);
			header('location:index.php');
		}else{
			$_SESSION['error']="Đăng Nhập Không Thành Công";
		}
	}

	function Logout(){
		session_destroy();
		header('location:index.php');
	}
}


?>