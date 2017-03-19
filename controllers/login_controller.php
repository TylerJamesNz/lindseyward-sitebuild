<?php 
	include './views/login_view.php';
	include 'base_controller.php';

	class LoginController extends BaseController {

		protected $model;
		protected $user;
		protected $view;
		protected $data;

		public function retrievePageData() // Retrieve all page data before view is loaded.
		{
			//Set Data
			$this -> data['model'] = $this -> model;
			$this -> data['user'] = $this -> user;
			
			$this -> view = new LoginView($this -> data);
			$this -> displayView($this -> view);
		}
	}
?>