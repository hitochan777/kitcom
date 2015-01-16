<?php
namespace App\Controller\admin;

use App\Controller\AppController;

/**
 * ClassRooms Controller
 *
 * @property App\Model\Table\ClassRoomsTable $ClassRooms
 */
class ClassRoomsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('classRooms', $this->paginate($this->ClassRooms));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$classRoom = $this->ClassRooms->get($id, [
			'contain' => ['TimeTables']
		]);
		$this->set('classRoom', $classRoom);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$classRoom = $this->ClassRooms->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->ClassRooms->save($classRoom)) {
				$this->Flash->success('The class room has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The class room could not be saved. Please, try again.');
			}
		}
		$this->set(compact('classRoom'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$classRoom = $this->ClassRooms->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$classRoom = $this->ClassRooms->patchEntity($classRoom, $this->request->data);
			if ($this->ClassRooms->save($classRoom)) {
				$this->Flash->success('The class room has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The class room could not be saved. Please, try again.');
			}
		}
		$this->set(compact('classRoom'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$classRoom = $this->ClassRooms->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->ClassRooms->delete($classRoom)) {
			$this->Flash->success('The class room has been deleted.');
		} else {
			$this->Flash->error('The class room could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
