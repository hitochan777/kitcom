<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comments Model
 */
class CommentsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('comments');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
		]);
		$this->belongsTo('Solutions', [
			'foreignKey' => 'solution_id',
		]);
		$this->belongsTo('Questions', [
			'foreignKey' => 'question_id',
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
			->add('solution_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('solution_id', 'create')
			->notEmpty('solution_id')
			->add('question_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('question_id', 'create')
			->notEmpty('question_id')
			->validatePresence('content', 'create')
			->notEmpty('content');

		return $validator;
	}

}
