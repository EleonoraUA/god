<?php
error_reporting(0);
class Controller_Admin extends Controller
{
	function __construct(){
		session_start();
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$this->view = new View();
		$this->view->generate("admin_header.php");
	}

	
	// Действие для разлогинивания администратора
	function action_out()
	{
		session_destroy();
		header("Location: http://localhost/web/4/god/main/home");
	}

	function action_pages(){
		$this->model = new Model_admin();
		$this->view = new View();
		$articles = $this->model->get();
		$articles = $this->model->next();
		$this->model->editing_data();
		$this->view->generate("table_start.html");
		while($content = mysql_fetch_array($articles)) {
			$topic = $content['topic'];
		    $state = $content['state'];
		    $logged = $content['loggedIn'];
		    $content['state'] = ($content['state'] ? "YES" : "NO");
		    $content['loggedIn'] = ($content['loggedIn'] ? "Signed in" : "Anonymous");
			include("views/pages.php"); 
		}
		echo "</table>";
	}

	function action_messages(){
		$this->model = new Model_admin();
		$this->view = new View();
		$array = $this->model->admin_messages();
		$this->model->delete_message();
		$this->model->answer();
		require_once("views/messages.php");
	}


	function action_addPage(){
		$this->model = new Model_admin();
		$this->view = new View();
		$this->model->addPage();
		$this->view->generate("addPage.html");
	}

	function action_editPage(){
		$this->model = new Model_admin();
		$this->view = new View();
		$row = $this->model->edit();
		require_once("views/edit.php");
	}


}
