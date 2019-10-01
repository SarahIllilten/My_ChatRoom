<?php 

include('Database.php');

class PostsModel
{
	protected $bdd;
	protected $pdo;
	
	function __construct() {
		$this->bdd = new Database();
		$this->pdo = $this->bdd->connect();
	}

	public function post($username, $roomname, $content) {
		
		$query = $this->pdo->prepare("INSERT INTO posts (username, roomname, content, `date`) VALUES ( ?, ?, ?, NOW())");
		$query->execute(array($username, $roomname, $content));
		return $this->pdo->lastInsertId();
	}

	public function roomnames() {
		$query = $this->pdo->prepare('SELECT DISTINCT(roomname) FROM posts');
		$query->execute();
		return $query->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function historic($roomname) {
		$query = $this->pdo->prepare('SELECT username, content, `date` FROM posts WHERE roomname = ? ORDER BY `date` DESC');
		$query->execute(array($roomname));
		return $query->fetchAll(\PDO::FETCH_ASSOC);
	}
}