<?php
require 'data/mysql.class.php';
/**
 * Gerenciador das classes
 */
class License extends MySQL {

	private $ip;
	private $port;
	public $server;
	public $plugin;

	public function hasLicense($ip, $port)	{
		$this->ip = $ip;
		$this->port = $port;
		$stmt = $this->pdo->prepare('SELECT * FROM `license` WHERE `ip`=? AND `port`=?');
		$stmt->bindParam(1, $this->ip);
		$stmt->bindParam(2, $this->port);
		$stmt->execute();
		$result = $stmt->fetch();
		if ($result) {
			$this->plugin = $result[2];
			$this->server = $result[3];
		}
		return $result;
	}

	public function getServer()	{
		return $this->server;
	}

	public function getPlugin()	{
		return $this->plugin;
	}

	public function getJSON()	{
		return json_encode($this, JSON_PRETTY_PRINT);
	}
}
