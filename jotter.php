<?php
				$sql = "SELECT * FROM product WHERE productcategoryId = 1 LIMIT 9";
				//var_dump($sql);
				if(!mysqli_query($con,$sql)){
					echo "Error: ". mysqli_error($con); 
				}
					$result = mysqli_query($con,$sql);
					$row = mysqli_fetch_all($result, MYSQLI_BOTH);
					$numcol = 3;
					$bootstrapcolwidth = 9/$numcol;
					// The array_chunk function splits the array into the number of chunks we have given
					$arraychunk = array_chunk($row,$numcol);
					//iterate through each chunk
					foreach($arraychunk as $products){
			?>
			
			<!-- Note that the beginning of this row is in header3 -->
			<div class="col-md-<?php echo $bootstrapcolwidth; ?> img-responsive">
				<h2 style="text-align:center";>Products...</h2>
				<span id="page_details"></span>
				<?php
				//iterate through each product in each chunk
					foreach($products as $product){
				?>
				<img src="images/<?php echo $product['picture']?>"  class="orderimage givmarginbetweenimage" style="margin:20px">
				<h4 style="margin:20px"><?php echo $product['productName']?> </h4><b>&#8358;
				<i><?php echo $product['unitPrice']?></i></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- <button class="btn btn-danger"><a href="<?php //echo $product['href'] ?>">Add to Cart</a></button> -->
				<button class="btn btn-primary"><a href="addtocart.php?id=<?php echo $product['productId'] ;?>">Add</a></button>
			
				<?php 
						} 
				?>
			</div>
			<?php 
						} 
			?>
		</div>	<!--fifth row ends -->

		$.post({
					url : "fetch.php",
					method : "POST",
					data 	: {id : id},
					success : function(data){
						// display the data using the jquery syntax
						$.('#page_details').html(data);
					}
				})	

				'.$row["productCategoryName"].'




		//from fetch.php
		$output .= "<div class='col-md-<?php echo $bootstrapcolwidth; ?> img-responsive'>";
		// $output .= "<h2 style='text-align:center';>".$productcategoryurlname."</h2>";
				//iterate through each product in each chunk
					foreach($products as $product){
				$output .= "<img src='images/$product[picture]' class='orderimage givmarginbetweenimage' style='margin:20px'>";
				$output .= 	"<h4 style='margin:20px'>'.$product[productName].'</h4>";
				$output .= "<b>&#8358;<i>$product[unitPrice]</i></b>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				$output .= "<button class='btn btn-primary'><a href='addtocart.php?id=<?php echo $product[productId] ;?>'>Add</a></button>";
			}	
		$output .= "</div>";
		};
		$output .= "</div>";

		echo $output;

		<?php
//the value of $limit and $result_per_page are below in the pagination section
	//1.define how many results you want per page
	$result_per_page = 9;

	//2.Find out the number of results stored in the db
	$query = "SELECT * FROM product 
			 WHERE productcategoryId = $productcategoryId
			 ";
	$result2 = mysqli_query($con,$query);
	$row2 = mysqli_num_rows($result2);
	echo $row2;
	//3.determine the number of total page available
	$total_page_available = ceil($row2 / $result_per_page);
	//echo $total_page_available;
	//4.determine which page number visitor is currently on
	if(!isset($_GET['page'])){
		$page = 1;
	}else{
		$page = $_GET['page'];
	}
	//5.determine the sql limit starting number for the results on the displaying pages
	//On page 1, we want 1 - 6 results
	//On page 2, we want 7 - 12 results
	//On page 3, we want 13 - 18 results
	//,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
	//page 1 = 6 results per page LIMIT 0,6
	//page 2 = 6 results per page LIMIT 6,12
	//page 3 = 6 results per page LIMIT 12,18
	//,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
	//Generally we have the formular below for nth number
	//the starting_limit_number = LIMIT for each page number
	$starting_limit_number = ($page - 1) * $result_per_page;
	//echo $starting_limit_number

	//6.retrieve the sql limit starting number for the results on the displaying page
	//already written up in the beginning
	//echo $starting_limit_number;
	//echo $result_per_page;
?>	

<input type="hidden" name="limit" class="limit" value="<?php echo $starting_limit_number ?>">
	<input type="hidden" name="offset" class="offset" value="<?php echo $result_per_page ?>">


	limit : $('.limit').val(),
						offset : $('.offset').val()

						$(document).on('click', '.pagination_link',function(){
				var page = $(this).attr('id');
				load_page_details(page);
			})




			<script>
		$(document).ready(function(){
			function load_page_details(id,page){
				$.post('fetch.php',
					{
						id   : id,
						page : page,
					},
					function(data){
						$('.page_details').html(data)
					}
				)
			};
			// initiate the load_page_details function, 1 is the default id number
			load_page_details(1,1)
			$(".nav li").click(function(){
				//alert('my name')
				var page_id = $(this).attr("id");
				load_page_details(page_id);
			});

			//for pagination
			$(document).on('click', '.pagination_link',function(){
				var page = $(this).attr('id');
				alert(page);
				load_page_details(page);
			})
		})
			// create the the event when the li is clicked
			
	</script>
 	