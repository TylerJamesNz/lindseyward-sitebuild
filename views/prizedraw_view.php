<?php
	/*
	**	This page extends the base_view and inherits all the page data.
	*/
	include 'base_view.php';

	class PrizeDrawView extends BaseView
	{
		protected $data;
		
		public function display_head() // Returns the compiled head HTML.
		{
			$html = "";
			$html .= "<!DOCTYPE HTML>\n";
			$html .= "<html>\n";
			$html .= "<head>\n";
			$html .= "\t<title>Lindsey Ward - Prize Draw</title>\n";
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
			$html .= "\t\t<div class=\"sub-wrapper2\">\n";
			$html .= "\t\t\t<h3>Prize Draw and Newsletter Subscription</h3>\n";
			$html .= "\t\t\t<p>Subscribe to my monthly newsletter to be in the monthly draw to win $200 in gift vouchers at FreshChoice Greytown.<br><br>To subscribe to the newsletter and be in the monthly draw to win $200 in gift vouchers please fill out the following form.</p>\n";
			$html .= "\t\t\t<form class=\"pure-form pure-form-stacked\">\n";
			$html .= "\t\t\t\t<fieldset>\n";
			$html .= "\t\t\t\t\t<legend>Entry Form</legend>\n";
			$html .= "\t\t\t\t\t<label for=\"name\">Name:</label>\n";
			$html .= "\t\t\t\t\t<input id=\"name\" class=\"pure-input-1\" type=\"text\" placeholder=\"John Doe\">\n";
			$html .= "\t\t\t\t\t<label for=\"address\">Address:</label>\n";
			$html .= "\t\t\t\t\t<input id=\"address\" class=\"pure-input-1\" type=\"text\" placeholder=\"123 Main St, Masterville\">\n";
			$html .= "\t\t\t\t\t<label for=\"email\">E-Mail:</label>\n";
			$html .= "\t\t\t\t\t<input id=\"email\" class=\"pure-input-1\" type=\"text\" placeholder=\"johndoe@gmail.com\">\n";
			$html .= "\t\t\t\t\t<label for=\"phone\">Phone:</label>\n";
			$html .= "\t\t\t\t\t<input id=\"phone\" class=\"pure-input-1\" type=\"text\" placeholder=\"Mobile or Home\">\n";
			$html .= "\t\t\t\t\t<label for=\"remember\" class=\"pure-checkbox\">\n";
			$html .= "\t\t\t\t\t\t<input id=\"remember\" type=\"checkbox\">Considering buying property in the Wairarapa in the next 12 months.\n";
			$html .= "\t\t\t\t\t</label>\n";
			$html .= "\t\t\t\t\t<label for=\"remember\" class=\"pure-checkbox\">\n";
			$html .= "\t\t\t\t\t\t<input id=\"remember\" type=\"checkbox\">Considering selling property in the Wairarapa in the next 12 months.\n";
			$html .= "\t\t\t\t\t</label>\n";
			$html .= "\t\t\t\t\t<label for=\"remember\" class=\"pure-checkbox\">\n";
			$html .= "\t\t\t\t\t\t<input id=\"remember\" type=\"checkbox\">Just interested in keeping informed about local property market.\n";
			$html .= "\t\t\t\t\t</label>\n";
			$html .= "\t\t\t\t\t<button type=\"submit\" class=\"pure-button pure-button-primary\">Submit</button>\n";
			$html .= "\t\t\t\t</fieldset>\n";
			$html .= "\t\t\t</form>\n";
			$html .= "\t\t</div><!-- sub-wrapper2 -->\n";
			$html .= "\t</main><!-- wrapper -->\n";

			return $html;
		}
	}
?>



