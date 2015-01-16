<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Semesters Controller
 *
 * @property App\Model\Table\SemestersTable $Semesters
 */
class SemestersController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('semesters', $this->paginate($this->Semesters));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$semester = $this->Semesters->get($id, [
			'contain' => []
		]);
		$this->set('semester', $semester);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$semester = $this->Semesters->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Semesters->save($semester)) {
				$this->Flash->success('The semester has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The semester could not be saved. Please, try again.');
			}
		}
		$this->set(compact('semester'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$semester = $this->Semesters->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$semester = $this->Semesters->patchEntity($semester, $this->request->data);
			if ($this->Semesters->save($semester)) {
				$this->Flash->success('The semester has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The semester could not be saved. Please, try again.');
			}
		}
		$this->set(compact('semester'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$semester = $this->Semesters->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Semesters->delete($semester)) {
			$this->Flash->success('The semester has been deleted.');
		} else {
			$this->Flash->error('The semester could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
