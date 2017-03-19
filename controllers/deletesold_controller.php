<?php 
	include 'base_controller.php';

	class DeleteSoldController extends BaseController {

		protected $model;
		protected $user;
		protected $view;
		protected $data;

		public function retrievePageData() // Retrieve all page data before view is loaded.
		{
			if(isset($_POST['delete']))
			{
				$itemForDeletion = $this -> model -> get_solditem_by_id($_POST['delete']);
				
				if($itemForDeletion[0] != 'errors') // If the item for deletion is successfully retrieved.
				{
					unlink('./img/sold_resized/' . $itemForDeletion[0]['filename']);
					unlink('./img/sold_original/' . $itemForDeletion[0]['filename']);

					$this -> model -> delete_solditem_by_id($_POST['delete']);
				}
			}

			header('Location: ' . BASE_URL . '/recentlysold');
		}
	}
?>