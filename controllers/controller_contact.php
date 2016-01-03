<?php
require_once("Controller_main.php");
require_once("models/Model_main.php");
class Controller_contact extends Controller_main
{
	
	function action_index()
	{
		
		$this->model = new Model_contact();
		$this->model->generate('template_view.php');
	}
	
	// Действие для разлогинивания администратора
	function action_logout()
	{
		
	}

}