<?php
	/*
	** This is the validate class for validating form based input.
	*/

	class Validate
	{
		private $noSymbolPattern;
		private $maxFileSize;
		private $allowedFileTypes;
		private $validFileType;

		public function __construct()
		{
			$this -> noSymbolPattern = '/^[a-zA-Z0-9:.,"“”?!@-\s\']*$/';
			$this -> maxFileSize = 2097152;
			$this -> allowedFileTypes = array('image/jpg', 'image/jpeg');
			$this -> validFileType = false;
			$this -> emailPattern = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
		}

		/*--------------------------------------------------- Public Methods ---------------------------------------------------*/
		
		public function name($string) // Validates the name passed in the parameter.
		{	
			if(is_string($string)) // Make sure the name is a string.
			{
				if(strlen($string) > 2) // Make sure the name is the minimum length.
				{
					if(strlen($string) < 50) // Make sure the name is below the maximum length.
					{
						if(preg_match($this -> noSymbolPattern, $string)) // Make sure name contains no special characters.
						{
							return array('success', 'The name passed is valid.');
						}
						else
						{
							return array('error', 'A name passed contains invalid symbols.');
						}
					}
					else
					{
						return array('error','A name passed is more than 35 characters long.');
					}
				}
				else
				{
					return array('error','A name passed is less than three characters.');
				}
			}
			else
			{
				return array('error','A name passed is not a string.');
			}
		}

		public function email($string) // Validates the description passed in the parameter.
		{
			if(is_string($string)) // Make sure the name is a string.
			{
				if(strlen($string) < 200) // Make sure the description length is less than the maximum number of characters.
				{
					if(strlen($string) > 3) // Make sure the description length is greater than 3 characters.
					{
						if(preg_match($this -> emailPattern, $string)) // Make sure name contains no special characters.
						{
							return array('success', 'The email passed is valid.');
						}
						else
						{
							return array('error', 'An invalid email address was entered.');
						}
					}
					else
					{

						return array('error', 'The minimum length for an email is 3 characters.');
					}
				}
				else
				{
					return array('error', 'The maximum length for an email is 200 characters.');
				}
			}
			else
			{
				return array('error', 'An email passed is not a string.');
			}
		}

		public function image($image) // Validates image object passed in the parameter.
		{
			$imageObjectValidated = array_key_exists('name', $image) && 
									array_key_exists('type', $image) && 
									array_key_exists('tmp_name', $image) && 
									array_key_exists('error', $image) && 
									array_key_exists('size', $image);

			if($imageObjectValidated) // If the image object recieved is in the correct format.
			{
				if($image['error'] != 4) // Make sure an image was selected before the form was submitted.
				{
					if($image['size'] < $this -> maxFileSize) // Filesize no greater than 2mb todo.
					{
						foreach ($this -> allowedFileTypes as $allowedFiletype) // Iterate through the filetypes allowed to match one to the current file.
						{
							if($image['type'] == $allowedFiletype) $this -> validFileType = true;
						}	

						if($this -> validFileType) // If the filetype matches one in the allowed array.
						{
							return array('success', 'This is a valid image for file upload.');
						}
						else
						{
							return array('error', 'The image you selected is not a valid filetype, this site only accepts JPEGs. You uploaded a '. $image['type'] . ' file.');
						}
					}
					else
					{
						return array('error', 'The image you selected is larger than 2mb. Maybe try an online image file minimizer.');
					}
				}
				else
				{
					return array('error', 'You didnt select an image for upload');
				}
			}
			else
			{
				return array('error', 'You didnt select an image for upload');
			}
		}
	}
?>