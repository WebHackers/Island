<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'blog';

	$connect = mysqli_connect($host, $username, $password) or die('Can not connect the database');

	if(mysqli_query($connect, "CREATE DATABASE if Not Exists blog character set utf8")) {
		class DB {
			private $host;
			private $username;
			private $password;
			private $database;
			public $conn;

			function __construct($host, $username, $password, $database) {
				$this->host = $host;
				$this->username = $username;
				$this->password = $password;
				$this->database = $database;

				$this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die('Can not connect the database');
			}
		}

		$db = new DB($host, $username, $password, $database);
	}
	else {
		echo mysqli_error($connect);
	}
?>