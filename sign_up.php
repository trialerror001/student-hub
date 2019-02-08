<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require "./admin/partials/header.php";
	?>
</head>
<body class="app">
	<div class="page-container"> 
		<?php require './admin/partials/guest_navbar.php'; ?>
 
		<main class="main-content bgc-grey-100">
			<div id="mainContent">
			<!-- CODE HERE -->
				 <div class="masonry-item col-md-12" style="position: absolute; left: 0%; top: 0px;">
				 	<div class="bgc-white p-20 bd">
				 		<h6 class="c-grey-900">Sign Up</h6>
				 		<div class="mT-30">
				 			<form>
				 				<div class="form_style">
				 					<div class="form-group">
				 				 	<label for="exampleInputPassword1"><h1>Sign Up</h1></label></div>
				 				<div class="form-group">
				 				 	<label for="exampleInputPassword1">Nama Organisasi</label> <input type="name" class="form-control" id="exampleInputEmail1" placeholder=""></div>
				 				<div class="form-group">
				 				<div class="form-group">
				 				 	<label for="exampleInputPassword1">Username</label> <input type="name" class="form-control" id="exampleInputEmail1" placeholder=""></div>
				 				<div class="form-group">
				 				<label for="exampleInputEmail1">Email address</label>
				 				 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="student@atmajaya.ac.id"> 
				 				 <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small></div>
				 				 <div class="form-group">
				 				 	<label for="exampleInputPassword1">Password</label> <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"></div>
				 				 	<div class="form-group">
				 				 	<label for="exampleInputPassword1">Re-enter Password</label> <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"></div>
				 				 <div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15"><input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer"> <label for="inputCall1" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">I agree to license and agreement</span></label></div><div class="row col-md-12" style="padding:0.5em; display: flex; align-items:center; justify-content: center;">
					<button class="btn btn-warning" style="color: #fff"><a href="?page=FormRegistrasi">Submit</button>
				</div></form></div></div></div>

			<!-- END CODE -->
			</div>
		</main>
		
	</div>
<?php
require "./admin/partials/footer.php";
?>
<style>
#form_font
{
	font-size:1vw;
}
	.form_style
	{
		padding-left: 10em;
		padding-right:10em;
	}
</style>
</body>
</html>
