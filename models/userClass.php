<?php

require_once 'model.php';

class UserClass  extends Model
{
	/*
	* Constructor calls Base-Class constructor. 
	*/
	function __construct()
	{
		parent::__construct();
	}



	/*
	*UserIsValid function validates if user exits
	* @param email, password
	*/
	public function userIsvalid($email,$password)
	{
		$result=0;

		try{
			$stmt=$this->db->prepare("SELECT id FROM tbl_user WHERE email=:email AND password=:pass");
			$stmt->bindparam(':email',$email);
			$stmt->bindparam(':pass',$password);
			$stmt->execute();
		 	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->rowCount();
		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	 	
	 	if($result==0)
	 		return false;
	 	else
	 		return true;
	}



	/*
	*registerUser insert new user info into database
	* @param name,univId,email,phone,password
	*/
	public function registerUser($name,$email,$contact,$password,$address,$category=0,$isActive=1)
	{
		try{
			$stmt=$this->db->prepare("INSERT INTO tbl_user (id, name, email, password,address, userCatId, contact, isActive) 
									VALUES (NULL, :name,:email, :password,:address, $category, :contact, $isActive)");
			$stmt->bindparam(':name',$name);
			$stmt->bindparam(':email',$email);
			$stmt->bindparam(':password',$password);
			$stmt->bindparam(':contact',$contact);
			$stmt->bindparam(':address',$address);
			//$stmt->bindparam(':isActive',$isActive);
			$stmt->execute();

		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}


	public function getUsercategory($userId)
	{
		try{
			$stmt=$this->db->prepare("SELECT userCatId FROM tbl_user WHERE id=:userId");
			$stmt->bindparam(':userId',$userId);
			$stmt->execute();
		 	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetch();
		 	
		 	
		 	return (int)$result['userCatId'];

		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}

	public function getUserId($userEmail){
		//SELECT id from tbl_USER where email='adib@mail.com';
		try{
			$stmt=$this->db->prepare("SELECT id from tbl_USER where email=:email");
			$stmt->bindparam(':email',$userEmail);
			$stmt->execute();
		 	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetch();
		 	
		 	return (int)$result['id'];

		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}

	public function getUserDetail($id)
	{
		try{
			$stmt=$this->db->prepare("SELECT * from tbl_USER where id=:id");
			$stmt->bindparam(':id',$id);
			$stmt->execute();
		 	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetch();
		 	
		 	return $result;

		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}

	}

	public function updateUser($id, $name,$email,$address,$phone,$password){
		//UPDATE `tbl_user` SET `name` = 'Admi', `email` = 'bing@mail.co', `password` = '12', `contact` = '0987', `address` = 'm' WHERE `tbl_user`.`id` = 3;
		try{
			$stmt=$this->db->prepare("UPDATE `tbl_user` SET `name` = :name, `email` = :email, `password` = :password, `contact` = :phone, `address` = :address WHERE `tbl_user`.`id` = :id;");
			$stmt->bindparam(':name',$name);
			$stmt->bindparam(':email',$email);
			$stmt->bindparam(':password',$password);
			$stmt->bindparam(':phone',$phone);
			$stmt->bindparam(':address',$address);
			$stmt->bindparam(':id',$id);
			$stmt->execute();

		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}




}