<?php
		// checking if their is connection
		if($con){
			mysqli_close($con);
		}


?>
<div class="container-fluid" style="background-color: maroon; color: white; margin-top:20px">
copyright &copy; <?php  date_default_timezone_set('Africa/Lagos'); echo date('Y'); ?>, SweetHour. All Rights Reserved.
</div>

<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="tiny_mce/initialize_tiny.js"></script>

	<script>
	$(document).ready(function(){

		// to search for users

		$('#search').keyup(function(){

			$('#searchresult').css('display','inline');

			//get the value from search input element

			var searchvalue = $('#search').val();

			// alert(searchvalue);

			// send the input data to the server

			$('#searchresult').load(searchurl,{searchword: searchvalue});
	});




</script>

</body>
</html>