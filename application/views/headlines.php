<div class="container">
	<?php foreach ($posts as $post) { ?>
		<div class="row">
			<div class="col-md-12">
				<!-- Subject or comment exists -->
				<?php if (isset($post->sub) || isset($post->com)) { ?>
					<!-- Sticky -->
					<?php if (isset($post->sticky)) { ?>
					<h3>Our Top Story</h3>
					<?php } ?>
					<h2><?= $this->helper->get_headline($post); ?></h2>
					<small>By <?= isset($post->name) ? $post->name : '' ?></small>
					<br/>
					<small><?= isset($post->now) ? $post->now : '' ?></small>
					<p><?= isset($post->com) ? $post->com : '' ?></p>
					<a href="<?= base_url() ?>news/s4s/<?= $post->no ?>/<?= $post->semantic_url ?>">Read More</a>
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