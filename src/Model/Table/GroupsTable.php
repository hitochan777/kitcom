<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Groups Model
 */
class GroupsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('groups');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');
		$this->addBehavior('Tree');

		$this->belongsTo('ParentGroups', [
			'className' => 'Groups',
			'foreignKey' => 'parent_id',
		]);
		$this->hasMany('ChildGroups', [
			'className' => 'Groups',
			'foreignKey' => 'parent_id',
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
			->add('parent_id', 'valid', ['rule' => 'numeric'])
			->allowEmpty("parent_id")
			->add('lft', 'valid', ['rule' => 'numeric'])
			->allowEmpty('lft')
			->add('rght', 'valid', ['rule' => 'numeric'])
			->allowEmpty('rght')
			->add('is_dummy', 'valid', ['rule' => 'boolean'])
			->validatePresence('is_dummy', 'create')
			->allowEmpty('is_dummy');

		return $validator;
	}

}
