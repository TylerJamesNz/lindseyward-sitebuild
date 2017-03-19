<?php
	/*
	**	This is the login class it contains all the functionality for dealing with user authentication.
	*/
	class User
	{
		private $lastLoginMessage = array('neutral', 'No login attempts were recently performed.');

		function __construct() // Set the user access level upon construction.
		{
			if(!isset($_SESSION['USER_ACCESS_LEVEL']))	$_SESSION['USER_ACCESS_LEVEL'] = 'guest';
		}

		// Public Methods
		//----------------------------------------------

		public function login($user, $pass) // Attempt to login with the provided username and pass.
		{
			if($user == WEB_USER && sha1($pass) == WEB_PASS) // If the credentials match the admin login.
			{
				$_SESSION['USER_ACCESS_LEVEL'] = 'admin';

				return array('success', 'Successfully logged in as admin.');
			}
			else
			{
				return array('error', 'An invalid username or password was passed.');
			}
		}

		public function logout() // Resets user access values, unsets session variables deletes session.
		{
			if(isset($_SESSION['USER_ACCESS_LEVEL'])) // Check the user access level has been set in the session.
			{
				session_unset($_SESSION['USER_ACCESS_LEVEL']);
			}

			$_SESSION['USER_ACCESS_LEVEL'] = 'guest';

			session_destroy();
		}	

		public function getAccessLevel() // Returns the access level of the current user.
		{
			return $_SESSION['USER_ACCESS_LEVEL'];
		}	

		public function runPageAuthentication() // Runs all the authentication required to check for logins / logouts and set correct user access level.
		{
			if(isset($_POST['username']) && isset($_POST['password'])) // If a login form has been submitted.
			{
				$loginAttempt = $this -> login($_POST['username'], $_POST['password']); // Attempt to login with the passed details.
				
				return $loginAttempt;
			}
			if(isset($_GET['action'])) // If the page variable is set.
			{
				if($_GET['action'] == 'logout') // And it is set to logout.
				{
					$this -> logout();

					return array('success', 'User successfully logged out.');
				}
			}
		}
	}
?>