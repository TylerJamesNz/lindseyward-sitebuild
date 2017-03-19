<?php 
	include './views/prizedraw_view.php';
	include 'base_controller.php';

	class PrizeDrawController extends BaseController {

		protected $model;
		protected $user;
		protected $view;
		protected $data;

		public function retrievePageData() // Retrieve all page data before view is loaded.
		{
			$this -> data['model'] = $this -> model;
			$this -> data['user'] = $this -> user;
			
			$this -> view = new PrizeDrawView($this -> data);
			$this -> displayView($this -> view);
		}
	}
?>