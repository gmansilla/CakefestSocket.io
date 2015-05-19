<?php $this->Html->script('http://demo.cakefest:3000/socket.io/socket.io.js', ['block' => true]); ?>
<?php $this->Html->script('comments', ['block' => true]); ?>

<div id="comments">
	<?php foreach ($article->comments as $comment): ?>
		<p><?php echo $comment->get('author')?></p>
		<p><?php echo $comment->get('comment'); ?></p>
		<p><small><?php echo $comment->get('created')->format(DATE_RFC850)?></small></p>
		<hr>
	<?php endforeach?>
</div>
