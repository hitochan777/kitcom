<?php
namespace App\Controller\Admin;

use App\Controller\AppController;


/**
 * Groups Controller
 *
 * @property App\Model\Table\GroupsTable $Groups
 */
class GroupsController extends AppController {


	public function __construct($request = null ,$response = null,string $name = null){
		parent::__construct($request, $response, $name);	
		$this->loadModel("Groups");
	}

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$groups = $this->Groups->find('treeList');
		$this->set(compact("groups"));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$group = $this->Groups->get($id);
		$children = $this->Groups->find("children",["for"=>$id]);
		$parent = null;
		if($group->parent_id != 0){
			$parent = $this->Groups->ParentGroups->get($group->parent_id);
		}
		$this->set(compact("group","children","parent"));
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$group = $this->Groups->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Groups->save($group)) {
				$this->Flash->success('The group has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				debug($group);
				$this->Flash->error('The group could not be saved. Please, try again.');
			}
		}
		$list = $this->Groups->find('treeList');
		$this->set(compact('group', 'list'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$group = $this->Groups->get($id);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$group = $this->Groups->patchEntity($group, $this->request->data);
			if ($this->Groups->save($group)) {
				$this->Flash->success('The group has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The group could not be saved. Please, try again.');
			}
		}
		$list = $this->Groups->find('treeList')->where(["id !="=>$id]);
		$this->set(compact('group', 'list'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$group = $this->Groups->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Groups->delete($group)) {
			$this->Flash->success('The group has been deleted.');
		} else {
			$this->Flash->error('The group could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
