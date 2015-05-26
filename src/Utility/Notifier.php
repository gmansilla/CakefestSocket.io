<?php
/**
 * Created by PhpStorm.
 * User: guille
 * Date: 15-05-10
 * Time: 9:48 PM
 */
namespace App\Utility;

use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Cake\Log\Log;
use Cake\ORM\Entity;
use Cake\Network\Http\Client;

class Notifier implements EventListenerInterface {

	protected $host = 'http://demo.cakefest:3000/';

	/**
	 * @return array
	 */
	public function implementedEvents()
	{
		return [
			'Comment.notify' => 'commentNotification',
			'Article.notify' => 'articleNotification',
		];
	}

	/**
	 * Event handler for article notification
	 * @param Event $event
	 * @param Entity $article
	 */
	public function articleNotification(Event $event, Entity $article)
	{
		$endPoint = 'articleNotification';
		$data['isNew'] = $article->isNew();
		$data['articleId'] = $article->get('id');
		$data['articleTitle'] = $article->get('title');
		$this->sendNotification($endPoint, $data);
	}

	/**
	 * Event handler for comment notification
	 * @param Event $event
	 * @param Entity $comment
	 */
	public function commentNotification(Event $event, Entity $comment)
	{
		$endPoint = 'newComment';
		$data['author'] = $comment->get('author');
		$data['comment'] = $comment->get('comment');
		$data['created'] = $comment->get('created')->format(DATE_RFC850);
		$data['articleTitle'] = $comment->article->get('title');
		$data['articleId'] = $comment->article->get('id');
		$this->sendNotification($endPoint, $data);
	}

	/**
	 * Sends message to Node.js
	 * @param $endPoint
	 * @param $data
	 */
	private function sendNotification($endPoint, $data)
	{
		$http = new Client();
		$response = $http->post(
			$this->host . $endPoint,
			json_encode($data),
			['type' => 'json']
		);
		Log::write('debug', print_r($response, true));
	}

}