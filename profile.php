<!doctype html>
<html lang="en">
  <head>
  	<title>Dropdown 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> -->
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
		<link rel="stylesheet" href="profile.css">
  </head>
  <body>
		
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 d-flex justify-content-center">
						<div class="btn-group">
						  <a href="#" class="btn-img img dropdown-toggle rounded-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-image: url(pic-3.png);">
						  </a>
						  <div class="dropdown-menu">
						    <a class="dropdown-item d-flex align-items-center" href="#">
						    	<div class="icon d-flex align-items-center justify-content-center mr-3">
						    		<span class="ion-ios-person"></span>
						    		<!-- <span class="ion-ios-heart"></span> -->
						    	</div>
						    	<?php echo $fname." ".$lname;?>
						    </a>
						    <a class="dropdown-item d-flex align-items-center" href="#">
								<div class="icon d-flex align-items-center justify-content-center mr-3">
						    		<span class="ion-ios-mail"></span>
						    	</div>
                  				<?php echo $email;?>
						    </a>
						    <a class="dropdown-item d-flex align-items-center" href="changepass.php">
						    	<div class="icon d-flex align-items-center justify-content-center mr-3">
						    		<span class="ion-ios-brush"></span>
						    	</div>
						    	Change Password
						    </a>
							<!-- <a class="dropdown-item d-flex align-items-center" href="#">
						    	<div class="icon d-flex align-items-center justify-content-center mr-3">
						    		<span class="ion-ios-settings"></span>
						    	</div>
						    	Edit Profile
						    </a> -->
						    
						    <a class="dropdown-item d-flex align-items-center" href="logout.php">
						    	<div class="icon d-flex align-items-center justify-content-center mr-3">
						    		<span class="ion-ios-power"></span>
						    	</div>
						    	Log Out
						    </a>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <script src="profilejs/jquery.min.js"></script>
    <script src="profilejs/popper.js"></script>
    <script src="profilejs/bootstrap.min.js"></script>
    <script src="profilejs/main.js"></script>
  </body>
</html>