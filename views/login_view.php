<?php
	/*
	**	This page extends the base_view and inherits all the page data.
	*/
	include 'base_view.php';

	class LoginView extends BaseView
	{
		protected $data;
		
		public function display_head() // Returns the compiled head HTML.
		{
			$html = "";
			$html .= "<!DOCTYPE HTML>\n";
			$html .= "<html>\n";
			$html .= "<head>\n";
			$html .= "\t<title>Lindsey Ward - Login</title>\n";
			$html .= "\t<meta charset=\"utf-8\">\n";
			$html .= "\t<meta name=\"viewport\" content=\"initial-scale=1, maximum-scale=1\">\n";
			$html .= "\t<meta name=\"keywords\" content=\"Property, Lifestyle, Real Estate, Greytown, Wairarapa, Sections, Subdivisions, Houses, Homes, Sale\">\n";
			$html .= "\t<meta name=\"description\" content=\"Lindsey Ward is licensed, Wairarapa based real estate consultant dedicated to giving you a great experience and a premium price for your home.\">\n";
			$html .= "\t<link rel=\"stylesheet\" src=\"http://normalize-css.googlecode.com/svn/trunk/normalize.css\" />\n";
			$html .= "\t<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>\n";
			$html .= "\t<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>\n";
			$html .= "\t<link rel=\"stylesheet\" href=\"http://yui.yahooapis.com/pure/0.4.2/pure-min.css\">\n";
			$html .= "\t<link rel=\"stylesheet\" type=\"text/css\" href=\"./styles/style.css\">\n";
			$html .= "\t<!--[if lt IE 9]>\n";
			$html .= "\t\t<script src=\"http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js\"></script>\n";
			$html .= "\t<![endif]-->\n";
			$html .= "</head>\n";

			return $html;
		}

		public function display_slider() // Returns the compiled slider HTML.
		{
			$html = "";

			return $html;
		}

		public function display_main() // Returns the compiled main content HTML.
		{
			$html = "";
			$html .= "\t<main class=\"wrapper\">\n";
			$html .= "\t\t<div class=\"sub-wrapper\">\n";
			$html .= "\t\t\t<h3>Login</h3>\n";
			$html .= "\t\t\t<form class=\"pure-form pure-form-stacked\" action=\"" . $_SERVER['REQUEST_URI'] . "\" method=\"POST\">\n";
			
			if($this -> data['access'] != 'admin') // If the user is not currently the admin display the form.
			{
				$html .= "\t\t\t\t<fieldset>\n";
				$html .= "\t\t\t\t\t<legend>Admin Login</legend>\n";
				$html .= "\t\t\t\t\t<label for=\"name\">Username:</label>\n";
				$html .= "\t\t\t\t\t<input id=\"name\" class=\"pure-input-1\" type=\"text\" placeholder=\"Username\" name=\"username\">\n";
				$html .= "\t\t\t\t\t<label for=\"password\">Password:</label>\n";
				$html .= "\t\t\t\t\t<input id=\"password\" class=\"pure-input-1\" type=\"password\" placeholder=\"******\" name=\"password\">\n";
				$html .= "\t\t\t\t</fieldset>\n";
			}
			
			if($this -> data['login'][0] == 'error') // If the login form returned errors
			{
				$html .= "\t\t\t\t<div class=\"error-message\">" . $this -> data['login'][1] . "</div>\n";
			}
			else if($this -> data['login'][0] == 'success')
			{
				$html .= "\t\t\t\t<div class=\"success-message\">" . $this -> data['login'][1] . "</div>\n";
			}
			
			if($this -> data['access'] != 'admin') // If the user is not currently the admin display the form.
			{
				$html .= "\t\t\t\t\t<button type=\"submit\" class=\"pure-button pure-button-primary\">Submit</button>\n";
			}
			
			$html .= "\t\t\t</form>\n";
			$html .= "\t\t</div><!-- sub-wrapper -->\n";
			$html .= "\t\t<div class=\"clear-floats\"></div>\n";
			$html .= "\t</main><!-- wrapper -->\n";

			return $html;
		}
	}
?>



