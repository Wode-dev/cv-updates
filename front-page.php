<?php
    get_header();
?>
<!-- Body -->

<div class="panel p-2">
    <div class="background">
        <img 
        src="<?php echo get_template_directory_uri() . '/assets/images/hand-washing.jpg' ?>" 
        >
    </div>
    <div class="front p-2">
        <div class="title mx-md-2 mx-0 d-flex justify-content-end flex-column">
            <div>
                <p class="text-white text-right mb-0 head ml-auto">Sua central de atualizações sobre o Coronavirus</p>
            </div>    
            <p class="text-white text-right by">Por Auge Tecnologia</p>
        </div>
    </div>    
</div>

<div id="brazil-last-data" class="container">
    <?php $brazil_data = cvupdates_data_brazil(); ?>
    <h1 class="text-center">Últimos números no Brasil</h1>
    <div class="card bg-light text-dark text-center p-3 mb-1">
        <blockquote class="blockquote mb-1">
            <div class="text-center text-dark mb-1">
                <span class="h3">Números Gerais</span>
            </div>
            <div class="d-flex justify-content-between text-success">
                <span>Recuperados</span>
                <span><?php echo $brazil_data['recovered'] ?></span>
            </div>
            <div class="d-flex justify-content-between text-warning">
                <span>Casos</span>
                <span><?php echo $brazil_data['cases'] ?></span>
            </div>
            <div class="d-flex justify-content-between text-danger">
                <span>Mortes</span>
                <span><?php echo $brazil_data['deaths'] ?></span>
            </div>
        </blockquote>
        <blockquote class="blockquote mb-0">
            <div class="text-center text-dark mb-1">
                <span class="h3">Hoje</span>
            </div>
            <div class="d-flex justify-content-between text-warning">
                <span>Casos</span>
                <span><?php echo $brazil_data['todayCases'] ?></span>
            </div>
            <div class="d-flex justify-content-between text-danger">
                <span>Mortes</span>
                <span><?php echo $brazil_data['todayDeaths'] ?></span>
            </div>
        </blockquote>
    </div>
</div>

<div id="brazil-evolution-chart" class="container card bg-light mx-1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <style src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"></style>
    <canvas id="lineChart" class="w-75"></canvas>
    <script>
        //line
        <?php $chart = cvupdates_progression_chart() ?>
        var ctxL = document.getElementById("lineChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
        labels: <?php echo json_encode($chart['labels']) ?>,
        datasets: [
            {
                label: "Casos",
                data: <?php echo json_encode($chart['data']['cases'], JSON_HEX_TAG) ?>,
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2
            },
            {
                label: "Mortes",
                data: <?php echo json_encode($chart['data']['deaths']) ?>,
                backgroundColor: [
                    'rgba(0, 137, 132, .2)',
                ],
                borderColor: [
                    'rgba(0, 10, 130, .7)',
                ],
                borderWidth: 2
            }
        ]
        },
        options: {
            responsive: true
        }
        });
    </script>
</div>

<!-- /Body -->
<?php
    get_footer();
?>