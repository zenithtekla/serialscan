<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script type="text/javascript" src="../plugin/jquery/jquery-1.11.3.min.js"></script>
<script src="../plugin/typeahead/typeahead.bundle.js"></script>
<script src="../plugin/handlebars/handlebars-v4.0.4.js"></script>
<link rel="stylesheet" href="../plugin/typeahead/typeahead.css">
<script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
<style type="text/css">
	#scrollable-dropdown-menu .tt-dropdown-menu {
	  max-height: 150px;
	  overflow-y: auto;
	}
	p {
    margin: 0 0 10px !important;
	}
</style>
</head>
<body>
<?php
	/* $host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	echo $host . "\n\n"; // echo serialscan-cloud-zenithtekla.c9.io
	echo $uri . "\n\n"; // echo /view */
	
	session_start();
	$_SESSION['is_auth'] = false;
	$t_text = 'some text';
	/* <input type="text" <?php echo helper_get_tab_index()?> name="username"> */
echo '
	<br/>
	<div class="container">
	<h2>USER ACCESS</h2>
	<br/>
	<form action="../controller/main_post.php" method="post">
		<div>Login name <span class="required">*</span> : 		<input type="text" name="username" required></div>
		<div>password <span class="required">*</span>: 			<input type="password" name="password" required></div>
		<div>sale_order <span class="required">*</span>: 		<input type="text" name="sale_order" required></div>
		<div id="scrollable-dropdown-menu">Format <span class="required">*</span>: 	<input class="typeahead" type="text" name="format"></div>
		<input type="hidden" name="format_example">
		<input type="submit" value="New Session"><input type="reset" class="marginleft" value="Reset">
	</form>
	</div>
';

/* echo "<br/><br/>";
echo "print <p style='color:red;'>$t_text</p>";
echo "<br/><br/>";
echo 'print <p style="color:red;">$t_text</p>';*/
?>
<script src="../js/front.js" type="text/javascript"></script>
</body>
</html>

