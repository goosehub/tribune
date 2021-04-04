<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a class="unstyled_link" href="<?= base_url() ?>">
				<h1 class="text-center">[s4s] Tribune</h1>
			</a>
			<p class="text-center">
				<a href="<?= base_url() ?>">
					Online
				</a>
				<span class="nav_divider">|</span>
				<a href="<?= base_url() ?>print">
					Print
				</a>
				<span class="nav_divider">|</span>
				<a href="<?= base_url() ?>radio">
					Radio
				</a>
				<span class="radio_button_parent">
					<span class="radio_button_play_icon glyphicon glyphicon-play-circle" aria-hidden="true"></span>
					<iframe class="radio_button_iframe"
						src="https://www.youtube.com/embed/<?= $youtube_id ?>"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
						allowfullscreen>
					</iframe>
				</span>
				<span class="nav_divider">|</span>
				<a href="<?= base_url() ?>weather">
					Weather
				</a>
				<span class="weather_navbar">
					(
					<span class="weather_type" style="color: #<?= $weather_color ?>">
						<?= ucfirst($weather_type); ?>
					</span>
					/
					<span class="weather_temp" style="color: #<?= $temp_color_hex ?>">
						<?= $weather_temp; ?>°
					</span>
					)
				<span class="nav_divider">|</span>
				<a href="<?= base_url() ?>markets">
					Markets
				</a>
				<span class="markets_navbar">
					(
					<span class="market_dubs">
						<?= $current_markets->dubs ?> Dubs
					</span>
					/
					<span class="market_trips">
						<?= $current_markets->trips ?> Trips
					</span>
					)
				</span>
				<span class="nav_divider">|</span>
				<a href="<?= base_url() ?>election">
					Election
				</a>
				<span class="election_navbar">
					(
					<span class="election_leader">
						<?= COUNT($votes) >= 1 ? array_keys($votes)[0] : 'Anon' ?>
					</span>
					/
					<span class="election_runnerup">
						<?= COUNT($votes) >= 2 ? array_keys($votes)[1] : 'Anon' ?>
					</span>
					)
				</span>
				<!-- Got lazy -->
<!-- 				<span class="nav_divider">|</span>
				<a href="<?= base_url() ?>travel">
					Travel
				</a> -->
				<!-- Soon, spiderman -->
<!-- 				<span class="nav_divider">|</span>
				<a href="<?= base_url() ?>spiderman">
					Spiderman
				</a> -->
			</p>
		</div>
	</div>
</div>