<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PastExams Model
 */
class PastExamsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('past_exams');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Modules', [
			'foreignKey' => 'module_id',
		]);
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id',
		]);
		$this->hasMany('PastExamSolutions', [
			'foreignKey' => 'past_exam_id',
		]);
		$this->hasMany('PastExamComments', [
			'foreignKey' => 'past_exam_id',
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
			->add('module_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('module_id', 'create')
			->notEmpty('module_id')
			->add('user_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('user_id', 'create')
			->notEmpty('user_id')
			->validatePresence('content', 'create')
			->notEmpty('content');

		return $validator;
	}

}
