<?php
$link = mysql_connect("localhost", "root", "12345");
$db =mysql_select_db("hoverboard", $link);
if (!$db) 
	die ("Unable to choose HB " .mysql_error());
if (!$link) 
	die ("Unable to connect");

$result = array();
$result['content'] = '';
$messages = 2;


$num_page = $_GET['page'] - 1;

$start = abs($num_page * 2);
$i = $start;
$q = "SELECT * FROM `messages` WHERE answer != '0' LIMIT $start, 2"; 

if (!$array = mysql_query($q)) {
	die(mysql_error());
}

while ($row = mysql_fetch_array($array))
{
    $result['content'] .= "<ul class='mess'>"."<li>"."<div class='question'>".++$i.". "."<b>Name:</b> ".$row['name']."<br/>"."<b>Date:</b> ".$row['date']."<br/>". "<b>Asked:</b> ".$row['message']."</div><br/>"."<div class='answer'><b>Admin:</b> ".$row['answer']."</div><br/>"."</li>"."<br/>"."</ul>";
} 

$result['content'] = utf8_encode($result['content']);
echo json_encode($result);