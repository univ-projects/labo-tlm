
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
				var urlPath =  '/typeArticle-stacked-chart';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {
				charts.createCompletedJobsChart( response );
			});
		},

		/**
		 * Created the Completed Jobs Chart
		 */
		createCompletedJobsChart: function ( response ) {

			var ctx = document.getElementById("stackedChartArticle");

			var articleData={	label: "Articles",

				backgroundColor: "lightsalmon",
				borderColor: "red",
				borderWidth: 1,

				data: response.article_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}
			var publicationData={	label: "Publications",
			backgroundColor: "lightblue",
			borderColor: "blue",
			borderWidth: 1,
				data: response.publication_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}
			var livreData={	label: "Livres",
			backgroundColor: "orange",
			borderColor: "orange",
			borderWidth: 1,
				data: response.livre_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}
			var brevetData={	label: "Brevet",
			backgroundColor: "limeGreen",
			borderColor: "green",
			borderWidth: 1,
				data: response.brevet_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}
			var posterData={	label: "Poster",
			backgroundColor: "purple",
			borderColor: "purple",
			borderWidth: 1,
				data: response.poster_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}

			var myLineChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: response.months, // The response got from the ajax request containing all month names in the database
					datasets: [articleData,publicationData,brevetData,livreData,posterData],
				},
				options: {
					title: {
	          display: true,
	          text: 'Type d\'articles publiées par année'
	        },
					scales: {
						xAxes: [{
							stacked:true,
							time: {
								unit: 'date'
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							stacked:true,
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
