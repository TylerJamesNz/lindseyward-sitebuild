<?php 
	include './views/recentlysold_view.php';
	include 'base_controller.php';
	include './classes/resize.php';

	class RecentlySoldController extends BaseController {

		protected $model;
		protected $user;
		protected $view;
		protected $data;
		protected $resize;

		public function retrievePageData() // Retrieve all page data before view is loaded.
		{
			$this -> resize = new Resize();

			$this -> data['model'] = $this -> model;
			$this -> data['user'] = $this -> user;
			$this -> data['content'] = $this -> getPageContent();
			$this -> data['form'] = $this -> getFormData();
			$this -> data['messages'] = $this -> runForm();
			
			$this -> view = new RecentlySoldView($this -> data);
			$this -> displayView($this -> view);
		}

		private function getPageContent() // Generates the content array for the page.
		{
			$pageContent = array();
			$data_object = $this -> model -> get_recentlysold_data();

			if($data_object[0] != 'errors') // If data exists.
			{
				foreach ($data_object as $key => $data) // Iterate through the page data and assign the content to indexes.
				{
					$pageContent['solditems'][$key]['id'] = $data['id'];
					$pageContent['solditems'][$key]['subheading'] = htmlentities($data['subheading']);
					$pageContent['solditems'][$key]['filename'] = htmlentities($data['filename']);
				}
			}
			else
			{
				return array('error', 'No sold items exist on the database.');
			}
			
			return $pageContent;
		}

		private function getFormData() // Gets the information required to populate the form.
		{
			$form = array();

			$form['stickySubheading'] = '';

			if(isset($_POST['subheading'])) $form['stickySubheading'] = $_POST['subheading'];

			return $form;
		}

		private function runForm() // Runs the database functionality related to the form on this page.
		{
			if(isset($_POST['upload'])) // If the form has been submitted.
			{
				$errorMessages = '';
				$subheading = '';
				$messageArray = array();
				$soldImage = $_FILES['soldimage'];

				if(isset($_POST['subheading'])) $subheading = $_POST['subheading'];

				$subheadingValidation = $this -> validate -> heading($subheading);
				$filenameValidation = $this -> validate -> image($soldImage);

				$validations = array($subheadingValidation, $filenameValidation);

				foreach ($validations as $validation) // Iterate through the validation messages and add the errors to the message array.
				{
					if($validation[0] == 'error') $errorMessages .= $validation[1] . '</br>';
				}

				if($errorMessages == '') // If no errors are found return success message.
				{
					$messageArray = array('success', 'Your image and subheading was succsessfully uploaded.');
					
					$pictureFileName = preg_replace('/[^A-Za-z0-9-_]/', '', $subheading) . '.jpg'; // Remove all symbols from filename to prevent corruption of file.
					$targetImagePath = 'img/sold_original/' . $pictureFileName;
					$targetResizedImagePath = 'img/sold_resized/' . $pictureFileName;
					$imageWidth = 370;
					$imageHeight = 225;

					move_uploaded_file($_FILES['soldimage']['tmp_name'], $targetImagePath); // Upload the image to the server.

					$this -> resize -> image($targetImagePath, $targetResizedImagePath, $imageWidth, $imageHeight); // Upload a resized image version to the server.

					$this -> model -> update_recentlysold($_POST['subheading'], $pictureFileName);
				}
				else
				{
					$messageArray = array('error', $errorMessages);
				}

				return $messageArray;
			}
		}
	}
?>