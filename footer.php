<!--footer-->
		<br>
		<br>
		<hr>
			<!-- footer row -->
			<div class="row" class="footercolor">
				<div class="col-md-4">
					<h3 class="givcolor">Custormer Service</h3><br><br>
					<span><a href="login.php">Send feedback</a><br>Frequently asked questions<br>Privacy<br>Terms of use</span>
				</div>
				<div class="col-md-4">
					<h3 class="givcolor">My account</h3><br><br>
					<span><a href="login.php">Account Information</a><br><a href="orders.php">Order</a></span>
				</div>
				<div class="col-md-4">
					<h3 class="givcolor">Socials</h3><br><br>
					<span>Subscribe to our<br>Newsletter</span><br>
					<input type="text" name="email" id="email" placeholder="enter your email"><br>
					<input type="button" name="subscribe" id="subscribe" value="subscribe">
				</div>
			</div> <!-- last row -->
		<!--last row, footer-->		
	</div>

<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.twbsPagination.js"></script>

<script type="text/javascript">
    $(function () {
        window.pagObj = $('#pagination').twbsPagination({
            totalPages: 7,
            visiblePages: 7,
            onPageClick: function (event, page) {
                //console.info(page + ' (from options)');
                //alert(page);
        var limit = 8;
        var offset = (page -1) * 8;
        //alert(offset);
        var pageurl = "getproduct.php";
        // send the input data to the server
        $('#displayresult').load(pageurl,{limit: limit, offset: offset});

            }
        }).on('page', function (event, page) {
            console.info(page + ' (from event listening)');
        });
    });
</script>	
		<script type="text/javascript">
			
			$(document).ready(function(){

				var counter = 0;

				$('.orderimage').click(function(){

						counter++;
																																																																																															
					// alert(counter);

					document.getElementById('alignback7').innerHTML = counter;
					document.getElementById('givbgcolor').innerHTML = "<a href='signin.php'>Proceed to check out.</a>"
				});
			});

		</script>

		<!-- chatrify is no more available -->
		<!-- <script type='text/javascript'>
    var __ac = {};
    __ac.uid = "91234498c121d8ab603553e8609b92ca";
    __ac.server = "secure.chatrify.com";
    
    (function() {
    var ac = document.createElement('script'); ac.type = 'text/javascript'; ac.async = true;
    ac.src = 'https://cdn.chatrify.com/go.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ac, s);
    })();
</script> -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('#lagos').click(function(){
				$('#lag').show();
				$('#abe').hide();
				$('#phc').hide();
				});
				
			});
		</script>	
</body>
</html>