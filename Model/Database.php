<?php

class Database
{
	protected $bdd;

	public function connect() {
		try
		{
			$this->bdd = new PDO('mysql:host=localhost;dbname=Chat_Room;charset=utf8', '****', '*****');
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		return $this->bdd;
	}
}