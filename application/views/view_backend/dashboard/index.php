<div class="row dashboard">
	<div class="col-md-6">
		<div class="grid">
			<div id="my_gauges" style="width:100%; height:450px"></div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="grid">
			<div id="my_chart_pie" style="width:100%; height:450px"></div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="grid">
			<div id="my_chart_blok" style="width:100%; height:450px"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// my_gauges
	$(function () {

		$('#my_gauges').highcharts({

			chart: {
				type: 'gauge',
				plotBackgroundColor: null,
				plotBackgroundImage: null,
				plotBorderWidth: 0,
				plotShadow: false
			},

			title: {
				text: 'Total User'
			},

			pane: {
				startAngle: -150,
				endAngle: 150,
				background: [{
					backgroundColor: {
						linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
						stops: [
						[0, '#FFF'],
						[1, '#333']
						]
					},
					borderWidth: 0,
					outerRadius: '109%'
				}, {
					backgroundColor: {
						linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
						stops: [
						[0, '#333'],
						[1, '#FFF']
						]
					},
					borderWidth: 1,
					outerRadius: '107%'
				}, {
				}, {
					backgroundColor: '#DDD',
					borderWidth: 0,
					outerRadius: '105%',
					innerRadius: '103%'
				}]
			},
			yAxis: {
				min: 0,
				max: 200,

				minorTickInterval: 'auto',
				minorTickWidth: 1,
				minorTickLength: 10,
				minorTickPosition: 'inside',
				minorTickColor: '#666',

				tickPixelInterval: 30,
				tickWidth: 2,
				tickPosition: 'inside',
				tickLength: 10,
				tickColor: '#666',
				labels: {
					step: 2,
					rotation: 'auto'
				},
				title: {
					text: 'km/h'
				},
				plotBands: [{
					from: 0,
					to: 100,

					color: '#DF5353'
				}, {
					from: 100,
					to: 150,
					color: '#DDDF0D'
				}, {
					from: 150,
					to: 200,
					color: '#55BF3B'
				}]
			},

			series: [{
				name: 'Speed',
				data: [<?php echo $count_user;?>],
				tooltip: {
					valueSuffix: ' km/h'
				}
			}]

		});
});

// my_chart_pie
jQuery(function () {
	jQuery('#my_chart_pie').highcharts({
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Total Product We have'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %',
					style: {
						color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					}
				}
			}
		},
		series: [{
			name: "Brands",
			colorByPoint: true,
			data: [{
				name: "Shirt",
				y: <?php echo $count_shirt;?>,
				sliced: true,
				selected: true
			}, {
				name: "Pant",
				y: <?php echo $count_pant;?>
			}, {
				name: "Merchand",
				y: <?php echo $count_shirt;?>
			}]
		}]
	});
});

// my_chart_blok
jQuery(function () {
	jQuery('#my_chart_blok').highcharts({
		chart: {
			type: 'column'
		},
		title: {
			text: 'Interest Bar For Product'
		},
		xAxis: {
			categories: [
			'Shirt',
			'Pant',
			'Merchand',
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Total of saw'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			'<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: [{
			name: 'Shirt',
			data: [
			<?php 
			foreach ($count_show_shirt as $key) {
				echo $key->total;
			}
			?>
			]

		}, {
			name: 'Pant',
			data: [
			<?php 
			foreach ($count_show_pant as $key) {
				echo $key->total;
			}
			?>]

		}, {
			name: 'Merchand',
			data: [
			<?php 
			foreach ($count_show_merchand as $key) {
				echo $key->total;
			}
			?>]

		}]
	});
});
</script>