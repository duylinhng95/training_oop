<?php
require_once('controller/BaseController.php');
require_once('model/user.php');

class PageController extends BaseController
{
	public function __construct()
	{
		$this->folder = 'pages';
	}

	public function home()
	{
		$this->render('home');
	}

	public function error()
	{
		$this->render('error');
	}
}
?>