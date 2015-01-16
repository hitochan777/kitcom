<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Error\NotFoundException;
use Cake\ORM\TableRegistry;

class TopsController extends AppController{

	public function __construct($request = null, $response = null, $name = null) {
		parent::__construct($request, $response, $name);
		$this->Updates = TableRegistry::get("Updates");	
	}

	public function index(){
		$updates = $this->Updates->find("all");
		$this->set(compact("updates"));
	}

	public function admin_index(){

	}

	public function beforeFilter(Event $event){
		parent::beforeFilter($event);
		$this->Auth->allow(["index"]);
	}

	public function beforeRender(Event $event){
		parent::beforeRender($event);
	}

}

?>
