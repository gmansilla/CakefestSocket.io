<?php
/**
 * Created by PhpStorm.
 * User: guille
 * Date: 15-05-14
 * Time: 10:51 PM
 */

namespace App\Model\Table;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\Validation\Validator;
use Cake\ORM\Table;
use Cake\Log\Log;

class CommentsTable extends Table {

	public function initialize(array $config)
	{
		$this->belongsTo('Articles');
		$this->addBehavior('Timestamp');

	}

	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('author')
			->notEmpty('comment');

		return $validator;
	}

	public function afterSave(Event $event, Entity $entity, $options)
	{
		$comment = $this->get($entity->get('id'),  ['contain' => 'Articles']);
		$event = new Event('Comment.notify', $this, ['entity' => $comment]);
		$this->eventManager()->dispatch($event);
	}

}