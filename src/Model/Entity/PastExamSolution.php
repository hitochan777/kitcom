<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PastExamSolution Entity.
 */
class PastExamSolution extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'user_id' => true,
		'past_exam_id' => true,
		'content' => true,
		'user' => true,
		'past_exam' => true,
	];

}
