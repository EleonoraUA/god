<?php
$result = array();
$link = mysql_connect("localhost", "root", "12345");
$db = mysql_select_db("hoverboard", $link);
if (!$db) die ("Unable to choose HB " .mysql_error());
if (!$link) die ("Unable to connect");
$email = $name = $text = "";
$result = array();
		$emailErr = $nameErr = $textErr = "";
		$valid1 = $valid2 = false;
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{

		    if (empty($_POST["email"])) $emailErr = "E-mail is required!";
		    else $email = $_POST["email"];
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $emailErr = "Invalid email format";
		    else $valid1 = true;

		    if (empty($_POST["name"])) {
		    	$nameErr = "Name is required!";
		    	$valid2 = false;
		    }
		    else $name = $_POST["name"];
		    if (!preg_match("/^[a-zA-Z ]*$/",$name)) $nameErr = "Only letters and white space allowed";
		    else $valid2 = true;

		    if (empty($_POST["text"])) $textErr = "Write your message, please";
		    else $text = $_POST["text"];

		    $ip = $_SERVER['REMOTE_ADDR'];
		    $date = date("Y-n-j H:i:s");
		    $sql = "INSERT INTO `messages` (`name`, `email`, `message`, `date`, `ip`) VALUES ('$name' ,'$email', '$text', '$date', '$ip')";
		    if (!mysql_query($sql)) die();
		    if ($valid1 && $valid2) $result['state'] = 1;
		    else $result['state'] = $emailErr."<br />".$nameErr."<br />".$textErr."<br />";
		    
		} else $return['message'] = "LOH";
		echo json_encode($result);
