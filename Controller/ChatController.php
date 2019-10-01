<?php 

require_once('Model/PostsModel.php');

class ChatController 
{
	protected $username;
	protected $roomname;

	public function chat() {

		if (!empty($_GET['username']) AND !empty($_GET['roomname'])) {

			$this->username = $_GET['username'];
			$this->roomname = $_GET['roomname'];
			$this->historic($this->roomname);
			require_once('View/chat.php');
		}
		else {
			echo "All the fields must be completed";
		}
	}

	public function send() {

		if (!empty($_POST['content']) AND !empty($_GET['username']) AND !empty($_GET['roomname'])) {
			$username = htmlspecialchars($_GET['username']);
			$roomname = htmlspecialchars($_GET['roomname']);
			$content = htmlspecialchars($_POST['content']);

			$model = new PostsModel();
			$model->post($username, $roomname, $content);
			$this->historic($roomname);
			require_once('View/chat.php');
		}
	}	

	public function historic($roomname) {
		
		$model = new PostsModel();
		$result = $model->historic($roomname);
		require_once('View/chat.php');
	}
}