<div class="container">
    <canvas id="election_chart" class="election_chart"></canvas>
    <hr>
    <p class="text-center">
        To vote, have the word "vote" followed by the candidates name (no spaces) anywhere in your [s4s] comment. Example: "Hey, vote gippo_dudee. that is all."
    </p>
</div>

<!-- Chart.js -->
<script src="<?=base_url()?>resources/chartjs/Chart.min.js"></script>
<script src="<?=base_url()?>resources/chartjs/Chart.bundle.min.js"></script>

<script>
var ctx = document.getElementById('election_chart').getContext('2d');
var election_chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            <?php foreach ($votes as $candidate => $vote_count) { ?>
                '<?= $candidate ?>',
            <?php } ?>
        ],
        // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [
                <?php foreach ($votes as $candidate => $vote_count) { ?>
                    <?= $vote_count ?>,
                <?php } ?>
            ],
            backgroundColor: [
                <?php foreach ($votes as $candidate => $vote_count) { ?>
                    '<?= 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.5)' ?>',
                <?php } ?>
            ],
            borderColor: [
                <?php foreach ($votes as $candidate => $vote_count) { ?>
                    '<?= 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.5)' ?>',
                <?php } ?>
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
	                stepSize: 1,
                }
            }]
        }
    }
});
</script>