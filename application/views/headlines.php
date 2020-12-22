<div class="container headlines_container">
	<?php foreach ($posts as $key => $post) { ?>
		<?php if ($key % 2 == 0) { ?> <div class="row"> <?php } ?>
			<div class="col-md-2">
				<a href="<?= base_url() ?>news/<?= BOARD ?>/<?= $post->no ?>/<?= $post->semantic_url ?>">
					<img class="headline_image img-thumbnail" src="<?= base_url() ?>uploads/<?= BOARD ?>_<?= $post->tim . $post->ext ?>"/>
				</a>
			</div>
			<div class="col-md-4">
				<!-- Subject or comment exists -->
				<?php if (isset($post->sub) || isset($post->com)) { ?>
					<!-- Sticky -->
					<?php if (isset($post->sticky)) { ?>
					<!-- <h3>Our Top Story</h3> -->
					<?php } ?>
					<a class="unstyled_link" href="<?= base_url() ?>news/<?= BOARD ?>/<?= $post->no ?>/<?= $post->semantic_url ?>">
						<h2><?= $this->helper->get_headline($post); ?></h2>
					</a>
					<span>By <?= isset($post->name) ? $post->name : '' ?></span>
					<span>|</span>
					<small>Updated <?= isset($post->now) ? $post->now : '' ?></small>
					<br>
					<p class="lead"><?= isset($post->com) ? $post->com : '' ?></p>
					<a class="btn btn-danger" href="<?= base_url() ?>news/<?= BOARD ?>/<?= $post->no ?>/<?= $post->semantic_url ?>">Read More</a>
				<!-- Neither subject or comment exists -->
				<?php } else { ?>
					<!-- Unknown Kek -->
				<?php } ?>
			</div>
		<?php if ($key % 2 != 0) { ?> </div> <?php } ?>
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