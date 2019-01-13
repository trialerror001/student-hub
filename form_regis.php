<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require "./HalamanLogin/partials/header.php";
	?>
</head>
<body class="app">
	<div class="page-container"> 
		<?php require './HalamanLogin/partials/client_navbar.php'; ?>

		<main class="main-content bgc-grey-100">
			<div id="mainContent">
			<!-- CODE HERE -->
				<div class="bgc-white p-20 bd">
					<h6 class="c-grey-900">Complex Form Layout</h6>
					<div class="mT-30"><form>
						<div class="form-row">
							<div class="form-group col-md-6"><label for="inputEmail4">First name</label> <input type="name" class="form-control" id="inputEmail4">
							</div>
							<div class="form-group col-md-6"><label for="inputPassword4">Last name</label> <input type="name" class="form-control" id="inputPassword4">
							</div>
						</div>
							<div class="form-group"><label for="inputAddress">NIM</label> <input type="text" class="form-control" id="inputAddress" placeholder="20xx-xxxx-xxxx">
							</div>
							<div class="form-group"><label for="inputAddress2">Student ID</label> <input type="text" class="form-control" id="inputAddress2" placeholder="120xx-xxxx-xxxx">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6"><label for="inputCity">Barang/ruang yang mau dipinjam</label> <input type="text" class="form-control" id="inputCity">
								</div>
								<div class="form-group col-md-4"><label for="inputState">Untuke keperluan</label> <select id="inputState" class="form-control"><option selected="selected">.....</option><option>...</option></select>
								</div>

								<div class="form-group col-md-2"><label for="inputZip">Alasan lain</label> <input type="text" class="form-control" id="inputZip">
								</div>
							</div>
							<div class="form-row"><div class="form-group col-md-6"><label class="fw-500">Time and date</label><div class="timepicker-input input-icon form-group">
									<div class="input-group">
										<div class="input-group-addon bgc-white bd bdwR-0"><i class="ti-calendar"></i>
										</div>
										<input type="text" class="form-control bdc-grey-200 start-date" placeholder="When?" data-provide="datepicker">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group"><div class="checkbox checkbox-circle checkbox-info peers ai-c"><input type="checkbox" id="inputCall2" name="inputCheckboxesCall" class="peer"> <label for="inputCall2" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">I agree to the terms & Condition</span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Book</button></form></div></div>

			<!-- END CODE -->
			</div>
		</main>
		
	</div>
<?php
require "./HalamanLogin/partials/footer.php";
?>
</body>
</html>
