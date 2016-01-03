<?php
require_once("models/Model_main.php");
class Controller_json extends Controller
{
	function __construct() {
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		if (isset($routes[5]))
			$topic = explode('.', $routes[5]);
		$this->model = new Model_Main();
		$result = $this->model->get_json($topic[0]);
		$json = json_encode($result);
		echo $json;

	}
}