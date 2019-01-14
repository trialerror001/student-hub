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
		<?php
		require './admin/partials/admin_navbar.php'; 
		?>

		<main class="main-content bgc-grey-100">
			<div id="mainContent">
			<!-- CODE HERE -->
				<div class="row">
					<div class="col-md-12 calendar-size">
						<div id="full-calendar" class="fc fc-unthemed fc-ltr" >
						</div>
					</div>
				</div>
				<br>
				<center>
				<div class="row" id="table-container">
					<div class="col-md-5 table-content">
					<div id="left">
						<div class="row row-content border-content"><div class=""id="table-header"><b>Available Room</b></div></div>
						<div class="row row-content border-content"><div class=""><input type="checkbox" onChange="addToSelected(1)"></div><div class="">satu</div></div>
						<div class="row row-content border-content"><div><input type="checkbox" onChange="addToSelected(1)"></div><div>satu</div></div>
						<div class="row row-content border-content"><div><input type="checkbox" onChange="addToSelected(1)"></div><div>satu</div></div>
						<div class="row row-content border-content"><div><input type="checkbox" onChange="addToSelected(1)"></div><div>satu</div></div>
						<div class="row row-content border-content"><div><input type="checkbox" onChange="addToSelected(1)"></div><div>satu</div></div>

					</div>
					</div>
					<div class="col-md-2" style="display: flex; flex-direction: column; align-items:center; justify-content: center;">
						<div class="row" style="display: flex; align-items:center; justify-content: center;">
					<button class="btn btn-primary" style="color: #fff" onClick="add()">Add</button>
				</div>
				<br>
						<div class="row" style="display: flex; align-items:center; justify-content: center;">
					<button class="btn btn-primary" style="color: #fff" onClick="remove()">Remove</button>
				</div>
					</div>
					<div class="col-md-5 table-content">
						<table class="table" id="right">

						<div class="row row-content border-content" id="table-header"><div><b>Used Room</b></div></div>
							<div class="row row-content border-content"><div><input type="checkbox" onChange="addToSelected(1)"></div><div>satu</div></div>
							<div class="row row-content border-content"><div><input type="checkbox" onChange="addToSelected(1)"></div><div>satu</div></div>
							<div class="row row-content border-content"><div><input type="checkbox" onChange="addToSelected(1)"></div><div>satu</div></div>
							<div class="row row-content border-content"><div><input type="checkbox" onChange="addToSelected(1)"></div><div>satu</div></div>
						</table>
					</div>
				</div>
			</center>
			<!-- END CODE -->
			</div>
		</main>

	</div>
<?php
require "./admin/partials/footer.php";
?>
<script>
	var right = [6,7,8];
	var left = [1,2,3,4,5];

	var selected = [];

	function addToSelected(id)
	{
		if(selected.includes(id))
		{
			selected.splice(selected.findIndex(function(item) {return item === id}), 0)
		}
		else
		{
			selected.push(id);
		}
		console.log(selected)
	}

	function add()
	{
		var element_left = $('#left');
		var element_right = $('#right');
		for(var i = 0; i < selected.length; i++)
		{
			var new_row="<tr id='r"+selected[i]+"''><td>satu</td><td><input type='checkbox' onChange='addToSelected("+selected[i]+")''></td></td></tr>";

			element_right.html(element_right.html() + new_row);
			var removed_element = $('#l'+selected[i]);
			removed_element.remove();
		}
	}

	function remove()
	{
		console.log('remove')
		var element_left = $('#left');
		var element_right = $('#right');
		for(var i = 0; i < selected.length; i++)
		{
			console.log(i)
			var new_row="<tr id='l"+selected[i]+"''><td>satu</td><td><input type='checkbox' onChange='addToSelected("+selected[i]+")''></td></td></tr>";

			element_left.html(element_left.html() + new_row);
			var removed_element = $('#r'+selected[i]);
			removed_element.remove();
		}
	}



</script>

<style>
#table-header {
 font-size: 6vh


}

.border-content {

border-bottom: 0.05em solid #2c3e50;

}

.calendar-size {
padding-left:10em;
padding-right: 10em;

}

#table-container {
	padding:
	border: 0.1px solid #2c3e50;
	padding: 1em;
	max-width: 70%;
	min-width: 70%;
}

.table-content {
	border: 0.05em solid #2c3e50;
	padding: 0.5em;
	border-radius: 0.3em;
	box-shadow: 5px 5px rgba(0,0,0,0.25);
	font-family: arial;
	font-size: 5vh
}
.column-checkbox {
	max-width: 10%;
	min-width: 10%;
}
.row-content {
	margin-left: 0px!important;
	margin-right: 0px!important;
}
</style>
</body>
</html>
