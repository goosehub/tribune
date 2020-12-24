<div class="container">
    <canvas id="markets_chart" class="markets_chart"></canvas>
    <p class="text-center">
        Times are EST. Markets are always open. Click on label to exclude from chart. Always check gets.
    </p>
</div>

        <?php foreach ($markets as $key => $data) { ?>
            <?php // dd($key); ?>,
        <?php } ?>

<!-- Chart.js -->
<script src="<?=base_url()?>resources/chartjs/Chart.min.js"></script>
<script src="<?=base_url()?>resources/chartjs/Chart.bundle.min.js"></script>

<script>
function getColor(type) {
    if (type === 'dubs') {
        return '#ff0000'; // Red
    }
    if (type === 'trips') {
        return '#008000'; // Green
    }
    if (type === 'quads') {
        return '#0000ff'; // Blue
    }
    if (type === 'quints') {
        return '#FF6600'; // Orange
    }
    if (type === 'sexes') {
        return '#6600FF'; // Purple
    }
    if (type === 'septs') {
        return '#000000'; // Black
    }
}

var ctx = document.getElementById('markets_chart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
        <?php foreach ($markets as $date => $data) { ?>
            '<?= date('M d H', strtotime($date)) ?>',
        <?php } ?>
    ],
    datasets: [
        <?php foreach ($gets as $key => $get_data) { ?>
        {
            label: '<?= ucfirst($key) . ' at ' . end($get_data) ?>',
            lineTension: 0,
            borderColor: getColor('<?= $key ?>'),
            borderWidth: 2,
            fill: false,
            data: <?= json_encode($get_data) ?>
        },
        <?php } ?>
    ]
  },
  options: {
    responsive: true,
    title: {
        display: true,
        text: 'Get Markets'
    },
    tooltips: {
        mode: 'index',
        intersect: true
    },
  }
});
</script>