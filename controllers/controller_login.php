<?php
require_once("Controller_main.php");
require_once("models/Model_main.php");
class Controller_Login extends Controller_main
{
	
	
	function action_index()
	{
			if(isset($_POST['email']) && isset($_POST['password'])) {
			$email = $_POST['email'];
			$password =$_POST['password'];
			$this->model = new Model_login();
			$session = $this->model->get_data($email, $password);
			$this->view->generate('template_view.php', $session);
		} else
			$this->view->generate('login_view.php');
	}
	
	function action_out()
	{
		session_destroy();
		header("Location: http://localhost/web/4/god/main/home");
	}
}
