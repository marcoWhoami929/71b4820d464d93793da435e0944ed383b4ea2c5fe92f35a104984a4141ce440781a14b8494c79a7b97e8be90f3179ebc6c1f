<style type="text/css">
.highcharts-figure, .highcharts-data-table table {
    width: 100%;
    margin: 1em auto;
}

#ventasCanales {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}


</style>
<!--=====================================
GRÁFICO DE VENTAS
======================================-->

<figure class="highcharts-figure">
    <div id="ventasCanales"></div>
   
</figure>


<script>
	Highcharts.chart('ventasCanales', {
    title: {
        text: 'Ventas Canales'
    },
    xAxis: {
        categories: ['Cedis', 'Ruta 2', 'Ruta 3', 'Ruta 5', 'Ctas Corporativas','SM','RF','SG','CP','TR']
    },
    labels: {
        items: [{
            html: 'Total',
            style: {
                left: '50px',
                top: '18px',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'black'
            }
        }]
    },
    series: [{
        type: 'column',
        name: 'Enero',
        data: [<?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>]
    }, {
        type: 'column',
        name: 'Febrero',
        data: [<?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>]
    }, {
        type: 'column',
        name: 'Marzo',
        data: [<?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>]
    }, {
        type: 'spline',
        name: 'Promedio',
       data: [<?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>, <?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>,<?php echo rand(1,10000) ?>],
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }, {
        type: 'pie',
        name: 'Total consumption',
        data: [{
            name: 'Enero',
            y: 13,
            color: Highcharts.getOptions().colors[0] 
        }, {
            name: 'Febrero',
            y: 23,
            color: Highcharts.getOptions().colors[1]
        }, {
            name: 'Marzo',
            y: 19,
            color: Highcharts.getOptions().colors[2]
        }],
        center: [100, 80],
        size: 100,
        showInLegend: false,
        dataLabels: {
            enabled: false
        }
    }]
});

	
</script>