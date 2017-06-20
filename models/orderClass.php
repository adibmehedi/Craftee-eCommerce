<?php

require_once 'model.php';

class OrderClass  extends Model
{
	/*
	* Constructor calls Base-Class constructor. 
	*/
	function __construct()
	{
		parent::__construct();
	}



	public function createNewOrder($userId,$address,$placementTime,$isCustom=0)
	{
		//INSERT INTO `tbl_order` (`id`, `userId`, `placementTime`, `address`, `isCustom`) VALUES (NULL, '', '', '', '');
		try{
			$stmt=$this->db->prepare("INSERT INTO `tbl_order` (`id`, `userId`, `placementTime`, `address`, `isCustom`) VALUES (NULL, :userId, :placementTime, :address, :isCustom);");
			$stmt->bindparam(':userId',$userId);
			$stmt->bindparam(':placementTime',$placementTime);
			$stmt->bindparam(':address',$address);
			$stmt->bindparam(':isCustom',$isCustom);
			$stmt->execute();

		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}

	public function getLastOrderID(){
		try{
			$stmt=$this->db->prepare("SELECT MAX(id) id FROM tbl_order");
			$stmt->execute();
		 	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetch();
		 	return (int)$result['id'];
		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}

	public function addProductToOrder($orderId,$productId,$price,$unit)
	{
		//INSERT INTO `tbl_orderedproduct` (`id`, `productId`, `price`, `unit`, `orderId`) VALUES (NULL, '', '', '', '');
		try{
			$stmt=$this->db->prepare("INSERT INTO `tbl_orderedproduct` (`id`, `productId`, `price`, `unit`, `orderId`) VALUES (NULL, :productId, :price, :unit, :orderId);");
			$stmt->bindparam(':productId',$productId);
			$stmt->bindparam(':price',$price);
			$stmt->bindparam(':unit',$unit);
			$stmt->bindparam(':orderId',$orderId);
			$stmt->execute();


		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
		
	}

	public function getUserOrders($userId)
	{
		try{
			$stmt=$this->db->prepare("SELECT * FROM tbl_order WHERE userId=:userId");
			$stmt->bindparam(':userId',$userId);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}

	public function getOrderedProducts($orderId)
	{
		//SELECT name, unit, tbl_product.price FROM tbl_orderedproduct,tbl_product WHERE tbl_orderedproduct.productId=tbl_product.id AND orderId=23
		try{
			$stmt=$this->db->prepare("SELECT name, unit, tbl_product.price FROM tbl_orderedproduct,tbl_product WHERE tbl_orderedproduct.productId=tbl_product.id AND orderId=:orderId");
			$stmt->bindparam(':orderId',$orderId);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}

	public function getAllOrder(){
		try{
			$stmt=$this->db->prepare("SELECT * FROM tbl_order");
			$stmt->bindparam(':userId',$userId);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}

	public function getNotDeliveredOrders(){
		try{
			$stmt=$this->db->prepare("SELECT * FROM tbl_order WHERE status=0");
			$stmt->bindparam(':userId',$userId);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}

	public function changeOrderStatus($orderId,$status){
		//UPDATE `craftee_db`.`tbl_order` SET `status` = '1' WHERE `tbl_order`.`id` = 23;

		try{
			$stmt=$this->db->prepare("UPDATE `tbl_order` SET `status` = :status WHERE `tbl_order`.`id` = :id;");
			$stmt->bindparam(':id',$orderId);
			$stmt->bindparam(':status',$status);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}


	public function gerOrderDetails($toTime,$fromTime)
	{
		//SELECT tbl_order.id id, address, placementTime, SUM(tbl_orderedproduct.price) price,status FROM tbl_orderedproduct, tbl_order WHERE tbl_orderedproduct.orderId=tbl_order.id AND placementTime between '2016-12-01' AND '2016-12-28';

		try{
			$stmt=$this->db->prepare("SELECT tbl_order.id id, address, placementTime, (SELECT SUM(tbl_orderedproduct.price) FROM tbl_orderedproduct WHERE tbl_orderedproduct.orderId=tbl_order.id) as price, status FROM tbl_orderedproduct, tbl_order WHERE tbl_orderedproduct.orderId=tbl_order.id AND placementTime between :from AND :to;");
			$stmt->bindparam(':from',$fromTime);
			$stmt->bindparam(':to',$toTime);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}


	}

	public function addCustomOrder($name,$phone,$design){
		//INSERT INTO `craftee_db`.`tbl_customorder` (`id`, `name`, `phone`, `design`) VALUES (NULL, '', '', '');
		try{
			$stmt=$this->db->prepare("INSERT INTO `tbl_customorder` (`id`, `name`, `phone`, `design`) VALUES (NULL, :name, :phone, :design);");
			$stmt->bindparam(':name',$name);
			$stmt->bindparam(':phone',$phone);
			$stmt->bindparam(':design',$design);
			$stmt->execute();
			}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}

	public function getAllCustomOrder(){
		try{
			$stmt=$this->db->prepare("SELECT * FROM tbl_customorder");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
		 	$result=$stmt->fetchAll();
		 	return $result;
		 	}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}
	}

	public function deleteCustomOrder($id){
		//DELETE FROM `tbl_customorder` WHERE `tbl_customorder`.`id` = 1
		try{
			$stmt=$this->db->prepare("DELETE FROM `tbl_customorder` WHERE `tbl_customorder`.`id` = :id");
			$stmt->bindparam(':id',$id);
			$stmt->execute();
			}
		 	catch(Exception $e){
		 		echo $e->getMessage();
		 	}

	}




}