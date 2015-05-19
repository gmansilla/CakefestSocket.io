<h1><?= h($article->title) ?></h1>
<p><?= h($article->body) ?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>
<h5>Comments:</h5>

<div>
	<?php echo $this->element('comments'); ?>
</div>


<h6>Add comment</h6>
<?php
	echo $this->Form->create('Comments', [
		'url' => ['controller' => 'Comments', 'action' => 'add']
	]);
	echo $this->Form->input('author');
	echo $this->Form->input('comment', ['rows' => '3']);
	echo $this->Form->hidden('article_id', ['value' => $article->id, 'id' => 'articleId']);
	//echo $this->Form->hidden('articles.id');
	echo $this->Form->button('Send');
	echo $this->Form->end();
?>

