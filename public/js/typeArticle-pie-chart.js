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
				var urlPath =  '/typeArticle-dash';
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

			var ctx = document.getElementById("pieChart");

			var myLineChart = new Chart(ctx, {
				type: 'pie',
				data: {
      labels: ["Publications", "Brevets", "Posters", "Articles", "Livres"],
       datasets: [{
         backgroundColor: ["lightblue", "limeGreen","purple","salmon","orange"],
         data: [response.publications,response.brevets,response.posters,response.articles,response.livres]
       }]
     },
     options: {
       title: {
         display: true,
         text: 'Nombre d\'articles par type'
       }
     }
			});
		}
	};

	charts.init();

} )( jQuery );
