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
				var urlPath =  '/chartjs3';
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

			var ctx = document.getElementById("lineChart");
			var maaData={	label: "MAA",

				backgroundColor: "lightblue",
				borderColor: "blue",
				borderWidth: 1,
				fill: false,
				data: response.maa_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}
			var mabData={	label: "MAB",
			backgroundColor: "lightgreen",
			borderColor: "green",
			borderWidth: 1,
			fill: false,
				data: response.mab_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}
			var mcaData={	label: "MCA",
			backgroundColor: "lightsalmon",
			borderColor: "red",
			borderWidth: 1,
			fill: false,
				data: response.mca_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}
			var mcbData={	label: "MCB",
			backgroundColor: "yellow",
			borderColor: "yellowgreen",
			borderWidth: 1,
			fill: false,
				data: response.mcb_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}
			var doctorantData={	label: "doctorant",
			backgroundColor: "lime",
			borderColor: "limeGreen",
			borderWidth: 1,
			fill: false,
				data: response.doctorant_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}
			var professeurData={	label: "Professeur",
			backgroundColor: "steelblue",
			borderColor: "SlateBlue ",
			borderWidth: 1,
			fill: false,
				data: response.professeur_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months}
			}

			var myLineChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: response.months, // The response got from the ajax request containing all month names in the database
					datasets: [maaData, mabData,mcaData,mcbData,doctorantData,professeurData],
				},
				options: {

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
