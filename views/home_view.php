<?php
	/*
	**	This page extends the base_view and inherits all the page data.
	*/
	include 'base_view.php';

	class HomeView extends BaseView
	{
		protected $data;
		
		public function display_head() // Returns the compiled head HTML.
		{
			$html = "";
			$html .= "<!DOCTYPE HTML>\n";
			$html .= "<html>\n";
			$html .= "<head>\n";
			$html .= "\t<title>Lindsey Ward - Home</title>\n";
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
			$html .= "\t<div id=\"primary-slider\" class=\"wrapper\">\n";
			$html .= "\t\t<div class=\"img-frame\">\n";
			$html .= "\t\t\t<div class=\"frame-overlay\"></div>\n";
			$html .= "\t\t\t<img class=\"slider-image\" src=\"./img/slider_resized/slider1.jpg\">\n";
			$html .= "\t\t\t<img class=\"slider-image\" src=\"./img/slider_resized/slider2.jpg\">\n";
			$html .= "\t\t\t<img class=\"slider-image\" src=\"./img/slider_resized/slider3.jpg\">\n";
			$html .= "\t\t</div><!-- img-frame -->\n";
			$html .= "\t\t<div class=\"slider-textbox\">\n";
			$html .= "\t\t\t<img class=\"slider-logo\" src=\"./img/ui/leaders_in_realestate.png\">\n";
			$html .= "\t\t\t<h2>Houses For Sale</h2>\n";
			$html .= "\t\t\t<p class=\"address-subhead\">Greater Wairarapa Region</p>\n";
			$html .= "\t\t\t<p class=\"amenities-subhead\">Bathrooms Bedrooms and Amenities</p>\n";
			$html .= "\t\t\t<p class=\"image-description\">Houses and sections from all around the Wairarapa.</p>\n";
			$html .= "\t\t</div><!-- slider-textbox -->\n";
			$html .= "\t\t<div class=\"clear-floats\"></div>\n";
			$html .= "\t</div><!-- primary-slider -->\n";

			return $html;
		}

		public function display_main() // Returns the compiled main content HTML.
		{
			$html = "";
			$html .= "\t<main class=\"wrapper\">\n";
			$html .= "\t\t<div class=\"col-3 col-left\">\n";
			$html .= "\t\t\t<img src=\"./img/lindsey_ward.jpg\" class=\"profile-picture\">\n";
			$html .= "\t\t</div><!-- col-3 -->\n";
			$html .= "\t\t<div class=\"col-3 col-mid\">\n";
			$html .= "\t\t\t<h3>" . nl2br($this -> data['content']['header_1']) . "</h3>\n";
			$html .= "\t\t\t<p>" . nl2br($this -> data['content']['content_1']) . "</p>\n";
			$html .= "\t\t</div><!-- col-3 -->\n";
			$html .= "\t\t<div class=\"col-divider\"></div>\n";
			$html .= "\t\t<div class=\"col-3 col-right\">\n";
			$html .= "\t\t\t<h3>" . nl2br($this -> data['content']['header_2']) . "</h3>\n";
			$html .= "\t\t\t<p>" . nl2br($this -> data['content']['content_2']) . "</p>\n";
			$html .= "\t\t\t<div class=\"signature\"></div>\n";
			$html .= "\t\t\t<a class=\"grocery-btn\" href=\"http://www.freshchoice.co.nz/\"></a>\n";
			$html .= "\t\t\t<div class=\"clear-floats\"></div>\n";
			$html .= "\t\t</div><!-- col-3 -->\n";
			$html .= "\t\t<div class=\"clear-floats\"></div>\n";
			
			if($this -> data['access'] == 'admin' && isset($_GET['action'])) // If the user is logged in and edit is requested in the URL.
			{
				if($_GET['action'] == 'edit') // If an edit has been requested in the URL.
				{
					$html .= "\t\t<hr/>\n";
					$html .= "\t\t<div class=\"sub-wrapper\">\n";
					$html .= "\t\t\t<form class=\"pure-form pure-form-stacked\" action=\"" . $_SERVER['REQUEST_URI'] . "\" method=\"POST\">\n";
					$html .= "\t\t\t\t<fieldset>\n";
					$html .= "\t\t\t\t\t<legend>Update Home Content</legend>\n";
					$html .= "\t\t\t\t\t<label for=\"header1\">Header Left Column:</label>\n";
					$html .= "\t\t\t\t\t<input id=\"header1\" class=\"pure-input-1\" type=\"text\" placeholder=\"Heading\" name=\"heading1\" value=\"" . $this -> data['form']['stickyHeader1'] . "\">\n";
					$html .= "\t\t\t\t\t<label for=\"content1\">Body Left Column:</label>\n";
					$html .= "\t\t\t\t\t<textarea id=\"content1\" class=\"pure-input-1\" type=\"text\" placeholder=\"Your content here...\" name=\"content1\" rows=\"16\">" . $this -> data['form']['stickyContent1'] . "</textarea>\n";
					$html .= "\t\t\t\t\t<label for=\"header2\">Header Right Column:</label>\n";
					$html .= "\t\t\t\t\t<input id=\"header2\" class=\"pure-input-1\" type=\"text\" placeholder=\"Heading\" name=\"heading2\" value=\"" . $this -> data['form']['stickyHeader2'] . "\">\n";
					$html .= "\t\t\t\t\t<label for=\"content2\">Body Right Column:</label>\n";
					$html .= "\t\t\t\t\t<textarea id=\"content2\" class=\"pure-input-1\" type=\"text\" placeholder=\"Your content here...\" name=\"content2\" rows=\"16\">" . $this -> data['form']['stickyContent2'] . "</textarea>\n";
					$html .= "\t\t\t\t</fieldset>\n";
					
					if($this -> data['messages'][0] == 'success') // If no error messages are returned.
					{
						$html .= "\t\t\t\t<div class=\"success-message\">" . $this -> data['messages'][1] . "</div>\n";
					}
					else if($this -> data['messages'][0] == 'error') // If an error is returned.
					{
						$html .= "\t\t\t\t<div class=\"error-message\">" . $this -> data['messages'][1] . "</div>\n";
					}

					$html .= "\t\t\t\t\t<button type=\"submit\" class=\"pure-button pure-button-primary\" name=\"update\">Update</button>\n";
					$html .= "\t\t\t</form>\n";
					$html .= "\t\t<div><!-- sub-wrapper -->\n";
				}
			}
			
			$html .= "\t</main><!-- wrapper -->\n";

			return $html;
		}
	}
?>