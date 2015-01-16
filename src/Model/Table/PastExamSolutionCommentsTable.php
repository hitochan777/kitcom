<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PastExamSolutionComments Model
 */
class PastExamSolutionCommentsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('past_exam_solution_comments');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
		]);
		$this->belongsTo('PastExamSolutions', [
			'foreignKey' => 'past_exam_solution_id',
		]);
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'numeric'])
			->allowEmpty('id', 'create')
			->add('user_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('user_id', 'create')
			->notEmpty('user_id')
			->add('past_exam_solution_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('past_exam_solution_id', 'create')
			->notEmpty('past_exam_solution_id')
			->validatePresence('content', 'create')
			->notEmpty('content');

		return $validator;
	}

}
