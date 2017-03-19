<?php
	/*
	**	This page extends the base_view and inherits all the page data.
	*/
	include 'base_view.php';

	class ContactView extends BaseView
	{
		protected $data;
		
		public function display_head() // Returns the compiled head HTML.
		{
			$html = "";
			$html .= "<!DOCTYPE HTML>\n";
			$html .= "<html>\n";
			$html .= "<head>\n";
			$html .= "\t<title>Lindsey Ward - Contact</title>\n";
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
			$html .= "\t\t\t<h3>Contact</h3>\n";
			$html .= "\t\t\t<form class=\"pure-form pure-form-stacked\" action=\"" . $_SERVER['REQUEST_URI'] . "\" method=\"POST\">\n";
			$html .= "\t\t\t\t<fieldset>\n";
			$html .= "\t\t\t\t\t<label for=\"name\">Name:</label>\n";
			$html .= "\t\t\t\t\t<input id=\"name\" class=\"pure-input-1\" type=\"text\" placeholder=\"John Doe\" name=\"name\" value=\"" . $this -> data['form']['stickyName'] . "\">\n";
			$html .= "\t\t\t\t\t<label for=\"email\">E-Mail:</label>\n";
			$html .= "\t\t\t\t\t<input id=\"email\" class=\"pure-input-1\" type=\"email\" placeholder=\"johndoe@gmail.com\" name=\"email\" value=\"" . $this -> data['form']['stickyEmail'] . "\">\n";
			$html .= "\t\t\t\t\t<label for=\"message\">Message:</label>\n";
			$html .= "\t\t\t\t\t<textarea id=\"message\" class=\"pure-input-1\" type=\"text\" placeholder=\"Your message here...\" rows=\"12\" name=\"message\">" . $this -> data['form']['stickyMessage'] . "</textarea>\n";

			if($this -> data['messages'][0] == 'success') // If no error messages are returned.
			{
				$html .= "\t\t\t\t\t<div class=\"success-message\">" . $this -> data['messages'][1] . "</div>\n";
			}
			else if($this -> data['messages'][0] == 'error') // If an error is returned.
			{
				$html .= "\t\t\t\t\t<div class=\"error-message\">" . $this -> data['messages'][1] . "</div>\n";
			}
			
			$html .= "\t\t\t\t\t<button type=\"submit\" class=\"pure-button pure-button-primary\" name=\"send\">Send</button>\n";
			$html .= "\t\t\t\t</fieldset>\n";
			$html .= "\t\t\t</form>\n";
			$html .= "\t\t</div><!-- col-1-2 -->\n";
			$html .= "\t\t<div class=\"col-1-2\">\n";
			$html .= "\t\t\t<h3>Location</h3>\n";
			$html .= "\t\t\t<iframe width=\"85%\" height=\"230\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.co.nz/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=105+main+st&amp;aq=&amp;sll=-41.080467,175.460313&amp;sspn=0.00181,0.003484&amp;ie=UTF8&amp;hq=&amp;hnear=105+Main+St,+Greytown+5712&amp;t=m&amp;ll=-41.080645,175.460415&amp;spn=0.019409,0.036049&amp;z=14&amp;iwloc=A&amp;output=embed\"></iframe>\n";
			$html .= "\t\t</div><!-- col-1-2 -->\n";
			$html .= "\t\t<div class=\"clear-floats\"></div>\n";
			$html .= "\t</main><!-- wrapper -->\n";

			return $html;
		}
	}
?>



