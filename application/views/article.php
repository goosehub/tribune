<div class="container article_container">
	<div class="row">
		<div class="col-md-10 col-md-push-1">
			<?php foreach ($thread->posts as $key => $post) { ?>
				<?php if ($key === 0) { ?>
					<div class="article_op text-center">
						<h2><?= $this->helper->get_headline($post); ?></h2>
						<p class="lead">
							<span>By <?= isset($post->name) ? $post->name : '' ?></span>
							<span>|</span>
							<small>Updated <?= isset($post->now) ? $post->now : '' ?></small>
						</p>
						<img class="article_image img-thumbnail" src="<?= base_url() ?>uploads/<?= BOARD ?>_<?= $post->tim . $post->ext ?>"/>
						<p class="lead"><?= isset($post->com) ? $post->com : '' ?></p>
					</div>
				<?php } else if (isset($post->com)) { ?>
					<?php if (isset($post->com) && strlen($post->com) > COMMENT_LENGTH_FOR_BREAK) { ?>
						<br>
					<?php } ?>
					<span class="comment"><?= $post->com ?></span>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
	<hr>
	<span><?= isset($post->name) ? $post->name : '' ?> is a reporter from /<?= BOARD ?>/</span>
	<br>
	<br>
</div>