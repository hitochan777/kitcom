<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PastExamSolutions Controller
 *
 * @property App\Model\Table\PastExamSolutionsTable $PastExamSolutions
 */
class PastExamSolutionsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Users', 'PastExams']
		];
		$this->set('pastExamSolutions', $this->paginate($this->PastExamSolutions));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$pastExamSolution = $this->PastExamSolutions->get($id, [
			'contain' => ['Users', 'PastExams']
		]);
		$this->set('pastExamSolution', $pastExamSolution);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$pastExamSolution = $this->PastExamSolutions->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->PastExamSolutions->save($pastExamSolution)) {
				$this->Flash->success('The past exam solution has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The past exam solution could not be saved. Please, try again.');
			}
		}
		$users = $this->PastExamSolutions->Users->find('list');
		$pastExams = $this->PastExamSolutions->PastExams->find('list');
		$this->set(compact('pastExamSolution', 'users', 'pastExams'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$pastExamSolution = $this->PastExamSolutions->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$pastExamSolution = $this->PastExamSolutions->patchEntity($pastExamSolution, $this->request->data);
			if ($this->PastExamSolutions->save($pastExamSolution)) {
				$this->Flash->success('The past exam solution has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The past exam solution could not be saved. Please, try again.');
			}
		}
		$users = $this->PastExamSolutions->Users->find('list');
		$pastExams = $this->PastExamSolutions->PastExams->find('list');
		$this->set(compact('pastExamSolution', 'users', 'pastExams'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$pastExamSolution = $this->PastExamSolutions->get($id);
		$this->request->allowMethod(['post', 'delete']);
		if ($this->PastExamSolutions->delete($pastExamSolution)) {
			$this->Flash->success('The past exam solution has been deleted.');
		} else {
			$this->Flash->error('The past exam solution could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
