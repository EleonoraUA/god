<?php
class Model_login extends Model
{

	

	public function get_data($email, $password)
	{	
		$q = "SELECT `password`,`name`, `admin` FROM users WHERE email='".$_POST['email']."' ";
	    $arr = mysql_query($q);
	    $row = mysql_fetch_assoc($arr);
	    if (!$arr) die ("Error ". mysql_error());
	    $passw = $row['password'];
	    if (!strcmp($passw, $_POST['password'])) {
	    	session_start();
	        $_SESSION['email'] = $_POST['email'];
	        $_SESSION['name'] = $row['name'];
	        $_SESSION['admin'] = $row['admin'];
	        if ($row['admin'] == 1) header("Location: http://localhost/web/4/god/admin");
	        else {
	         header("Location: http://localhost/web/4/god/main/home");
	       	}
	    }
	    	else echo "ERROR!";
	    //return $_SESSION;
	}

	public function get_content()
	{
		 
	}

}