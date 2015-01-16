<?php
namespace App\View\Cell;

use Cake\View\Cell;

class NavbarCell extends Cell {
	public function display($userId){
		$user = false;		
		if($userId){
			$this->loadModel("Users");
			$user = $this->Users->get($userId);
		}
		$this->set(compact("user"));
	}
}

?>
