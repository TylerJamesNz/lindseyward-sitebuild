<?php
	/*
	**	This page extends the base_view and inherits all the page data.
	*/
	include 'base_view.php';

	class RecentlySoldView extends BaseView
	{
		protected $data;
		
		public function display_head() // Returns the compiled head HTML.
		{
			$html = "";
			$html .= "<!DOCTYPE HTML>\n";
			$html .= "<html>\n";
			$html .= "<head>\n";
			$html .= "\t<title>Lindsey Ward - Recently Sold</title>\n";
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
			$html .= "\t\t<div class=\"col-1-2\">\n";
			$html .= "\t\t\t<h3>Recently Sold</h3>\n";

			if(isset($this -> data['content']['solditems'])) // If items exist.
			{
				foreach ($this -> data['content']['solditems'] as $key => $solditem) // Iterate through the recently sold houses and distribute them to columns.
				{
					if( $key % 2 == 0 ) // If the item is even append it to the HTML it here.
					{
						$html .= "\t\t\t<img class=\"recently-sold-img\" src=\"./img/sold_resized/" . $solditem['filename'] . "\" alt=\"Recently purchased real estate - " . $solditem['subheading'] . "\">\n";
						$html .= "\t\t\t<p class=\"sold-text\">" . $solditem['subheading'] . "</p>\n";
					}
				}

				$html .= "\t\t</div><!-- col-1-2 -->\n";
				$html .= "\t\t<div class=\"col-1-2 col-no-title\">\n";

				foreach ($this -> data['content']['solditems'] as $key => $solditem) // Iterate through the recently sold houses and distribute the uneven to the right column.
				{
					if( $key % 2 != 0 ) // If the item is odd append it to the HTML here.
					{
						$html .= "\t\t\t<img class=\"recently-sold-img\" src=\"./img/sold_resized/" . $solditem['filename'] . "\" alt=\"Recently purchased real estate - " . $solditem['subheading'] . "\">\n";
						$html .= "\t\t\t<p class=\"sold-text\">" . $solditem['subheading'] . "</p>\n";
					}
				}
			}
			else
			{
				$html .= "\t\t\t<p class=\"sold-text\">No sold items exist on the database.</p>\n";
			}

			$html .= "\t\t</div><!-- col-1-2 -->\n";
			$html .= "\t\t<div class=\"clear-floats\"></div>\n";

			if($this -> data['access'] == 'admin' && isset($_GET['action'])) // If the user is logged in and edit is requested in the URL.
			{
				if($_GET['action'] == 'edit') // If an edit has been requested in the URL.
				{
					$html .= "\t\t<hr/>\n";
					$html .= "\t\t<div class=\"sub-wrapper\">\n";
					$html .= "\t\t\t<form class=\"pure-form pure-form-stacked\" action=\"" . $_SERVER['REQUEST_URI'] . "\" method=\"POST\" enctype=\"multipart/form-data\">\n";
					$html .= "\t\t\t\t<fieldset>\n";
					$html .= "\t\t\t\t\t<legend>Whats been sold recently?</legend>\n";
					$html .= "\t\t\t\t\t<label for=\"subheading\">Image Subheading:</label>\n";
					$html .= "\t\t\t\t\t<input id=\"subheading\" class=\"pure-input-1\" type=\"text\" placeholder=\"Heading\" name=\"subheading\" value=\"" . $this -> data['form']['stickySubheading'] . "\">\n";
					$html .= "\t\t\t\t\t<label for=\"soldimage\">Sold Image ( Images will be resized to 370 x 225px ):</label>\n";
					$html .= "\t\t\t\t\t<div class=\"file-upload\">\n";
					$html .= "\t\t\t\t\t\t<input id=\"soldimage\" type=\"file\" name=\"soldimage\">\n";
					$html .= "\t\t\t\t\t</div>\n";
					$html .= "\t\t\t\t</fieldset>\n";
					
					if($this -> data['messages'][0] == 'success') // If no error messages are returned.
					{
						$html .= "\t\t\t\t<div class=\"success-message\">" . $this -> data['messages'][1] . "</div>\n";
					}
					else if($this -> data['messages'][0] == 'error') // If an error is returned.
					{
						$html .= "\t\t\t\t<div class=\"error-message\">" . $this -> data['messages'][1] . "</div>\n";
					}

					$html .= "\t\t\t\t<button type=\"submit\" class=\"pure-button pure-button-primary\" name=\"upload\">Upload</button>\n";
					$html .= "\t\t\t</form>\n";
					$html .= "\t\t</div><!-- sub-wrapper -->\n";
					$html .= "\t\t<div class=\"sub-wrapper3\">\n";
					$html .= "\t\t<hr/>\n";

					if(isset($this -> data['content']['solditems'])) // If items exist.
					{
						foreach($this -> data['content']['solditems'] as $solditem) // Create delete buttons for all of the images.
						{
							$html .= "\t\t<form action=\"deletesold\" method=\"POST\">\n";
							$html .= "\t\t\t<div class=\"delete-box\">\n";
							$html .= "\t\t\t\t<img src=\"./img/sold_resized/" . $solditem['filename'] . "\" alt=\"Recently purchased real estate - " . $solditem['subheading'] . "\">\n";
							$html .= "\t\t\t\t<button class=\"pure-button pure-button-primary\" value=\"" . $solditem['id'] . "\" name=\"delete\">Delete: " . $solditem['subheading'] . "</button>\n";
							$html .= "\t\t\t\t<div class=\"clear-floats\"></div>\n";
							$html .= "\t\t\t</div>\n";
							$html .= "\t\t</form>\n";
						}
					}

					$html .= "\t\t</div><!-- sub-wrapper3 -->\n";
				}
			}
			
			$html .= "\t</main><!-- wrapper -->\n";

			return $html;
		}
	}
?>



