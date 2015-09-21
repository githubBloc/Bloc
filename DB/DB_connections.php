<?php

class DB_connections {
	private $conn;
	private $host;
	private $user;
	private $password;
	private $baseName;
	private $port;
	private $Debug;
 
    function __construct($localhost, $dbname, $user, $pass) {
		$this->conn = false;
		$this->host = $localhost; //hostname
		$this->user = $user; //username
		$this->password = $pass; //password
		$this->baseName = $dbname; //name of your database
		$this->debug = true;
		$this->connect();
	}
 
	function __destruct() {
		$this->disconnect();
	}
	
	function connect() {
		if (!$this->conn) {
			try {
				$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->baseName.'', $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));  
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
 
			if (!$this->conn) {
				$this->status_fatal = true;
				echo 'Connection BDD failed';
				die();
			} 
			else {
				$this->status_fatal = false;
			}
		}
 
		return $this->conn;
	}
 
	function disconnect() {
		if ($this->conn) {
			$this->conn = null;
		}
	}
	
	function getOne($query,$parameters) {
		$result = $this->conn->prepare($query);
		$result->bindParam(':parameter', $parameters, PDO::PARAM_STR);
		$ret = $result->execute();
		if (!$ret) {
		   echo 'PDO::errorInfo():';
		   echo '<br />';
		   echo 'error SQL: '.$query;
		   die();
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetch();
		
		return $reponse;
	}
	
	function getAll($query) {
		$result = $this->conn->prepare($query);
		$ret = $result->execute();
		if (!$ret) {
		   echo 'PDO::errorInfo():';
		   echo '<br />';
		   echo 'error SQL: '.$query;
		   die();
		}
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$reponse = $result->fetchAll();
		
		return $reponse;
	}
	
	function execute($query, $Parameters) {
		$statement = $this->conn->prepare($query);
			foreach ($Parameters as $key => $value) {
				$statement->bindValue($key, $value, PDO::PARAM_STR);
			}

		if (!$result = $statement->execute()) {
			echo 'PDO::errorInfo();';
		   die();
		}
		return $result;
	}
}

//Examples for use in your file:
//=====================================================================================================

// 1 line selection, return 1 line
// $User = $bdd->getOne('SELECT id, firstname, lastname FROM users WHERE lastname = "Smith"');  

//The multi-line selection
// $Users = $bdd->getAll('SELECT id, firstname, lastname FROM users'); // select ALL from users	
// $nbrUsers = count($Users); // return the number of lines
// echo $nbrUsers.' users in the database<br />';	
// foreach($Users as $user) { // display the list
// echo $user['id'].' - '.$user['firstname'].' - '.$user['lastname'];	

//The INSERT INTO Statement
// $query = $bdd->execute('INSERT INTO users (firstname, lastname) VALUES ("firstname1", "lastname1")');

//The UPDATE Statement
// $query = $bdd->execute('UPDATE users SET firstname="firstname2", lastname="lastname2" WHERE id=20');


