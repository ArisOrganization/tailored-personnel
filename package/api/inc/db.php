<?php
namespace project;
use PDO;

class db {
	
	public $db;
	
	public function __construct() {
		$this->connect();
	}
	
	public function connect() {
		try {  

			$this->db = new PDO ("mysql:host=localhost;dbname=leads", "leads","password"); 
			// $this->db = new PDO ("mysql:host=localhost;dbname=tailored_personnel", "taylor_user","2WKjL5sJGif3pcGl"); 
			$this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (PDOException $e) {
			print( "Error connecting to SQL Server." );   
			die(print_r($e));
		} 
	}
	
	public function fetchResult($i) {
		$output = array();
		if ($data = $i->fetch(PDO::FETCH_ASSOC)) {
			do {
            	$output[] = $data;
        	} while ($data = $i->fetch(PDO::FETCH_ASSOC));
		}
		return $output;
	}
	
	public function fetchRow($i) {
		$output = array();
		if ($data = $i->fetch(PDO::FETCH_ASSOC)) {
			do {
            	$output[] = $data;
        	} while ($data = $i->fetch(PDO::FETCH_ASSOC));
		}
		if(isset($output[0])) {
		return $output[0];
		} else {
		return array();	
		}
	}
	
	public function getLast() {
		$stmt = $this->db->prepare("SELECT LAST_INSERT_ID() AS 'last';");
		$stmt->execute();
		$result = $this->fetchRow($stmt);
		return $result['last'];
	}
	
	
	public function __destruct() {
		$this->db = NULL;
	}
		
}
?>