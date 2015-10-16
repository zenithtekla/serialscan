<head>
<link href="../css/default.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<?php
	session_start();
	$_SESSION['is_auth'] = false;
	$t_text = 'some text';
	/* <input type="text" <?php echo helper_get_tab_index()?> name="username"> */
echo '
	<br/>
	<div class="container" id="printable">
	<h2>USER ACCESS</h2>
	<br/>
	<form action="../controller/session_post.php" method="post">
		<p>Login name <span class="required">*</span> : 		<input type="text" name="username"></p>
		<p>password <span class="required">*</span>: 			<input type="text" name="password"></p>
		<p>sale_order <span class="required">*</span>: 		<input type="text" name="sale_order"></p>
		<p>assembly_number <span class="required">*</span>: 	<input type="text" name="assembly_number"></p>
		<p>revision <span class="required">*</span>: 			<input type="text" name="revision"></p>
		<input type="submit" value="New Session">
	</form>
	</div>
';

/* echo "<br/><br/>";
echo "print <p style='color:red;'>$t_text</p>";
echo "<br/><br/>";
echo 'print <p style="color:red;">$t_text</p>';*/
?>