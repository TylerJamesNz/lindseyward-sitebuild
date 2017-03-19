<?php 
	include './views/home_view.php';
	include 'base_controller.php';

	class HomeController extends BaseController {

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
			
			$this -> view = new HomeView($this -> data);
			$this -> displayView($this -> view);
		}

		private function getPageContent() // Generates the content array for the page.
		{
			$pageContent = array();
			$data_object = $this -> model -> get_home_data();

			foreach ($data_object as $data) // Iterate through the page data and assign the content to indexes.
			{
				if($data['name'] == 'front_header_1') $pageContent['header_1'] = htmlentities($data['content']);
				if($data['name'] == 'front_header_2') $pageContent['header_2'] = htmlentities($data['content']);
				if($data['name'] == 'front_content_1') $pageContent['content_1'] = htmlentities($data['content']);
				if($data['name'] == 'front_content_2') $pageContent['content_2'] = htmlentities($data['content']);
			}
			
			return $pageContent;
		}

		private function getFormData() // Gets the information required to populate the form.
		{
			$form = array();
			$form['stickyHeader1'] = $this -> data['content']['header_1'];
			$form['stickyHeader2'] = $this -> data['content']['header_2'];
			$form['stickyContent1'] = $this -> data['content']['content_1'];
			$form['stickyContent2'] = $this -> data['content']['content_2'];

			if(isset($_POST['heading1'])) $form['stickyHeader1'] = $_POST['heading1'];
			if(isset($_POST['heading2'])) $form['stickyHeader2'] = $_POST['heading2'];
			if(isset($_POST['content1'])) $form['stickyContent1'] = $_POST['content1'];
			if(isset($_POST['content2'])) $form['stickyContent2'] = $_POST['content2'];

			return $form;
		}

		private function runForm() // Runs the database functionality related to the form on this page.
		{
			if(isset($_POST['update'])) // If the form has been submitted.
			{
				$errorMessages = '';
				$messageArray = array();

				$headingValidation1 = $this -> validate -> heading($_POST['heading1']);
				$headingValidation2 = $this -> validate -> heading($_POST['heading2']);
				$contentValidation1 = $this -> validate -> content($_POST['content1']);
				$contentValidation2 = $this -> validate -> content($_POST['content2']);

				$validations = array($headingValidation1, $headingValidation2, $contentValidation1, $contentValidation2);
			
				foreach ($validations as $validation) // Iterate through the validation messages and add the errors to the message array.
				{
					if($validation[0] == 'error') $errorMessages .= $validation[1] . '</br>';
				}

				if($errorMessages == '') // If no errors are found return success message.
				{
					$messageArray = array('success', 'The page was successfully updated.');

					$this -> model -> update_homepage($_POST['heading1'], $_POST['heading2'], $_POST['content1'], $_POST['content2']);
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