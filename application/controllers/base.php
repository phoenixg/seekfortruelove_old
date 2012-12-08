<?php

class Base_Controller extends Controller {

	
	public function __construct() {
	}

	public function __call($method, $parameters) {
		return Response::error('404');
	}

}