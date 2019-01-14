
<html>
<head>
	<title>Atma Student Hub</title>
	<?php require "partials/header.php"; ?>
</head>
<body class="app">

	<?php require "partials/loader.php"; ?>
	<div class="peers ai-s fxw-nw h-100vh">
		<div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url(assets/static/images/bg.jpg)">
			<div class="pos-a centerXY">

			</div>
		</div>
		<div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
			<h4 class="fw-300 c-grey-900 mB-40"><center><img src="assets/static/images/logo.png" height="130.px" width="330.px"></center></h4>

	
		<form action="../?page=Validasi" method="POST">
				<div class="form-group">
					<label class="text-normal text-dark">Username</label>
					<input type="text" class="form-control" name="user" placeholder="Username" required>
				</div>
				<div class="form-group">
					<label class="text-normal text-dark">Password</label>
					<input type="password" class="form-control" name="pwd" placeholder="Password" required>
				</div>
				<div class="form-group">
					<div class="peers ai-c jc-sb fxw-nw">
						<div class="peer">
							<div class="checkbox checkbox-circle checkbox-info peers ai-c">
								<input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
								<label for="inputCall1" class="peers peer-greed js-sb ai-c">
									<span class="peer peer-greed">Remember Me</span>
								</label>
							</div>
						</div>
						<div class="peer"><button class="btn btn-primary" name="btnLogin">Login</button>
						</div>
					</div>
				</div>
			</form>';
		</div>
	</div>

	<?php require "partials/footer.php"; ?>
</body>
</html>
