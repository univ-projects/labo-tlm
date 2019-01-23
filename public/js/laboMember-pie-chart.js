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
				var urlPath =  '/laboMember-dash';
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
			function getRandomColor() {
			  var letters = '0123456789ABCDEF';
			  var color = '#';
			  for (var i = 0; i < 6; i++) {
			    color += letters[Math.floor(Math.random() * 16)];
			  }
			  return color;
			}

			var ctx = document.getElementById("pieChart2");
			var datasets = [];
			var labels= [];
			var backgrounds=[];
			var data=[];

			for (key in response) {
				data.push(response[key]);
				labels.push(key);
				backgrounds.push(getRandomColor());
			}

			//data.push(response.);


			    // datasets.push({
			    //     backgroundColor: backgrounds[i],
			    //     data:
			    // });

			var myLineChart = new Chart(ctx, {
				type: 'pie',
				data: {
      labels: labels,
       datasets: [{
         backgroundColor: backgrounds,
         data: data,
       }]
     },
     options: {
       title: {
         display: true,
         text: 'Membres par laboratoire'
       }
     }
			});
		}
	};

	charts.init();

} )( jQuery );
