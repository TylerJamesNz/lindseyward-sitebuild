<?php 
	include './views/contact_view.php';
	include 'base_controller.php';

	class ContactController extends BaseController {

		protected $model;
		protected $user;
		protected $view;
		protected $data;

		public function retrievePageData() // Retrieve all page data before view is loaded.
		{
			$this -> data['model'] = $this -> model;
			$this -> data['user'] = $this -> user;
			$this -> data['form'] = $this -> getFormData();
			$this -> data['messages'] = $this -> runForm();
			
			$this -> view = new ContactView($this -> data);
			$this -> displayView($this -> view);
		}

		private function getFormData() // Gets the information required to populate the form.
		{
			$form = array();
			$form['stickyName'] = '';
			$form['stickyEmail'] = '';
			$form['stickyMessage'] = '';

			if(isset($_POST['name'])) $form['stickyName'] = $_POST['name'];
			if(isset($_POST['email'])) $form['stickyEmail'] = $_POST['email'];
			if(isset($_POST['message'])) $form['stickyMessage'] = $_POST['message'];

			return $form;
		}

		private function runForm() // Runs the email functionality related to the form on this page.
		{
			if(isset($_POST['send'])) // If the form has been submitted.
			{
				$errorMessages = '';
				$messageArray = array();

				$nameValidation = $this -> validate -> name($_POST['name']);
				$emailValidation = $this -> validate -> email($_POST['email']);
				$messageValidation = $this -> validate -> message($_POST['message']);

				$validations = array($nameValidation, $emailValidation, $messageValidation);

				foreach ($validations as $validation) // Iterate through the validation messages and add the errors to the message array.
				{
					if($validation[0] == 'error') $errorMessages .= $validation[1] . '</br>';
				}

				if($errorMessages == '') // If no errors are found return success message.
				{
					$subject = 'New message on the Lindsey Ward website from ' . $_POST['name'];
					$header = 'From: ' . $_POST['email'];
					$message = $_POST['message'] . "\n\nEmail provided: " . $_POST['email'];
					
					if(mail(ADMIN_EMAIL, $subject, $message, $header)) // If the mail successfully sends.
					{
						$messageArray = array('success', 'The message was sent to the admin.');
					}
					else
					{
						$messageArray = array('error', 'Something went wrong with the mail function.');
					}
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