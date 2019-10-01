<?php 

require_once('Controller/HomeController.php');

if(isset($_GET['controller']) AND !empty($_GET['controller'])){
	$controller = ucfirst($_GET['controller']) . 'Controller';
	require_once('Controller/' . $controller . '.php');
	$call = new $controller();
	if(isset($_GET['action']) AND !empty($_GET['action'])){
		$action = ucfirst($_GET['action']);
		$call->$action();
	} else {
		$home = new HomeController();
		$home->home();
	}
}
else{
	$home = new HomeController();
	$home->home();
}