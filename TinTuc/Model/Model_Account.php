<?php

include ('database.php');
/**
*  
*/
class Model_Account extends database{
	
	function dangki($name, $email, $pass){
		$sql="INSERT INTO users(name,email,password) VALUES (?,?,?)";
		$this->setQuery($sql);
		$result = $this->execute(array($name,$email,md5(md5(md5(md5(md5(md5($pass)))))) ));
		if($result){
			return $this->getLastId();
		}
		else{
			return false;
		}

	}

	function dangnhap($email,$pass){
		
		$sql= sprintf("SELECT * FROM users WHERE email='%s' and password='%s'",mysql_real_escape_string($email),mysql_real_escape_string($pass));
		echo $sql;
		$this->setQuery($sql);
		return $this->loadRow(array($email,$pass));
	}

	

}


?>