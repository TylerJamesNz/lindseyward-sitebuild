<?php
	/*
	** This base view for the HTML that is repeated on every page.
	*/

	abstract class BaseView
	{
		protected $data;

		function __construct($data) // Retrieves the page data.
		{
			// Variables
			$this -> data = $data;
		}

		// Html Generation Methods
		//----------------------------------------------
		abstract function display_head(); // Returns the compiled head HTML.
		
		private function display_header() // Returns the compiled header HTML.
		{
			$html = "";
			$html .= "<body>\n";
			$html .= "\t<header>\n";
			$html .= "\t\t<div class=\"wrapper\">\n";
			$html .= "\t\t\t<div id=\"menu-button\"><div class=\"menu-icon\"></div><p>Menu</p></div>\n";
			$html .= "\t\t\t<nav id=\"head-navigation\">\n";
			$html .= "\t\t\t\t<ul>\n";
			$html .= "\t\t\t\t\t<li><a href=\"home\" " . $this -> data['navStringHome'] . ">Home</a></li>\n";
			$html .= "\t\t\t\t\t<li><a href=\"testimonials\"  " . $this -> data['navStringTestimonials'] . ">Testimonials</a></li>\n";
			$html .= "\t\t\t\t\t<li><a href=\"recentlysold\"  " . $this -> data['navStringRecentlySold'] . ">Recently Sold</a></li>\n";
			$html .= "\t\t\t\t\t<li><a href=\"http://www.leaders.co.nz/agents/agent_listings.asp?id=1517\"  " . $this -> data['navStringListings'] . ">Listings</a></li>\n";
			$html .= "\t\t\t\t\t<li><a href=\"prizedraw\"  " . $this -> data['navStringPrizeDraw'] . ">Prize Draw</a></li>\n";
			$html .= "\t\t\t\t\t<li><a href=\"contact\"  " . $this -> data['navStringContact'] . ">Contact</a></li>\n";
			
			if($this -> data['access'] == 'admin')
			{
					$html .= "\t\t\t\t\t<li><a href=\"logout\">Logout</a></li>\n";			
			}
			$html .= "\t\t\t\t\t<div class=\"clear-floats\"></div>\n";
			$html .= "\t\t\t\t</ul>\n";
			$html .= "\t\t\t</nav><!-- head-navigation -->\n";
			$html .= "\t\t</div><!-- wrapper -->\n";
			$html .= "\t\t<div class=\"nav-divider\"></div>\n";
			$html .= "\t\t<div class=\"wrapper\">\n";
			$html .= "\t\t\t<div id=\"header-left\">\n";
			$html .= "\t\t\t\t<img id=\"header-image\" src=\"./img/ui/header-graphic.png\">\n";
			$html .= "\t\t\t</div><!-- header-left -->\n";
			$html .= "\t\t\t<div class=\"head-divider\"></div>\n";
			$html .= "\t\t\t<div id=\"header-right\">\n";
			$html .= "\t\t\t\t<p><em>LINDSEY WARD</em> LICENSED REAL ESTATE SALES CONSULTANT REAA 2008</p>\n";
			$html .= "\t\t\t\t<p class=\"address-text\">105 Main Street, Greytown <em>P</em> 06 3048688<br><em>M</em> 027 230 0598 <em>E</em> lward@leaders.co.nz</p>\n";
			$html .= "\t\t\t</div><!-- header-right -->\n";
			$html .= "\t\t\t<div class=\"clear-floats\"></div>\n";
			$html .= "\t\t</div><!-- wrapper -->\n";
			$html .= "\t\t<div class=\"content-divider\"></div>\n";
			$html .= "\t</header>\n";

			return $html;
		}

		abstract function display_slider(); // Returns the compiled slider HTML.

		abstract function display_main(); // Returns the compiled main content HTML.

		private function display_footer() // Returns compiled footer HTML.
		{
			$html = "";
			$html .= "\t<footer>\n";
			$html .= "\t\t<div class=\"wrapper\">\n";
			$html .= "\t\t\t<p>&copy; Lindsey Ward " . date("Y") . " | Designed by <a href=\"http://www.gregorystudio.com\">www.gregorystudio.com</a> | ";
			
			if($this -> data['access'] != 'admin') // If the admin is not currently logged in
			{
				$html .= "<a class=\"login-link\" href=\"login\">Login</a></p>\n";
			}
			else
			{
				$html .= "<a class=\"login-link\" href=\"" . $this -> data['page'] . "&amp;action=edit\">Edit</a> | <a class=\"login-link\" href=\"logout\">Logout</a></p>\n";
			}

			$html .= "\t\t<div class=\"wrapper\">\n";
			$html .= "\t</footer>\n";

			return $html;
		}

		private function display_scripts() // Returns the compiled javascript HTML for all pages.
		{
			$html = "";
			$html .= "\t<script>\n";
			$html .= "\t\tvar sliderContent = {\n";
			$html .= "\t\t\t0: {\n";
			$html .= "\t\t\t\t'header': 'LUXURY IN GREYTOWN',\n";
			$html .= "\t\t\t\t'address': '21a Westwood Avenue, Greytown',\n";
			$html .= "\t\t\t\t'amenities': '5 Bedrooms, 4 Bathrooms',\n";
			$html .= "\t\t\t\t'description': 'Treat yourself to absolute luxury resort style living in one of the Wairarapa\'s most sought after locations. 508m2 of clean lines and generous proportions - you will not find another home like this in the Wairarapa.'\n";
			$html .= "\t\t\t},\n";
			$html .= "\t\t\t1: {\n";
			$html .= "\t\t\t\t'header': 'THE BEST OF BOTH WORLDS',\n";
			$html .= "\t\t\t\t'address': '37 North Street, Greytown',\n";
			$html .= "\t\t\t\t'amenities': '4 Bedrooms, 3 Bathrooms',\n";
			$html .= "\t\t\t\t'description': 'Perfectly positioned on the edge of beautiful Greytown this property has so much to offer - with an uninterrupted rural outlook this home is still just a strill to the boutique shops and cafes.'\n";
			$html .= "\t\t\t},\n";
			$html .= "\t\t\t2: {\n";
			$html .= "\t\t\t\t'header': 'PERFECTLY PRIVATE',\n";
			$html .= "\t\t\t\t'address': '17B Westwood Avenue Greytown',\n";
			$html .= "\t\t\t\t'amenities': '3 Bedrooms, 2 Bathrooms',\n";
			$html .= "\t\t\t\t'description': 'Rare in Greytown this quality NEW home is hidden away with a gorgeous private garden. Open living areas and a chefs dream kitchen with ranch sliders leading up to a wraparound sunny deck all stack up to a relaxing summer.'\n";
			$html .= "\t\t\t}\n";
			$html .= "\t\t};\n";
			$html .= "\t</script>\n";
			$html .= "\t<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-1.10.2.min.js\"></script>\n";
			$html .= "\t<script type=\"text/javascript\" src=\"./js/menu.js\"></script>\n";
			$html .= "\t<script type=\"text/javascript\" src=\"./js/slider.js\"></script>\n";
		
			return $html;
		}

		private function display_close() // Closes any remaining tags that remain open in HTML.
		{
			$html = "";
			$html .= "</body>\n";
			$html .= "</html>\n";

			return $html;
		}

		public function display() // Retrieves all the HTML on this and extended views for display.
		{
			$html = "";
			$html .= $this -> display_head();
			$html .= $this -> display_header();
			$html .= $this -> display_slider();
			$html .= $this -> display_main();
			$html .= $this -> display_footer();
			$html .= $this -> display_scripts();
			$html .= $this -> display_close();
			
			return $html;
		}
	}
?>