( function ( $ ) {

	var charts = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetarticleMonthlyData();

		},

		ajaxGetarticleMonthlyData: function () {
			// var urlPath =  'http://' + window.location.hostname + '/chartjs';
				var urlPath =  '/chartjs';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {
				console.log( response );
				charts.createCompletedJobsChart( response );
			});
		},

		/**
		 * Created the Completed Jobs Chart
		 */
		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("barChart");
			var articleData={	label: "Articles",

				backgroundColor: "lightgreen",
				borderColor: "green",
				borderWidth: 1,

				data: response.article_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}
			var theseData={	label: "Thèses",
			backgroundColor: "lightblue",
			borderColor: "blue",
			borderWidth: 1,
				data: response.these_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}

			var myLineChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: response.months, // The response got from the ajax request containing all month names in the database
					datasets: [articleData, theseData],
				},
				options: {

					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: false
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								max: response.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}
						// ,{	ticks: {
						// 			min: 0,
						// 			max: response.max, // The response got from the ajax request containing max limit for y axis
						// 			maxTicksLimit: 5
						// 		},
						// 		gridLines: {
						// 			color: "rgba(0, 0, 125, .125)",
						// 		}}
							],
					},
					legend: {
						display: true
					}
				}
			});
		}
	};

	charts.init();

} )( jQuery );
