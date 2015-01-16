<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Period Entity.
 */
class Period extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'name' => true,
		'start_time' => true,
		'end_time' => true,
		'time_tables' => true,
	];

}
