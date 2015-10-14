<head>
<link href="../css/default.css" rel="stylesheet">
</head>
<?php
	/* <input type="text" <?php echo helper_get_tab_index()?> name="username"> */
	echo '
	<br/>
	<form action="../controller/session_post.php" method="post">
		<p>Login name <span class="required">*</span> : 		<input type="text" name="username"></p>
		<p>password <span class="required">*</span>: 			<input type="text" name="password"></p>
		<p>assembly_number <span class="required">*</span>: 	<input type="text" name="assembly_number"></p>
		<p>revision <span class="required">*</span>: 			<input type="text" name="revision"></p>
		<p>sale_order <span class="required">*</span>: 		<input type="text" name="sale_order"></p>
		<input type="submit" value="New Session">
	</form>

	';
?>