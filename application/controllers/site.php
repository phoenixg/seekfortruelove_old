<?php

class Site_Controller extends Base_Controller
{
	public $restful = true;

	public function get_index()
	{
		//return View::make('test');
	}

	public function get_memorabilia()
	{
		return View::make('site.memorabilia');
	}

	public function get_faq()
	{
		return View::make('site.faq');
	}


}