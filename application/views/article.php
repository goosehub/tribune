<div class="container">
	<?php foreach ($thread->posts as $key => $post) { ?>
		<?php if ($key === 0) { ?>
			<h2><?= $this->helper->get_headline($post); ?></h2>
			<small>By <?= isset($post->name) ? $post->name : '' ?></small>
			<br/>
			<small><?= isset($post->now) ? $post->now : '' ?></small>
			<p><?= isset($post->com) ? $post->com : '' ?></p>
			<a href="<?= base_url() ?>news/s4s/<?= $post->no ?>/<?= $post->semantic_url ?>">Read More</a>
		<?php } else if (isset($post->com)) { ?>
			<p><?= $post->com ?></p>
		<?php } ?>
	<?php } ?>
</div>