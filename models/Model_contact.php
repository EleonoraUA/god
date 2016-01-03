<?php
class Model_contact extends Model
{
	public function get_data()
	{	
		$email = $name = $text = "";
		$emailErr = $nameErr = $textErr = "";
		$valid1 = $valid2 = false;
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{

		    if (empty($_POST["email"])) $emailErr = "E-mail is required!";
		    else $email = $_POST["email"];
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $emailErr = "Invalid email format";
		    else $valid1 = true;

		    if (empty($_POST["name"])) $nameErr = "Name is required!";
		    else $name = $_POST["name"];
		    if (!preg_match("/^[a-zA-Z ]*$/",$name)) $nameErr = "Only letters and white space allowed";
		    else $valid2 = true;

		    if (empty($_POST["text"])) $textErr = "Write your message, please";
		    else $text = $_POST["text"];

		    $ip = $_SERVER['REMOTE_ADDR'];
		    $date = date("Y-n-j H:i:s");
		    $sql = "INSERT INTO `messages` (`name`, `email`, `message`, `date`, `ip`) VALUES ('$name' ,'$email', '$text', '$date', '$ip')";
		    if (!mysql_query($sql))echo '<p><b>Error!</b></p>';
		    else echo '<p><b>Ok!</b></p>';

		}
	
	}

}