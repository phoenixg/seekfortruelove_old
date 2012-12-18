<?php 
class Admin_Dashboard_Controller extends Base_Controller
{
	public $restful = true;

	/* todo
	public function __construct() {
		$this->filter('before', 'auth');
	}
	*/

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


