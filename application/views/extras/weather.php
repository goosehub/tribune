<div class="container">
	<br>
	<br>
	<p class="lead text-center">
		The weather forecast today is
		<span class="weather_type" style="color: #<?= $weather_color ?>">
			<?= ucfirst($weather_type); ?>
		</span>
		with a temperature of
		<span class="weather_temp" style="color: #<?= $temp_color_hex ?>">
			<?= $weather_temp; ?>°
		</span>
	</p>
</div>