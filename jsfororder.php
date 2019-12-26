	<?php

	include('config.php'); 
	?>

	<?php

	$sql = "SELECT * FROM product WHERE productId = 2 ";

		if(!mysqli_query($con,$sql)){

			echo "Error: ". mysqli_error($con); 
		}

			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result);

	?>

	<!-- This is javascript for order -->

	<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

	<script type="text/javascript">
			
		function gettotal(){

			var total = document.getElementById('total');
			var amountofquantity = document.getElementById('number').value;
			var sum = parseFloat(amountofquantity) * parseFloat(<?php echo $row['unitPrice'] ?>);

			total.value = sum;

			return sum; 
		}

	</script>