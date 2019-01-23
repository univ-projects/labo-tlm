labId=document.getElementById("labId").value;
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
				var urlPath =  '/laboArticleEquipe-bar-chart/'+labId;
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

			var ctx = document.getElementById("barChartArticle");

			function getRandomColor() {
				var letters = '0123456789ABCDEF';
				var color = '#';
				for (var i = 0; i < 6; i++) {
					color += letters[Math.floor(Math.random() * 16)];
				}
				return color;
			}
			var datasets = [];
			var labels= [];
			var backgrounds=[];
			var data=[];
			var articleData=[];

			for (key in response.article_count_data) {
				// data.push(response[key]);
				// labels.push(key);
				// backgrounds.push(getRandomColor());
				// var escData=[];
				// for (var key2 in response.article_count_data) {
				// 		escData.push();
				// }
				 articleData.push({	label: key,

					backgroundColor: getRandomColor(),

					borderWidth: 1,

					data: response.article_count_data[key], // The response got from the ajax request containing data for the completed jobs in the corresponding months}
				});
			}
			console.log(articleData);

			// var theseData={	label: "Thèses",
			// backgroundColor: "lightgreen",
			// borderColor: "green",
			// borderWidth: 1,
			// 	data: response.these_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			// }
			// var thesardData={	label: "Thèsard",
			// backgroundColor: "lightsalmon",
			// borderColor: "red",
			// borderWidth: 1,
			// 	data: response.thesard_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			// }

			var myLineChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: response.months, // The response got from the ajax request containing all month names in the database
					datasets: articleData,
				},
				options: {
					title: {
						display: true,
						text: 'Nombre d\'articles publiés par équipe'
					},
					scales: {
						xAxes: [{
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
