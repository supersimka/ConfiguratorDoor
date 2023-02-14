<?php
namespace App\Models;

use PDO;

abstract class Model
{
	 protected $pdo;

	 public function __construct()
	 { 
			 try {
				  $this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASSWORD);
			 } catch (PDOException $e) {
				  return "Error!: " . $e->getMessage();
				  die();
			 }
	 }
}
