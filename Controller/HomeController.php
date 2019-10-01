<?php 

require_once('Model/PostsModel.php');

class HomeController 
{
	protected $username;
	protected $roomname;
	protected $newroomname;

	public function home(){
		$model= new PostsModel();
		$roomnames = $model->roomnames();
		$tab=[];
		foreach ($roomnames as $value) {
			array_push($tab, $value['roomname']);
		}
		$result = implode(",", $tab);
		include('View/home.php');
	}

	public function Connect(){
		if (isset($_POST['username']) AND isset($_POST['roomname']) AND isset($_POST['newroomname'])) {

			if(!empty($_POST['username'])) {

				$this->username = htmlspecialchars($_POST['username']);

				if(!empty($_POST['newroomname'])){
					$this->roomname = htmlspecialchars($_POST['newroomname']);
				}
				else {
					if(!empty($_POST['roomname'])) {
						$this->roomname = htmlspecialchars($_POST['roomname']);
					}
				}

				if (!empty($this->username) AND !empty($this->roomname)) {
					header('Location: index.php?controller=chat&action=chat&username=' . $this->username . '&roomname=' . $this->roomname);
				}
				else {
					$this->home();
				}
			}
			else{
				$this->home();
			}
		}
		else{
			$this->home();
		}
	}

	public function index() {
		$this->set('title_for_layout',"chat.php");
		$this->historic->recursive = 0;
		$this->paginate = array('limit' => 10, 'order' => array('historic' => 'ASC'));
		$this->set('data', $this->paginate());
	}
}