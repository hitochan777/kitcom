<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PastExamComments Controller
 *
 * @property App\Model\Table\PastExamCommentsTable $PastExamComments
 */
class PastExamCommentsController extends AppController {

	public function index() {
		$this->paginate = [
			'contain' => ['Users', 'PastExams']
		];
		$this->set('pastExamComments', $this->paginate($this->PastExamComments));
	}

	public function view($id = null) {
		$pastExamComment = $this->PastExamComments->get($id, [
			'contain' => ['Users', 'PastExams']
		]);
		$this->set('pastExamComment', $pastExamComment);
	}

	public function add() {
		$pastExamComment = $this->PastExamComments->newEntity($this->request->data);
		if($this->request->is("ajax")){
			$pastExamComment->user_id = $this->Auth->user("id");
			$comment = $this->PastExamComments->save($pastExamComment);
			$comment = $this->PastExamComments->get($comment->id,["contain"=>"Users"]);
			$this->set("comment",$comment);
			$this->set("userId",$this->Auth->user("id"));
			$this->render("comment","ajax");
		}
		else if ($this->request->is('post')) {
			if ($this->PastExamComments->save($pastExamComment)) {
				$this->Flash->success('The past exam comment has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The past exam comment could not be saved. Please, try again.');
			}
		}
		$users = $this->PastExamComments->Users->find('list');
		$pastExams = $this->PastExamComments->PastExams->find('list');
		$this->set(compact('pastExamComment', 'users', 'pastExams'));
	}

	public function edit($id = null) {
		$pastExamComment = $this->PastExamComments->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$pastExamComment = $this->PastExamComments->patchEntity($pastExamComment, $this->request->data);
			if ($this->PastExamComments->save($pastExamComment)) {
				$this->Flash->success('The past exam comment has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The past exam comment could not be saved. Please, try again.');
			}
		}
		$users = $this->PastExamComments->Users->find('list');
		$pastExams = $this->PastExamComments->PastExams->find('list');
		$this->set(compact('pastExamComment', 'users', 'pastExams'));
	}

	public function delete($id = null) {
		$pastExamComment = $this->PastExamComments->get($id);
		$this->request->allowMethod(['post', 'delete',"ajax"]);
		if ($this->PastExamComments->delete($pastExamComment)) {
			$this->Flash->success('The past exam comment has been deleted.');
		} else {
			$this->Flash->error('The past exam comment could not be deleted. Please, try again.');
		}
		if($this->request->is("ajax")){
			exit();	
		}
		return $this->redirect(['action' => 'index']);
	}
}
