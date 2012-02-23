<?php

class MainController extends Controller {
	
	
	function index()
	{
		$this->add_style('main');
		
		$title = "";
		include($this->tpl);			
	}
	
}


?>