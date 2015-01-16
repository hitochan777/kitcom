<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Periods Model
 */
class PeriodsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('periods');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->hasMany('TimeTables', [
			'foreignKey' => 'period_id',
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
			->validatePresence('name', 'create')
			->notEmpty('name')
			->add('start_time', 'valid', ['rule' => 'time'])
			->validatePresence('start_time', 'create')
			->notEmpty('start_time')
			->add('end_time', 'valid', ['rule' => 'time'])
			->validatePresence('end_time', 'create')
			->notEmpty('end_time');

		return $validator;
	}

}
