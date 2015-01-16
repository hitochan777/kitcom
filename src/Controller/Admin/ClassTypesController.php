<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ClassTypes Controller
 *
 * @property App\Model\Table\ClassTypesTable $ClassTypes
 */
class ClassTypesController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('classTypes', $this->paginate($this->ClassTypes));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$classType = $this->ClassTypes->get($id, [
			'contain' => []
		]);
		$this->set('classType', $classType);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$classType = $this->ClassTypes->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->ClassTypes->save($classType)) {
				$this->Flash->success('The class type has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The class type could not be saved. Please, try again.');
			}
		}
		$this->set(compact('classType'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$classType = $this->ClassTypes->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$classType = $this->ClassTypes->patchEntity($classType, $this->request->data);
			if ($this->ClassTypes->save($classType)) {
				$this->Flash->success('The class type has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The class type could not be saved. Please, try again.');
			}
		}
		$this->set(compact('classType'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$classType = $this->ClassTypes->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->ClassTypes->delete($classType)) {
			$this->Flash->success('The class type has been deleted.');
		} else {
			$this->Flash->error('The class type could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
