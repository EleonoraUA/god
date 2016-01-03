<?php
class Model_FAQ extends Model
{
	public function get_data()
	{
	    if (!isset($routes[6]))
	    	$routes[6] = "1";           
	    $messages = 2;
	        $query = "SELECT count(*) FROM `messages` WHERE answer != '0'"; 
	    $arr = mysql_query($query);
	    $row = mysql_fetch_row($arr);
	    if (!$arr) die ("Error ". mysql_error());
	    $count = $row[0];
	    $pages = ceil($count/$messages);
	    return $pages;
	}

	public function next(){
		$routes = explode('/', $_SERVER['REQUEST_URI']);
	    $num_page = $routes[6] - 1;
	    $start = abs($num_page * 2);
	    $q = "SELECT * FROM `messages` WHERE answer != '0' LIMIT $start, 2"; 
	    if (!$array = mysql_query($q)) die(mysql_error());
	    return $array;

	}

}