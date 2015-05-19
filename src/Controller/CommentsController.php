<?php
/**
 * Created by PhpStorm.
 * User: guille
 * Date: 15-05-14
 * Time: 10:55 PM
 */

namespace App\Controller;


class CommentsController extends AppController {

	public function initialize()
	{
		parent::initialize();
	}

	public function add()
	{
		$comment = $this->Comments->newEntity();
		if ($this->request->is('post')) {
			$comment = $this->Comments->patchEntity($comment, $this->request->data);
			if ($this->Comments->save($comment)) {
				$this->Flash->success(__('Your comment has been saved.'));
				return $this->redirect('/');
			}
			$this->Flash->error(__('Unable to add your comment.'));
		}
		$this->redirect('/');
	}


}