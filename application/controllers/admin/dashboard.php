<?php 
class Admin_Dashboard_Controller extends Base_Controller
{
	public $restful = true;

	
	public function __construct() {
		$this->filter('before', 'auth_admin');
	}
	

	public function get_index()
	{
		return View::make('dashboard.index')
			->with('menuflg_index', true);
	}


	public function get_examine()
	{
		return 'examine';
	}


}


