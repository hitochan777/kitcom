<?php
namespace App\Controller;

use App\Controller\AppController;

class PastExamSolutionCommentsController extends AppController {

	public function index() {
		$this->paginate = [
			'contain' => ['Users', 'PastExamSolutions']
		];
		$this->set('pastExamSolutionComments', $this->paginate($this->PastExamSolutionComments));
	}

	public function view($id = null) {
		$pastExamSolutionComment = $this->PastExamSolutionComments->get($id, [
			'contain' => ['Users', 'PastExamSolutions']
		]);
		$this->set('pastExamSolutionComment', $pastExamSolutionComment);
	}

	public function add() {
		$pastExamSolutionComment = $this->PastExamSolutionComments->newEntity($this->request->data);
		if($this->request->is("ajax")){
			$pastExamSolutionComment->user_id = $this->Auth->user("id");
			//debug($this->request->data);
			//debug($pastExamSolutionComment);
			$comment = $this->PastExamSolutionComments->save($pastExamSolutionComment);
			$comment = $this->PastExamSolutionComments->get($comment->id,["contain"=>"Users"]);
			$this->set("comment",$comment);
			$this->set("userId",$this->Auth->user("id"));
			$this->render("comment","ajax");
		}
		else if ($this->request->is('post')) {
			$pastExamSolutionComment->user_id = $this->Auth->user("id");
			if ($this->PastExamSolutionComments->save($pastExamSolutionComment)) {
				$this->Flash->success('The past exam solution comment has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The past exam solution comment could not be saved. Please, try again.');
			}
		}

		$users = $this->PastExamSolutionComments->Users->find('list');
		$pastExamSolutions = $this->PastExamSolutionComments->PastExamSolutions->find('list');
		$this->set(compact('pastExamSolutionComment', 'users', 'pastExamSolutions'));
	}

	public function edit($id = null) {
		$pastExamSolutionComment = $this->PastExamSolutionComments->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$pastExamSolutionComment = $this->PastExamSolutionComments->patchEntity($pastExamSolutionComment, $this->request->data);
			if ($this->PastExamSolutionComments->save($pastExamSolutionComment)) {
				$this->Flash->success('The past exam solution comment has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The past exam solution comment could not be saved. Please, try again.');
			}
		}
		$users = $this->PastExamSolutionComments->Users->find('list');
		$pastExamSolutions = $this->PastExamSolutionComments->PastExamSolutions->find('list');
		$this->set(compact('pastExamSolutionComment', 'users', 'pastExamSolutions'));
	}

	public function delete($id = null) {
		$pastExamSolutionComment = $this->PastExamSolutionComments->get($id);
		$this->request->allowMethod(['post', 'delete',"ajax"]);
		if ($this->PastExamSolutionComments->delete($pastExamSolutionComment)) {
			$this->Flash->success('The past exam solution comment has been deleted.');
		} else {
			$this->Flash->error('The past exam solution comment could not be deleted. Please, try again.');
		}
		if($this->request->is("ajax")){
			exit();	
		}
		return $this->redirect(['action' => 'index']);
	}
}
