<?php include('header.php'); ?>
	<div class="container-fluid">
	<?php
		// select all info from sections table
		$sql = "select * from sections where pageid='2'";
		$result = mysqli_query($con, $sql);

		$row = mysqli_fetch_all($result, MYSQLI_BOTH);

			// echo "<pre>";
			// print_r($row);
			// echo "</pre>";

					
		
	?>
	<div>
		<div class="col-md-3">
		<?php 
			foreach ($row as $key => $value) {
		?>
		<a href="#" id="<?php echo $value['sectionid']; ?>"> 
			<?php echo $value['title']; ?>
		</a>
			<br/>
			<?php 
				}
			?>
		</div>
		<div class="col-md-9">
			<div id="displaydept">display result here</div>
		</div>
	</div>
	</div>

<?php include('footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){

		$('a').click(function(){
			 var $this = $(this);
             var myid = $this.attr("id");
		
		$("#displaydept").load("getdept.php", {sectionid: myid});
		});

	});
	
</script>