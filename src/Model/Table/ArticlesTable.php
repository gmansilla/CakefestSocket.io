<?php
namespace App\Model\Table;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\Validation\Validator;
use Cake\ORM\Table;


class ArticlesTable extends Table {

	public function initialize(array $config)
	{
		$this->hasMany('Comments');
		$this->addBehavior('Timestamp');

	}

	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('title')
			->notEmpty('body');

		return $validator;
	}

	public function afterSave(Event $event, Entity $entity, $options)
	{
		$event = new Event('Article.notify', $this, ['entity' => $entity]);
		$this->eventManager()->dispatch($event);
	}

}