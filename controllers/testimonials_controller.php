<?php 
	include './views/testimonials_view.php';
	include 'base_controller.php';

	class TestimonialsController extends BaseController {

		protected $model;
		protected $user;
		protected $view;
		protected $data;

		public function retrievePageData() // Retrieve all page data before view is loaded.
		{
			$this -> data['model'] = $this -> model;
			$this -> data['user'] = $this -> user;
			$this -> data['content'] = $this -> getPageContent();
			$this -> data['form'] = $this -> getFormData();
			$this -> data['messages'] = $this -> runForm();
			
			$this -> view = new TestimonialsView($this -> data);
			$this -> displayView($this -> view);
		}

		private function getPageContent() // Generates the content array for the page.
		{
			$pageContent = array();
			$data_object = $this -> model -> get_testimonials_data();

			foreach ($data_object as $data) // Iterate through the page data and assign the content to indexes.
			{
				if($data['name'] == 'left_column') $pageContent['left_column'] = htmlentities($data['content']);
				if($data['name'] == 'mid_column') $pageContent['mid_column'] = htmlentities($data['content']);
				if($data['name'] == 'right_column') $pageContent['right_column'] = htmlentities($data['content']);
			}
			
			return $pageContent;
		}

		private function getFormData() // Gets the information required to populate the form.
		{
			$form = array();
			$form['stickyLeftColumn'] = $this -> data['content']['left_column'];
			$form['stickyMidColumn'] = $this -> data['content']['mid_column'];
			$form['stickyRightColumn'] = $this -> data['content']['right_column'];

			if(isset($_POST['leftColumn'])) $form['stickyLeftColumn'] = $_POST['leftColumn'];
			if(isset($_POST['midColumn'])) $form['stickyMidColumn'] = $_POST['midColumn'];
			if(isset($_POST['rightColumn'])) $form['stickyRightColumn'] = $_POST['rightColumn'];

			return $form;
		}

		private function runForm() // Runs the database functionality related to the form on this page.
		{
			if(isset($_POST['update'])) // If the form has been submitted.
			{
				$errorMessages = '';
				$messageArray = array();

				$leftColumnValidation = $this -> validate -> content($_POST['leftColumn']);
				$midColumnValidation = $this -> validate -> content($_POST['midColumn']);
				$rightColumnValidation = $this -> validate -> content($_POST['rightColumn']);

				$validations = array($leftColumnValidation, $midColumnValidation, $rightColumnValidation);
			
				foreach ($validations as $validation) // Iterate through the validation messages and add the errors to the message array.
				{
					if($validation[0] == 'error') $errorMessages .= $validation[1] . '</br>';
				}

				if($errorMessages == '') // If no errors are found return success message.
				{
					$messageArray = array('success', 'The page was successfully updated.');

					$this -> model -> update_testimonials($_POST['leftColumn'], $_POST['midColumn'], $_POST['rightColumn']);
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