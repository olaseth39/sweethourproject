<?php include('header.php'); ?>

<!--second row starts -->
		<div class="row addmargin">
				<div class="col-md-2 firstcol"><img src="images/sweethourlogo.png" alt="logo"></div>
			<div class="col-md-4 firstcol"><span><b class="sweetfont">			SweetHour Restaurant</b>
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
			<div class="col-md-6">
				<img src="images/interior.jpg" class="imagewidth">
			</div>
		</div>

			<!--row three -->	
			<div class="row">
				<div class="col-md-6 dropdown">
					<span id="increasefont1">Select a contact:&nbsp;</span><select style="width:150px;height:50px;color:rgb(255,128,0);text-align:center;font-size:16px;background-color: rgba(255,255,255,0.3);border-radius:20px">
						<option value="lagos" id="lagos"><a href="lagos.php">Lagos</a></option>
						<option value="abeokuta" id="abeokuta"><a href="abeokuta.php">Abeokuta</a></option>
						<option value="portHarcourt" id="portharcourt"><a href="portharcourt.php">PortHarcourt</a></option>
					</select>
					<p id="lag">
						<a href="lagosmap.php"><h3>Lagos Branch</h3></a>
						<span class="glyphicon glyphicon-earphone gly-2" style="font-size: 20px"></span><b style="font-size: 20px"> 08020907044</b><br>
 						<span class="glyphicon glyphicon-envelope gly-2" style="font-size: 20px"></span><b style="font-size: 20px">olaseth9@gmail.com</b><br>
 						<span class="glyphicon glyphicon-map-marker gly-2" style="font-size: 20px"></span><b style="font-size: 20px">2 Irewole Street, Opebi Lagos</b></br>
					</p>
					<p id="abe">
						<a href="abeokutamap.php"><h3>Abeokuta Branch </h3></a>
					
						<span class="glyphicon glyphicon-earphone gly-2"style="font-size: 20px"></span><b style="font-size: 20px"> 08167857683</b><br>
 						<span class="glyphicon glyphicon-envelope gly-2" style="font-size: 20px"></span><b style="font-size: 20px">abiseth9@gmail.com</b><br>
 						<span class="glyphicon glyphicon-map-marker gly-2" style="font-size: 20px"></span><b style="font-size: 20px">2 wole Street, sagamu abeokuta</b></br>
					</p>
					<p id="phc"><a href="portharcourtmap.php"><h3>Port Harcourt 		Branch</h3></a>
						<span class="glyphicon glyphicon-earphone gly-2" style="font-size: 20px"></span><b style="font-size: 20px"> 08067676767</b><br>
 						<span class="glyphicon glyphicon-envelope gly-2" style="font-size: 20px"></span><b style="font-size: 20px">olaseth9@gmail.com</b><br>
 						<span class="glyphicon glyphicon-map-marker gly-2" style="font-size: 20px"></span><b style="font-size: 20px">5 Tai Street, GRA Port Harcourt</b></br>
					</p>
					
					
				</div>



				<div class="col-md-6">
					<h1 class="putorange">Fill Our Contact Form</h1>
				<!-- bootstrap form -->
				<form>
					<div class="form-group">
						<label for="clientname">Name</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
						<input type="text" name="clientName" id="clientName" class="form-control" placeholder="enter your name here">
						</div>
					</div>
					<div class="form-group">
						<label for="clientname">Telephone no</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></div>
						<input type="number" name="clientName" id="clientName" class="form-control" placeholder="enter your number">
						</div>
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
						<input type="email" name="emailaddress" id="emailaddress" class="form-control" placeholder="enter a valid email">
						</div>
					</div>
					<div class="form-group">
						<label for="message">Message</label>
						<p></p>
						<div class="input-group">
						<div class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></div>
						<textarea type="text" name="msg" id="msg" class="form-control" placeholder="Write here"></textarea>
						</div>
					</div>
				
			
					<div>
					<!-- <button type="reset" class="btn btn-default" style="border-radius:20px; border-color:orange;color:orange">Clear</button> -->
					<button type="submit" class="btn btn-success"style="border-radius:20px; border-color:orange;color:orange">Send</button>
					</div>
				</form>
				</div>
		</div>


			<!--last row, footer-->

			<div class="row">
				<div class="col-md-12 text-left footer">
					Copyright&copy;SweetHour 2018
				</div>				
			</div> <!--last row ends-->


	</div>

<?php include('footer.php');?>		