<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modules Model
 */
class ModulesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('modules');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Groups', [
			'foreignKey' => 'group_id',
		]);
		$this->belongsTo('ClassTypes', [
			'foreignKey' => 'class_type_id',
		]);
		$this->hasMany("Posts",[
			"foreignKey"=>"module_id"
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
			->add('group_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('group_id', 'create')
			->notEmpty('group_id')
			->validatePresence('grade', 'create')
			->notEmpty('grade')
			->validatePresence('class', 'create')
			->allowEmpty('class')
			->add('class_type_id', 'valid', ['rule' => 'numeric'])
			->validatePresence('class_type_id', 'create')
			->notEmpty('class_type_id')
			->add('credit', 'valid', ['rule' => 'numeric'])
			->validatePresence('credit', 'create')
			->notEmpty('credit');

		return $validator;
	}

}
