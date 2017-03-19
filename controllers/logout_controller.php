<?php 
	include 'base_controller.php';

	class LogoutController extends BaseController {

		protected $model;
		protected $user;
		protected $view;
		protected $data;

		public function retrievePageData() // Retrieve all page data before view is loaded.
		{
			$this -> user -> logout();

			header('Location: ' . BASE_URL . '/home');
		}
	}
?>