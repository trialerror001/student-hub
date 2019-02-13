<?php
    session_unset();
	session_destroy();
	?>
	<script language="javascript"> alert('Anda Sudah Logout');
	document.location='http://localhost/student-hub/'</script>
	<?php
	exit;
?>