<?php
/*
** This class performs the database interaction for the Lindsey Ward Site.
** This class extends the base model which contains all the database functions.
**
** Public Functions
** - connect() - Makes a connection to the database, returns false if failed or connection object if successful.
** - read( conHandle, query ) - Recieves a string based query and returns the results from the database or an array of errors if the query is bad.
** - write( conHandle, query ) - Writes to the database.
** - sanitize( variable ) // Sanitize a variable.
** - connect() - Makes a connection to the database.
*/
	include './classes/model.php';

	class LindseyModel extends Model
	{
		// Public Methods
		//----------------------------------------------

		public function get_home_data() // Retrieves all the info required to display the home page.
		{
			$connectionHandle = $this -> connect();
			$homeDataQuery = 'SELECT id, name, content FROM home';
			$homeData = $this -> read($connectionHandle, $homeDataQuery);

			return $homeData;
		}

		public function get_testimonials_data() // Retrieves all the info required to display the home page.
		{
			$connectionHandle = $this -> connect();
			$testimonialsDataQuery = 'SELECT id, name, content FROM testimonials';
			$testimonialsData = $this -> read($connectionHandle, $testimonialsDataQuery);

			return $testimonialsData;
		}

		public function get_recentlysold_data() // Retrieves all the info required to display the home page.
		{
			$connectionHandle = $this -> connect();
			$recentlySoldDataQuery = 'SELECT id, subheading, filename FROM recentlysold';
			$recentlySoldData = $this -> read($connectionHandle, $recentlySoldDataQuery);

			return $recentlySoldData;
		}
		
		public function update_homepage($heading1, $heading2, $content1, $content2) // If the edit homepage is submitted update the values.
		{
			$connectionHandle = $this -> connect();

			$heading1 = mysqli_real_escape_string($connectionHandle, $heading1);
			$heading2 = mysqli_real_escape_string($connectionHandle, $heading2);
			$content1 = mysqli_real_escape_string($connectionHandle, $content1);
			$content2 = mysqli_real_escape_string($connectionHandle, $content2);

			$homeDataQuery = "UPDATE home SET content='$heading1' WHERE name='front_header_1'";
			$this -> write($connectionHandle, $homeDataQuery);

			$homeDataQuery = "UPDATE home SET content='$heading2' WHERE name='front_header_2'";
			$this -> write($connectionHandle, $homeDataQuery);

			$homeDataQuery = "UPDATE home SET content='$content1' WHERE name='front_content_1'";
			$this -> write($connectionHandle, $homeDataQuery);

			$homeDataQuery = "UPDATE home SET content='$content2' WHERE name='front_content_2'";
			$this -> write($connectionHandle, $homeDataQuery);

			header('Location: ' . BASE_URL . '/home');
		}

		public function update_testimonials($leftColumn, $midColumn, $rightColumn) // If the edit testimonials is submitted update the values.
		{
			$connectionHandle = $this -> connect();

			$leftColumn = mysqli_real_escape_string($connectionHandle, $leftColumn);
			$midColumn = mysqli_real_escape_string($connectionHandle, $midColumn);
			$rightColumn = mysqli_real_escape_string($connectionHandle, $rightColumn);

			$testimonialsDataQuery = "UPDATE testimonials SET content='$leftColumn' WHERE name='left_column'";
			$this -> write($connectionHandle, $testimonialsDataQuery);

			$testimonialsDataQuery = "UPDATE testimonials SET content='$midColumn' WHERE name='mid_column'";
			$this -> write($connectionHandle, $testimonialsDataQuery);

			$testimonialsDataQuery = "UPDATE testimonials SET content='$rightColumn' WHERE name='right_column'";
			$this -> write($connectionHandle, $testimonialsDataQuery);

			header('Location: ' . BASE_URL . '/testimonials');
		}

		public function update_recentlysold($subheading, $filename) // If the edit testimonials is submitted update the values.
		{
			$connectionHandle = $this -> connect();

			$subheading = mysqli_real_escape_string($connectionHandle, $subheading);
			$filename = mysqli_real_escape_string($connectionHandle, $filename);

			$recentlySoldDataQuery = "INSERT INTO recentlysold (`id`, `subheading`, `filename`) VALUES (NULL, '$subheading', '$filename')";
			$this -> write($connectionHandle, $recentlySoldDataQuery);

			header('Location: ' . BASE_URL . '/recentlysold');
		}

		public function get_solditem_by_id($id) // Get the info for the item with the passed ID.
		{
			$connectionHandle = $this -> connect();
			$recentlySoldDataQuery = "SELECT id, subheading, filename FROM recentlysold WHERE id='$id'";
			$recentlySoldData = $this -> read($connectionHandle, $recentlySoldDataQuery);

			return $recentlySoldData;
		}

		public function delete_solditem_by_id($id) // Deletes an item matching the passed ID from the database.
		{
			$connectionHandle = $this -> connect();
			$deleteQuery = "DELETE FROM recentlysold WHERE id = '$id'";
			$deleteData = $this -> write($connectionHandle, $deleteQuery);

			return $deleteData;
		}

		public function currentURL() // Compiles the current page URL.
		{
	     	$pageURL = 'http';
	     	
	     	if ($_SERVER["HTTPS"] == "on") 
	     	{
	     		$pageURL .= "s";
	     	}
	     	
	     	$pageURL .= "://";
	     	
	     	if ($_SERVER["SERVER_PORT"] != "80") 
	     	{
	      		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	     	} 
	     	else 
	     	{
	      		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	     	}
	     	
	     	return $pageURL;
	    }
	}
?>