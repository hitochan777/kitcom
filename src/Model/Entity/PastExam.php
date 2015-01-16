<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PastExam Entity.
 */
class PastExam extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'module_id' => true,
		'user_id' => true,
		'content' => true,
		'module' => true,
		'user' => true,
		'past_exam_solutions' => true,
	];

}
