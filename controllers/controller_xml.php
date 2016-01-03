<?php
require_once("models/Model_main.php");
class Controller_xml extends Controller
{
	function __construct(){
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		if (isset($routes[5]))
			$topic = explode('.', $routes[5]);
		
		$this->model = new Model_Main();
		$rss = false;
		if ($topic[0] === "RSS") $rss = true;
		if ($rss)
		$result = $this->model->RSS_topic(0, $topic[0]);
		else $result = $this->model->RSS_topic(1, $topic[0]);
		include_once("core/rss.php");

		//echo file_get_contents('http://localhost/web/4/god/goods.xml');
		echo "<code>"."<pre>".htmlspecialchars( file_get_contents('http://localhost/web/4/god/goods.xml'))."<pre>"."</code>";
	}
}