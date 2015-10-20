<head>
<link href="../css/default.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
</head>
<?php
	/* $host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); */

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
		<p>password <span class="required">*</span>: 			<input type="password" name="password"></p>
		<p>sale_order <span class="required">*</span>: 		<input type="text" name="sale_order"></p>
		<p>assembly_number <span class="required">*</span>: 	<input type="text" name="assembly_number"></p>
		<p>revision <span class="required">*</span>: 			<input type="text" name="revision"></p>
		<input type="submit" value="New Session"><input type="reset" class="marginleft" value="Reset">
	</form>
	</div>
';

/* echo "<br/><br/>";
echo "print <p style='color:red;'>$t_text</p>";
echo "<br/><br/>";
echo 'print <p style="color:red;">$t_text</p>';*/
?>