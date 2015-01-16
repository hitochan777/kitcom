<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClassRoom Entity.
 */
class ClassRoom extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'name' => true,
		'time_tables' => true,
	];

}
