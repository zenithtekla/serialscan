<head>
<link href="../css/default.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
  
  // intercept form submit and use Ajax http://stackoverflow.com/a/4069359
</script>

</head>
<?php
echo '
	<br/>
	<div class="container" id="printable">
	<h2>CMOD ENTER</h2>
	<br/>
	<form action="../controller/cmod_post.php" method="post">
		<p>assembly_number <span class="required">*</span>: 	<input type="text" name="assembly_number"></p>
		<p>revision <span class="required">*</span>: 			<input type="text" name="revision"></p>
		<p>format <span class="required">*</span>: 			<input type="text" name="format"></p>
		<p>format_example <span class="required">*</span>: 			<input type="text" name="format_example"></p>
		<input type="submit" value="New Format"> <input type="reset" class="marginleft" value="Reset">
	</form>
	</div>
';
?>