<?php
	include('./global.class.php');    //引入配置文件
	echo $host, $username, $password, $database;    //测试配置文件是否引入成功

	class DB {
		private $host;
		private $username;
		private $password;
		private $database;
		private $conn;

		function __construct($host, $username, $password, $database) {
			$this->host = $host;
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;

			$this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die('Can not connect the database');
			mysqli_query($this->conn, "SET NAMES 'utf8'");    //设置字符编码为 utf8
		}
	}

	$db->new DB($host, $username, $password, $database);
?>