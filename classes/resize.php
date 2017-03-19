<?php
/*
** This class is responsible for resizing files to match the dimensions of the site..
**
** Public Functions
** - image( imagePath:String, newPath:String, newDimensionX:Number, newDimensionY:Number ) - Resizes an image to the dimensions passed.
**
** Private functions
** - createTempImage( $imagePath:String, $type:String ) - Creates a tempoary image file for use with the image image function.
*/

	class Resize
	{

		/*--------------------------------------------------- Public Methods ---------------------------------------------------*/

		public function image($imagePath, $newPath, $newDimensionX, $newDimensionY) // Resizes an image to the dimensions passed, returns success message if successful and error message if failed.
		{
			if(file_exists($imagePath)) // If the image for resize exists.
			{
				$imageProperties = getimagesize($imagePath); // Despite unusual naming conventions getimagesize returns the array [width, height, imageTypeConstant, imageTagDimensionStringXY, imageType];
				
				$originalWidth = $imageProperties[0];
				$originalHeight = $imageProperties[1];
				
				$imageType = $imageProperties['mime'];
				$imageType = explode('/', $imageType);
				$imageType = $imageType[1]; // Get the extension of the image.

				$createTempImage = $this -> createTempImage($imagePath, $imageType);

				if($createTempImage != 'errors') // If there are no errors creating a tempoary image with he passed file.
				{
					$createNewImageCanvas = ImageCreateTrueColor($newDimensionX, $newDimensionY); // Create an empty canvas image in the dimension of the new image to be created.

					if($createNewImageCanvas) // If a new resized blank canvas was created.
					{
						$resizeImageCreation = imagecopyresampled($createNewImageCanvas, $createTempImage, 0, 0, 0, 0, $newDimensionX, $newDimensionY, $originalWidth, $originalHeight);

						if($resizeImageCreation) // If The new resized image was applied to the blank canvas.
						{
							$moveResizedFile = imageJpeg($createNewImageCanvas, $newPath);

							if($moveResizedFile) // If the newly resized image is succsessfully moved to the path specified.
							{
								return array('success', 'Your resized image was successfully created and moved to " ' . $newPath . ' "');
							}
							else
							{
								return array('errors', 'The function resize image had trouble moving your new image to the specified folder "' . $newPath . '"');
							}
						}
						else
						{
							return array('errors', 'The resize image function encountered and error with the function imagecopyresampled()');
						}
					}
					else
					{
						return array('errors', 'The resize image function encountered and error with the function ImageCreateTrueColor()');
					}
				}
				else
				{
					return array('errors', $createTempImage[1]);
				}
			}
			else
			{
				return array('errors', 'The image you passed for resize doesnt exist or could not be found.');
			}
		}

		/*--------------------------------------------------- Private Methods ---------------------------------------------------*/

		private function createTempImage($imagePath, $type) // Creates a tempoary image file with the passed filepath.
		{
			switch(strtolower($type)) // Check the extension of the image to determine which image to return.
			{
				case 'gif':
					return ImageCreateFromGif($imagePath);
					break;

				case 'png':
					return ImageCreateFromPng($imagePath);
					break;

				case 'jpg':
					return ImageCreateFromJpeg($imagePath);
					break;

				case 'jpeg':
					return ImageCreateFromJpeg($imagePath);
					break;

				default:
					return array('error', 'The function of the resize class "createTempImage()" recived an invalid filetype.');
					break;
			}
		}
	}
?>