<?php
	/*
	**	This page extends the base_view and inherits all the page data.
	*/
	include 'base_view.php';

	class TestimonialsView extends BaseView
	{
		protected $data;
		
		public function display_head() // Returns the compiled head HTML.
		{
			$html = "";
			$html .= "<!DOCTYPE HTML>\n";
			$html .= "<html>\n";
			$html .= "<head>\n";
			$html .= "\t<title>Lindsey Ward - Testimonials</title>\n";
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
			$html .= "\t\t\t<h3>Testimonials</h3>\n";
			$html .= "\t\t\t<p>" . nl2br($this -> data['content']['left_column']) . "</p>\n";
			$html .= "\t\t</div><!-- col-3 -->\n";
			$html .= "\t\t<div class=\"col-divider\"></div>\n";
			$html .= "\t\t<div class=\"col-3 col-mid col-no-title\">\n";
			$html .= "\t\t\t<p>" . nl2br($this -> data['content']['mid_column']) . "</p>\n";
			$html .= "\t\t</div><!-- col-3 -->\n";
			$html .= "\t\t<div class=\"col-divider\"></div>\n";
			$html .= "\t\t<div class=\"col-3 col-right col-no-title\">\n";
			$html .= "\t\t\t<p>" . nl2br($this -> data['content']['right_column']) . "</p>\n";
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
					$html .= "\t\t\t\t\t<legend>Update Testimonials</legend>\n";
					$html .= "\t\t\t\t\t<label for=\"leftColumn\">Left Column:</label>\n";
					$html .= "\t\t\t\t\t<textarea id=\"leftColumn\" class=\"pure-input-1\" type=\"text\" placeholder=\"Your content here...\" name=\"leftColumn\" rows=\"16\">" . $this -> data['form']['stickyLeftColumn'] . "</textarea>\n";
					$html .= "\t\t\t\t\t<label for=\"midColumn\">Middle Column:</label>\n";
					$html .= "\t\t\t\t\t<textarea id=\"midColumn\" class=\"pure-input-1\" type=\"text\" placeholder=\"Your content here...\" name=\"midColumn\" rows=\"16\">" . $this -> data['form']['stickyMidColumn'] . "</textarea>\n";
					$html .= "\t\t\t\t\t<label for=\"rightColumn\">Right Column:</label>\n";
					$html .= "\t\t\t\t\t<textarea id=\"rightColumn\" class=\"pure-input-1\" type=\"text\" placeholder=\"Your content here...\" name=\"rightColumn\" rows=\"16\">" . $this -> data['form']['stickyRightColumn'] . "</textarea>\n";
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



