<?php if(!isset($_SESSION["validar"])){
    echo("<script>location.href='../index.php?controller=Front&action=error';</script>");
    exit();
} ?>
<?php include "helpers/template.php" ?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="header">
				<h2>Dashboard</h2>
				<ul class="header-dropdown m-r--5">
				</ul>
			</div>
			<div class="body">
<!-- grafica1 -->
      <?php
      $q = new BaseController();
      $count= $q->CountvisitsController();
      ?>

			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script>
				google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAxisTickColors);

function drawAxisTickColors() {
      var data = google.visualization.arrayToDataTable([
        ['Ciudad', 'Visitas'],
        <?php
          echo'["Medellin", '.$count[0].'] ';
        ?>
      ]);

      var options = {
        title: 'Visitas Por Ciudad',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Visitas Por Ciudad',
          minValue: 0,
          textStyle: {
            bold: true,
            fontSize: 12,
            color: '#4d4d4d'
          },
          titleTextStyle: {
            bold: true,
            fontSize: 18,
            color: '#4d4d4d'
          }
        },
        vAxis: {
          title: 'Ciudad',
          textStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          },
          titleTextStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          }
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
			</script>
<div id="chart_div"></div>


			</div>
		</div>
	</div>
</section>