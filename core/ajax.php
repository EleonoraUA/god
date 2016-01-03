<?php
//Connecting to DB
$link = mysql_connect("localhost", "root", "12345");
$db =mysql_select_db("hoverboard", $link);
if (!$db) 
	die ("Unable to choose HB " .mysql_error());
if (!$link) 
	die ("Unable to connect");


if (!empty($_GET['article'])) {
	$topic = $_GET['article'];
	if($_GET['article'] === "RSS" || $_GET['article'] === "FAQ" ||$_GET['article'] === "contact") {
		$dom = new DomDocument;
		$div = $dom->getElementsByTagName['div'][0];
		$div->saveHTMLFile('loh.txt');
	}
} else {  // this is kostyl, не обращай внимания
	$topic = 'physics';
}
	
$result = array();
	
$query = "SELECT `text` 
		  FROM content 
		  WHERE topic='" . $topic . "'";
	
if (!$query) 
	die("loh");
$get = mysql_query($query);
if (!$get) 
	die (mysql_error());
while ($arr = mysql_fetch_array($get)) {
	$result['topic'] = $topic;
	//$result['content'] = htmlentities($arr["text"],ENT_SUBSTITUTE);
	$result['content'] = utf8_encode($arr["text"]);	
}
$json = json_encode($result);
echo $json;

