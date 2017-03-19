<?php
/*
** This class is responsible for all interactions with the database.
**
** Public Functions
** - connect() - Makes a connection to the database, returns false if failed or connection object if successful.
** - read( conHandle, query ) - Recieves a string based query and returns the results from the database or an array of errors if the query is bad.
** - write( conHandle, query ) - Writes to the database.
** - sanitize( variable ) // Sanitize a variable.
** - connect() - Makes a connection to the database.
*/

	class Model
	{
		private $dbHost;
		private $user;
		private $dbPass;
		private $dbTable;

		function __construct($dbHost, $dbUser, $dbPass, $database) // recieves database info.
		{
			$this -> dbHost = $dbHost;
			$this -> dbUser = $dbUser;
			$this -> dbPass = $dbPass;
			$this -> database = $database;
		}

		// Public Methods
		//----------------------------------------------

		public function read($connectionHandle, $query) // Reads from the database.
		{
			$connection = $connectionHandle; // Retrieves the connection to the database from the connect function.

			if(!$connection == false) // If the connection to the database is unsuccessful.
			{
				$queryResult = mysqli_query($connection, $query); // Execute the provided query on the database, 

				if(!$queryResult) // if the query is unsuccsesful or the returned page is empty return an error, 
				{
					$errors = array('errors', 'This page had a problem finding the requested information on the server');
					return $errors;
					die();
				}
				else // else return query results.
				{ 
					$resultArray = array();
					
					while($row = mysqli_fetch_assoc($queryResult)) // Produce an associative array of results
					{
						$resultArray[] = $row;
					}
					
					if(!empty($resultArray)) // Check the returned results arent empty.
					{
						return $resultArray; // Return the results. 
					}
					else // else return the errors.
					{
						return array('errors', 'The model has no result to your read() query'); // Eles return an empty query result error.
					}
					
				}
			}
			else // Else if the connction to the database returned false with the provided details.
			{ 
				return array('errors', 'This page recieved an error while trying to query the database: ' . $queryResult->connect_error);
			}
		}
		
		public function write($connectionHandle, $query) // Writes to the database.
		{
			$connection = $connectionHandle;
			
			if(!$connection == false) // If the connection to the database is unsuccessful.
			{
				$queryResult = mysqli_query($connection, $query);

				if($connection -> affected_rows > 0) // If the query performed successfully inserted a row.
				{
					return array ('success', 'Your information was successfully added to the server.');
				}
				else
				{
					return array('errors', 'This page encountered an error editing your information on the server.');
				}
			} 
			else
			{
				return array('errors', 'This page recieved an error while trying to write your information to the database: ' . $queryResult->connect_error);
			}

		}

		public function connect() // Makes a connection to the database.
		{
			$connection = mysqli_connect($this -> dbHost, $this -> dbUser, $this -> dbPass, $this -> database);
			if (mysqli_connect_errno()) //  returns false if failed else connection object if successful.
			{
				return false;
				exit();
			}else{
				return $connection;
			}
		}

		public function sanitize($variable) // Sanitize a variable.
		{
			return mysqli_real_escape_string($variable);
		}
	}
?>