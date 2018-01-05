<h3>Messages</h3>
					<?php 
						if(isset($_SESSION['user'])) {
							echo "<h4> Hello,".  $_SESSION['fullName']. "</h4> <h6><br>Welcome to SajiloKrishi.</h6>
								<h3>Are You a Producer? <br>Post Your Products Here</h3>
								<input type='submit' value =  'POST MY PRODUCTS' onclick = 'location.href = \"postProduct.php\"'>";
						}else {
							echo "<h5> You are not signed in. </h5>";
							echo "<h3>To Post Your Products Please Login</h3>";
						}
						echo $msg;
					 ?>
						