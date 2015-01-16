<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Modules Controller
 *
 * @property App\Model\Table\ModulesTable $Modules
 */
class ModulesController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Groups', 'ClassTypes']
		];
		$this->set('modules', $this->paginate($this->Modules));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$module = $this->Modules->get($id, [
			'contain' => ['Groups', 'ClassTypes', 'TimeTables', 'Posts']
		]);
		$this->set('module', $module);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$module = $this->Modules->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Modules->save($module)) {
				$this->Flash->success('The module has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The module could not be saved. Please, try again.');
			}
		}
		$groups = $this->Modules->Groups->find('list');
		$classTypes = $this->Modules->ClassTypes->find('list');
		$this->set(compact('module', 'groups', 'classTypes'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$module = $this->Modules->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$module = $this->Modules->patchEntity($module, $this->request->data);
			if ($this->Modules->save($module)) {
				$this->Flash->success('The module has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The module could not be saved. Please, try again.');
			}
		}
		$groups = $this->Modules->Groups->find('list');
		$classTypes = $this->Modules->ClassTypes->find('list');
		$this->set(compact('module', 'groups', 'classTypes'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$module = $this->Modules->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Modules->delete($module)) {
			$this->Flash->success('The module has been deleted.');
		} else {
			$this->Flash->error('The module could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
