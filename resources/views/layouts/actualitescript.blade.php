<script type="text/javascript">

	    $('[data-toggle="tooltip"]').tooltip();


	$(document).ready(function() {



	  $("#toggle").click(function() {
	    var elem = $("#toggle").html();

	    if (elem == "\u25B2") {
	      //Stuff to do when btn is in the VOIR PLUS state
	      $("#toggle").html("&#x25BC");
				$("#toggle").tooltip('hide')
	          .attr('data-original-title', 'voir plus')
	          .tooltip('fixTitle')
	          .tooltip('show');
				$("#text").slideUp();
	    } else {
	      //Stuff to do when btn is in the read less state

	      $("#toggle").html("&#x25B2");
				$("#toggle").tooltip('hide')
	          .attr('data-original-title', 'voir moins')
	          .tooltip('fixTitle')
	          .tooltip('show');
				$("#text").slideDown();


	    }
	  });
	});
	</script>
