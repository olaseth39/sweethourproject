<?php
include('header2.php');
include('header3.php');
session_start();
$_SESSION['total_page'];
?>

<!-- Pagination -->
<!-- pagination	 -->
	
	<div class="row givmargin">
        <!-- Side bar here -->
        <div class="col-md-3">
            <h2 style="text-align:center">Product Categories</h2>
            <span></span>
                <ul class="nav">
                    <?php
                        $sql    = "SELECT * FROM productcategory 
                                    ORDER BY productcategoryId ";
                        
                        $result = mysqli_query($con, $sql);
                        //var_dump($result);                
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                            $productcategoryId = $row['productcategoryId'];
                    ?>
							<li id="<?php echo $productcategoryId ?>">
                            <a href="javaScript:void(0)"><?php echo $row["productCategoryName"];?></a>
                            </li>
                    <?php
                            }
						}
					
                    ?> 
                </ul>
        </div>
		
		<div class="col-md-9">
			<p class="page_details"></p>
			<!-- Load the content of the sidebar assynchronously -->			
	        <div >
					<?php
					
					   for($page = 1 ;$page <= $_SESSION['total_page']; $page++){
					?>
						<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid black;' id="<?php echo $page;?>">
						<?php echo $page ?></span>
					<?php	
						}
					?>
			</div>	
	    </div>
     </div> 
	 <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			function load_page_details(id){
				$.post('fetch.php',
					{
						id   : id,
					},
					function(data){
						$('.page_details').html(data)
					}
				)
			};
			// initiate the load_page_details function, 1 is the default id number
			load_page_details(1)
			$(".nav li").click(function(){
				//alert('my name')
				var page_id = $(this).attr("id");
				load_page_details(page_id);
			});

			//for pagination
			function load_pagination(page){
				//load_pagination(1)
				$.post('fetchPagination.php',
					{
						page   : page,
					},
					function(data){
						$('.page_details').html(data)
					}
				)
			};
			// initiate the load_pagination function, 1 is the default page number
			load_pagination(1)
			// I stopped the initiation so as not to interrupt the load_page_details until the page link is clicked
			$(document).on('click', '.pagination_link',function(){
				var page = $(this).attr('id');
				alert(page);
				load_pagination(page);
			})
			//load_pagination(1)
		})
			// create the the event when the li is clicked
			
	</script>
 			
<br><br><br>				
<?php include('footer.php');?>	

		




	