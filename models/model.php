<?php

require_once '/../config/config.php';



class Model
{
	public $db;
	private $username='root';
	private $password='';
	private $database='craftee_db';
	private $servername='localhost';


	function __construct()
	{
		/*
		$this->username=Config::$db_config['username'];
		$this->password=Config::$db_config['password'];
		$this->database=Config::$db_config['database'];
		$this->servername=Config::$db_config['servername']; */
		

		try {
		    $this->db = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
		    // set the PDO error mode to exception
		    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
		catch(PDOException $e)
		    {
		    echo "Connection failed: " . $e->getMessage();
		    }
	}

}