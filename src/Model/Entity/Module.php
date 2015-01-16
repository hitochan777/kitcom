<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Module Entity.
 */
class Module extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'name' => true,
		'group_id' => true,
		'grade' => true,
		'class' => true,
		'class_type_id' => true,
		'credit' => true,
		'group' => true,
		'class_type' => true
	];

}
