<?php 
session_start();
include('header.php') ;
include('config.php');	
?>		
	<!--second row starts -->
		<div class="row addmargin">
				<!--First coloumn for name and logo-->
			<div class="col-md-2 firstcol img-responsive"><img src="images/sweethourlogo.png" alt="logo" ></div>
			<div class="col-md-4 firstcol"><span><b class="sweetfont">SweetHour Restaurant</b>
				<p id="colored">Simply Delicious!!!</p></span>
				<br><br><br>
				<p class="colored1"><b>WE OFFER<br> THE<br>BEST MEALS AT<br> THE<br>BEST VALUE.</b></p>
				<p class="colored1">
					&nbsp;For Home Delivery
				</p>
				<br/>
				<button class="btn btn-danger"><a href="order.php" id="removeline">Order Now</a></button>
				<!-- <p class="round1"><a href="onlineorder.html" >Lagos</a></p>
				<p class="round2"><a href="onlineorder.html">Abeokuta</a></p>
				<p class="round3"><a href="onlineorder.html">Port Harcourt</a></p>	 -->			
			</div>
				<!--Second column for slide-->
			<div class="col-md-6 secondcol addmargin ">
				<!-- slider 1-->
				<!-- Carousel -->

				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="3"></li>  
				  </ol>

  <!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
   
				    <div class="item active img-responsive">
				      <img src="images/jollofrice.png" alt="workingPlace" class="carouselimagesize img-responsive">
				      <div class="carousel-caption">
				        <h2>Jollof Rice</h2>
				        <p>Sweet Taste... </p>	
				      </div>
				    </div>
					
				    <div class="item img-responsive">
				      <img src="images/slide.png" alt="Flower" class="carouselimagesize img-responsive">
				      <div class="carousel-caption">
				        <h2>Assorted Salad</h2>
				        <p>Sweet Taste...</p>
				      </div>
				    </div>
				  
				  	<div class="item img-responsive">
				      <img src="images/slide2.png" alt="Flower" class="carouselimagesize img-responsive">
				      <div class="carousel-caption">
				        <h2>Assorted Egusi dish</h2>
				        <p>Sweet Taste...</p>
				      </div>
				    </div>
				  
				  	<div class="item img-responsive">
				      <img src="images/intercontinentalsoup.jpg" alt="Flower"class="carouselimagesize img-responsive">
				      <div class="carousel-caption">
				        <h2>Intercontinental Soup</h2>
				        <p>Sweet Taste...</p>
				      </div>
				    </div>
				</div>
				  
					<!-- Left and right controls -->
  				<a class="left carousel-control" href="	#myCarousel" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				 </a>
				 <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				 </a>
			</div>
						<!--carousel ends-->

		</div>	<!--ending of Second row-->

		<!--third row starts -->

		<div class="row" >
			<div class="col-md-12 bgcolor3">
				<p><h1 class="putcenter">For Inquiries, call:</h1></p><br>
				<p class="number">07054678478 or 09054674868</p>
				<p><h2 class="putcenter2">Mondays to Saturdays  9am to 10pm</h2></p>

			</div>
		</div>  <!--ending of third row-->
		<!--fourth row starts -->
		<div class="row">
			<div class="col-md-12 bgcolor4">
				<p><h2 style="text-align: center">Our Menu</h2></p>
			</div>
		</div> <!--forth ro ends -->
		<!--fifth row starts -->
		<!--sixth row begins -->
		<div id="displayresult">	
		</div>
		<ul class="pagination" id="pagination">	
		</ul>
		<!--eight row begins -->
		
<?php include('footer.php'); ?>