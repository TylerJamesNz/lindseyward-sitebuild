<?php
	/*
	** This is the validate specific to the Lindsey Ward site it extends teh base validate class.
	*/
	include 'validate.php';

	class LindseyValidate extends Validate
	{
		private $noSymbolPattern;
		private $maxFileSize;
		private $allowedFileTypes;
		private $validFileType;

		/*--------------------------------------------------- Public Methods ---------------------------------------------------*/
		
		public function heading($string) // Validates the name passed in the parameter.
		{	
			if(is_string($string)) // Make sure the name is a string.
			{
				if(strlen($string) > 2) // Make sure the name is the minimum length.
				{
					if(strlen($string) < 50) // Make sure the name is below the maximum length.
					{
						if(preg_match($this -> noSymbolPattern, $string)) // Make sure name contains no special characters.
						{
							return array('success', 'The heading passed is valid.');
						}
						else
						{
							return array('error', 'A heading passed contains invalid symbols.');
						}
					}
					else
					{
						return array('error','A heading passed is more than 35 characters long.');
					}
				}
				else
				{
					return array('error','A heading passed is less than three characters.');
				}
			}
			else
			{
				return array('error','A heading passed is not a string.');
			}
		}

		public function content($string) // Validates the description passed in the parameter.
		{
			if(is_string($string)) // Make sure the name is a string.
			{
				if(strlen($string) < 700) // Make sure the description length is less than the maximum number of characters.
				{
					if(strlen($string) > 9) // Make sure the description length is greater than 3 characters.
					{ 
						return array('success', 'The description passed is valid.');
					}
					else
					{
						return array('error', 'The minimum length for a description is 10 characters.');
					}
				}
				else
				{
					return array('error', 'The maximum length for a description is 700 characters.');
				}
			}
			else
			{
				return array('error', 'A description passed is not a string.');
			}
		}

		public function message($string) // Validates the description passed in the parameter.
		{
			if(is_string($string)) // Make sure the name is a string.
			{
				if(strlen($string) < 700) // Make sure the description length is less than the maximum number of characters.
				{
					if(strlen($string) > 9) // Make sure the description length is greater than 3 characters.
					{ 
						return array('success', 'The message passed is valid.');
					}
					else
					{
						return array('error', 'The minimum length for a message is 10 characters.');
					}
				}
				else
				{
					return array('error', 'The maximum length for a message is 700 characters.');
				}
			}
			else
			{
				return array('error', 'A message passed is not a string.');
			}
		}
	}
?>