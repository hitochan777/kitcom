<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity.
 */
class Comment extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'user_id' => true,
		'solution_id' => true,
		'question_id' => true,
		'content' => true,
		'user' => true,
		'solution' => true,
		'question' => true,
	];

}
