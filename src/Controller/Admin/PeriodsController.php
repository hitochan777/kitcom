<?php
namespace App\Controller\admin;

use App\Controller\AppController;

/**
 * Periods Controller
 *
 * @property App\Model\Table\PeriodsTable $Periods
 */
class PeriodsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('periods', $this->paginate($this->Periods));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$period = $this->Periods->get($id, [
			'contain' => ['TimeTables']
		]);
		$this->set('period', $period);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$period = $this->Periods->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Periods->save($period)) {
				$this->Flash->success("データは正常に保存されました。");
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error("データの保存に失敗しました。もう一度お試しください。");
			}
		}
		$this->set(compact('period'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$period = $this->Periods->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$period = $this->Periods->patchEntity($period, $this->request->data);
			if ($this->Periods->save($period)) {
				$this->Flash->success('The period has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The period could not be saved. Please, try again.');
			}
		}
		$this->set(compact('period'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$period = $this->Periods->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Periods->delete($period)) {
			$this->Flash->success('The period has been deleted.');
		} else {
			$this->Flash->error('The period could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
