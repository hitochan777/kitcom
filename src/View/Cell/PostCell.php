<?php
namespace App\View\Cell;

use Cake\View\Cell;

class PostCell extends Cell {

	protected $_validCellOptions = [];

	public function __construct($request, $response, $eventManager, $cellOptions){
		parent::__construct($request, $response, $eventManager, $cellOptions);
		$this->loadModel("Posts");		
	}


	public function add($options = []) {
		$post = $this->Posts->newEntity($this->request->data);
		$modules = $this->Posts->Modules->find('list');
		$this->set(compact("post", "modules", "options"));
	}

	public function edit(){
		$post = $this->Posts->newEntity($this->request->data);
		$users = $this->Posts->Users->find("list");
		$modules = $this->Posts->Modules->find("list");
		$this->set(compact("post", "modules", "options"));
	}

}
