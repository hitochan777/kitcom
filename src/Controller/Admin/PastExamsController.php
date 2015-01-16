<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PastExams Controller
 *
 * @property App\Model\Table\PastExamsTable $PastExams
 */
class PastExamsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Modules', 'Users']
		];
		$this->set('pastExams', $this->paginate($this->PastExams));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$pastExam = $this->PastExams->get($id, [
			'contain' => ['Modules', 'Users', 'PastExamSolutions']
		]);
		$this->set('pastExam', $pastExam);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$pastExam = $this->PastExams->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->PastExams->save($pastExam)) {
				$this->Flash->success('The past exam has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The past exam could not be saved. Please, try again.');
			}
		}
		$modules = $this->PastExams->Modules->find('list');
		$users = $this->PastExams->Users->find('list');
		$this->set(compact('pastExam', 'modules', 'users'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$pastExam = $this->PastExams->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$pastExam = $this->PastExams->patchEntity($pastExam, $this->request->data);
			if ($this->PastExams->save($pastExam)) {
				$this->Flash->success('The past exam has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The past exam could not be saved. Please, try again.');
			}
		}
		$modules = $this->PastExams->Modules->find('list');
		$users = $this->PastExams->Users->find('list');
		$this->set(compact('pastExam', 'modules', 'users'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$pastExam = $this->PastExams->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->PastExams->delete($pastExam)) {
			$this->Flash->success('The past exam has been deleted.');
		} else {
			$this->Flash->error('The past exam could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
