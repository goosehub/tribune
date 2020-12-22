<div class="container headlines_container">
	<?php foreach ($posts as $post) { ?>
		<div class="row">
			<div class="col-md-3 col-md-push-1">
				<img class="headline_image img-thumbnail" src="<?= base_url() ?>uploads/<?= BOARD ?>_<?= $post->tim . $post->ext ?>"/>
			</div>
			<div class="col-md-7 col-md-push-1">
				<!-- Subject or comment exists -->
				<?php if (isset($post->sub) || isset($post->com)) { ?>
					<!-- Sticky -->
					<?php if (isset($post->sticky)) { ?>
					<h3>Our Top Story</h3>
					<?php } ?>
					<h2><?= $this->helper->get_headline($post); ?></h2>
					<small>Written by <?= isset($post->name) ? $post->name : '' ?></small>
					<small>on <?= isset($post->now) ? $post->now : '' ?></small>
					<br>
					<p class="lead"><?= isset($post->com) ? $post->com : '' ?></p>
					<a class="btn btn-danger" href="<?= base_url() ?>news/<?= BOARD ?>/<?= $post->no ?>/<?= $post->semantic_url ?>">Read More</a>
				<!-- Neither subject or comment exists -->
				<?php } else { ?>
					Your ad here
					By Pepsi
				<?php } ?>
				<hr/>
			</div>
		</div>
	<?php } ?>

	<p class="text-center">
		<?php if ($page > 1) { ?>
			<a href="<?= base_url() . 'listing/' . ($page - 1); ?>">
				Previous Page
			</a>
			|
		<?php } ?>
		<a href="<?= base_url() . 'listing/' . ($page + 1); ?>">
			Next Page
		</a>
	</p>
</div>