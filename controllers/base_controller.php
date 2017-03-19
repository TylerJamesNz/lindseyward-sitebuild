<?php
	/* This is the base controller class which contains reusable functions for generating views
	** and interacting with the database.
	** 
	** Public functions
	** - displayView(view) - Displays a passed page view.
	**
	** Private functions
	** - updateNavData() // Updates the navigation display based on the current page.
	** Abstract functions
	** - retrievePageData() - run any database interaction before the view is loaded.
	*/

	abstract class BaseController {

		protected $model;
		protected $user;
		protected $view;
		protected $data;
		protected $page;

		function __construct($page, $model, $user, $validate) {
			$this -> model = $model;
			$this -> user = $user;
			$this -> validate = $validate;
			$this -> view = NULL;
			$this -> data = array();
			$this -> data['page'] = $page;
			$this -> data['login'] = $this -> user -> runPageAuthentication(); // Login if the form has been submitted and return messages.
			$this -> data['access'] = $this -> user -> getAccessLevel(); // The current user privelege for use in the view.
			$this -> data['action'] = '';

			if(isset($_GET['action'])) $this -> data['action'] = $_GET['action']; // Set the page action from the URL.

			$this -> updateNavData();
			$this -> retrievePageData();
		}

		abstract function retrievePageData(); // Run any database interaction before the view is loaded.

		public function displayView($view) // Displays a passed page view.
		{
			echo $view -> display();
		}

		private function updateNavData() // Updates the navigation display based on the current page.
		{
			$this -> data['navStringHome'] = '';
			$this -> data['navStringTestimonials'] = '';
			$this -> data['navStringRecentlySold'] = '';
			$this -> data['navStringListings'] = '';
			$this -> data['navStringPrizeDraw'] = '';
			$this -> data['navStringContact'] = '';

			if(isset($_GET['url'])) // If the page variable is set in the URL display current page in navigation data.
			{
				if($_GET['url'] == 'home') $this -> data['navStringHome'] = 'class="current"';
				if($_GET['url'] == 'testimonials') $this -> data['navStringTestimonials'] = 'class="current"';
				if($_GET['url'] == 'recentlysold') $this -> data['navStringRecentlySold'] = 'class="current"';
				if($_GET['url'] == 'listings') $this -> data['navStringListings'] = 'class="current"';
				if($_GET['url'] == 'prizedraw') $this -> data['navStringPrizeDraw'] = 'class="current"';
				if($_GET['url'] == 'contact') $this -> data['navStringContact'] = 'class="current"';
			}
			else
			{
				$this -> data['navStringHome'] = 'class="current"';
			}
		}
	}	
?>