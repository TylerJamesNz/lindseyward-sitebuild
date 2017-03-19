<?php
	include './classes/user.php';
	include './classes/lindsey_model.php';
	include './classes/lindsey_validate.php';

	// Initialization
	//----------------------------------------------
	session_start(); 

	$user = new User();
	$validate = new LindseyValidate();
	$model = new LindseyModel('localhost', 'site_admin', 'LindseyWard#245%!', 'tyler_ward');

	loadPage($model, $user, $validate);

	// Methods
	//----------------------------------------------

	function loadPage($model, $user, $validate) // Loads the required controller based on the URL.
	{
		if(isset($_GET['url'])) // If a page is requested in the url
		{
			switch ($_GET['url']) // Load the view that corresponds to the current page.
			{
				case 'home':
					include './controllers/home_controller.php';
					new HomeController($_GET['url'], $model, $user, $validate);
					break;

				case 'testimonials':
					include './controllers/testimonials_controller.php';
					new TestimonialsController($_GET['url'], $model, $user, $validate);
					break;

				case 'recentlysold':
					include './controllers/recentlysold_controller.php';
					new RecentlySoldController($_GET['url'], $model, $user, $validate);
					break;

				case 'listings':
					include './controllers/listings_controller.php';
					new ListingsController($_GET['url'], $model, $user, $validate);
					break;

				case 'prizedraw':
					include './controllers/prizedraw_controller.php';
					new PrizeDrawController($_GET['url'], $model, $user, $validate);
					break;

				case 'contact':
					include './controllers/contact_controller.php';
					new ContactController($_GET['url'], $model, $user, $validate);
					break;

				case 'login':
					include './controllers/login_controller.php';
					new LoginController($_GET['url'], $model, $user, $validate);
					break;

				case 'deletesold':
					include './controllers/deletesold_controller.php';
					new DeleteSoldController($_GET['url'], $model, $user, $validate);
					break;

				case 'logout':
					include './controllers/logout_controller.php';
					new LogoutController($_GET['url'], $model, $user, $validate);
					break;

				default:
				echo "404 Page not Found";
			}
		}
		else // If no page is requested in the url default to home.
		{
			include './controllers/home_controller.php';
			$currentView = new HomeController('home', $model, $user, $validate);
		}
	}
?>