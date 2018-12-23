<?php
require 'config.php';
/**
 * Interagir com o banco de dados
 */
class MySQL	{
	
	protected $pdo;

	function __construct()	{
		try {
			$this->pdo = new PDO('mysql:host='.database_host.';dbname='.database_name, database_user, database_pass);
			$this->pdo->query('CREATE TABLE IF NOT EXISTS `license` (`ip` VARCHAR(20) NOT NULL, `port` SMALLINT NOT NULL, `plugin` VARCHAR(60) NOT NULL, `server` VARCHAR(60) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8');
		} catch(PDOException $e) {
			die('Error in pdo: '.$e->getMessage());
		}
	}
}