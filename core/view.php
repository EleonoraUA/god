<?php

class View
{

	
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	/*
	$content_file - виды отображающие контент страниц;
	$template_file - общий для всех страниц шаблон;
	$data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/
	function generate($content_view, $template_view = null, $data = null, $content = null, $session = null)
	{
		
		include 'views/'.$template_view;
		include 'views/'.$content_view;
		include 'views/script.html';
		
	}
}
?>
