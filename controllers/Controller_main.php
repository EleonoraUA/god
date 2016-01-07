<?php
require_once("models/Model_contact.php");
require_once("models/Model_FAQ.php");
error_reporting(E_ALL);
class Controller_Main extends Controller
{

	function __construct()
	{
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$this->model = new Model_Main();
		$this->view = new View();
		$data = $this->model->get_data();
		if (isset($routes[5]) || $routes[4] === "login") {
			$data = $this->model->get_data();
			$content = $this->model->get_content($routes[5]);
			$topic = explode('.', $routes[5]);			
			$this->view->generate('main_view.php', 'template_view.php', $data,$content[0]);
		}
	}
	
	function action_index() {
		
		$data = $this->model->get_data();
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}

	function action_contact() {
		$this->view->generate('contact.html');
		$this->model = new Model_contact();
		$this->model->get_data();
	}

	function action_FAQ() {

		$this->model = new Model_FAQ();
		$pages = $this->model->get_data();
		$array = $this->model->next();
		require_once("views/faq.html");
	}

	function action_RSS(){
		$this->model = new Model_Main();
		$result = $this->model->RSS_topic();
		$rss = true;
		include_once("core/rss.php");
		$xml = simplexml_load_file('http://localhost/web/4/god/goods.xml');
		require_once("views/rss.php");
	}

	
}