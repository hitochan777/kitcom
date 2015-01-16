<?php
namespace App\Controller;

use App\Controller\AppController;
use \CakePdf\Pdf\CakePdf;
use Cake\Core\Configure;

class PastExamsController extends AppController {
	//public $components = ["RequestHandler"];
	public function initialize(){
		$this->loadModel("PastExamSolutions");
	}

	public function index() {
		$this->paginate = [
			'contain' => ['Modules', 'Users']
		];
		$this->set('pastExams', $this->paginate($this->PastExams));
	}

	public function view($id = null) {
		$pastExamSolution = $this->PastExamSolutions->newEntity($this->request->data);
		$pastExam = $this->PastExams->get($id, [
			'contain' => ['Modules', 'Users', 'PastExamSolutions'=>["Users","PastExamSolutionComments"=>["Users"]],"PastExamComments"=>["Users"]]
		]);
		$userId = $this->Auth->user("id");
		$this->set(compact("pastExam","pastExamSolution","userId"));
	}

	public function add($moduleId = null) {
		$pastExam = $this->PastExams->newEntity($this->request->data);
		if($moduleId!=null && !$this->PastExams->Modules->exists(["id"=>$moduleId])){
			$this->Flash->error('Sorry, the selected module cannot be found.');
			return $this->redirect(["controller"=>"PastExams","action"=>"add"]);
		}
		if ($this->request->is('post')) {
			$pastExam->user_id = $this->Auth->user("id");
			if ($this->PastExams->save($pastExam)) {
				if(!$this->_generatePDF($pastExam)){
					$this->log("error has occurred during pdf generation.","debug");
					return $this->redirect(".");
				}
				$this->Flash->success('The past exam has been saved.');
				return $this->redirect(['action' => 'index']);
			}
			else {
				$this->Flash->error('The past exam could not be saved. Please, try again.');
			}
		}
		$modules = $this->PastExams->Modules->find('list');
		$this->set(compact('pastExam', 'modules', 'moduleId'));
	}

	public function edit($id = null) {
		$pastExam = $this->PastExams->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$pastExam = $this->PastExams->patchEntity($pastExam, $this->request->data);
			if ($this->PastExams->save($pastExam)) {
				if(!$this->_generatePDF($pastExam)){
					$this->log("error has occurred during pdf generation.","debug");
					return $this->redirect(".");
				}
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

	public function delete($id = null) {
		$pastExam = $this->PastExams->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->PastExams->delete($pastExam)) {
			$this->Flash->success('The past exam has been deleted.');
		} 
		else {
			$this->Flash->error('The past exam could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

	private function _generatePDF($pastExam = null){
		if(!$pastExam){
			return false;		
		}
		$CakePdf = new \CakePdf\Pdf\CakePdf();
		$CakePdf->viewVars(compact("pastExam"));
		$CakePdf->template("past_exam","default");
		$pdf = $CakePdf->write(WWW_ROOT.DS."pdf".DS."pastexam_".$pastExam->id.".pdf");
		return $pdf;
	}

	public function addPastExamSolution() {
		$pastExamSolution = $this->PastExamSolutions->newEntity($this->request->data);
		if ($this->request->is('post')) {
			$pastExamSolution->user_id = $this->Auth->user("id");
			if($this->PastExamSolutions->save($pastExamSolution)) {
				$this->Flash->success('The past exam solution has been saved.');
			}
			else{
				$this->Flash->error('The past exam solution could not be saved. Please, try again.');
			}
			return $this->redirect(["controller"=>"PastExams",'action' => 'view',$pastExamSolution->past_exam_id]);
		}
		else{
			echo "access method is not post!";
			exit();
		}
	}

	

}
