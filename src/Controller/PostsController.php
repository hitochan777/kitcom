<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Posts Controller
 *
 * @property App\Model\Table\PostsTable $Posts
 */
class PostsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Users', 'Modules']
		];
		$this->set('posts', $this->paginate($this->Posts));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function view($id = null) {
		$post = $this->Posts->get($id, [
			'contain' => ['Users', 'Modules']
		]);
		$this->set('post', $post);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$this->request->data["user_id"] = $this->Auth->user("id");
		$post = $this->Posts->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Posts->save($post)) {
				$this->Flash->success('The post has been saved.');
				if($this->request->data("to_referer")){
					return $this->redirect($this->referer());
				}
				else{
					return $this->redirect(['action' => 'index']);
				}
			} else {
				$this->Flash->error('The post could not be saved. Please, try again.');
				if($this->request->data("to_referer")){
					return $this->redirect($this->referer());
				}
			}
		}
		$users = $this->Posts->Users->find('list');
		$modules = $this->Posts->Modules->find('list');
		$this->set(compact('post', 'users', 'modules'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$post = $this->Posts->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$post = $this->Posts->patchEntity($post, $this->request->data);
			if ($this->Posts->save($post)) {
				$this->Flash->success('The post has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The post could not be saved. Please, try again.');
			}
		}
		$users = $this->Posts->Users->find('list');
		$modules = $this->Posts->Modules->find('list');
		$this->set(compact('post', 'users', 'modules'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws NotFoundException
 */
	public function delete($id = null) {
		$post = $this->Posts->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Posts->delete($post)) {
			$this->Flash->success('The post has been deleted.');
		} else {
			$this->Flash->error('The post could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
