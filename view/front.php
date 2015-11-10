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
	.scrollable-dropdown-menu .tt-dropdown-menu {
	  max-height: 150px;
	  overflow-y: auto;
	}
	p {
    margin: 0 0 10px !important;
	}
	#result {
		color:#E6EC8C;
		background-color:gray;
	}
	.required {
		color:red;
	}
	.padding {
		padding-bottom:10px;
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
	/* <input type="text" <?php echo helper_get_tab_index()?> name="username"> */
?>
	<section id="myData"></section>
	<script type="text/template" id="url-template">
	
	<div class="container">
		{{heading title}}
	<br/>
	<form action="../controller/front_post.php" method="post">
		<div id="result"></div>
		
		<div class="padding">
			{{username}} {{required}}: 		
				<input type="text" name="username" class="typeahead" required>
		</div>
		
		<div class="padding">
			{{password}} {{required}}: 			
				<input type="password" name="password" class="typeahead" required>
		</div>
		
		<div class="padding">
			{{sale_order}} {{required}}: 		
				<input type="text" name="sale_order" class="typeahead" required>
		</div>
		
		<div id="customer" class="scrollable-dropdown-menu padding">
			{{bold customer}} {{required}}: 	
				<input class="typeahead" type="text" name="customer">
		</div>
		
		<div id="assembly" class="scrollable-dropdown-menu padding">
			{{italic assembly}} {{required}}: 	
				<input class="typeahead" type="text" name="assembly">
		</div>
		
		<div id="revision" class="scrollable-dropdown-menu padding">
			{{revision}} {{required}}: 	
				<input class="typeahead" type="text" name="revision">
		</div>
		
		<div id="format" class="scrollable-dropdown-menu padding">
			{{format}} {{required}}: 	
				<input class="typeahead" type="text" name="format">
		</div>
		
		<input type="hidden" name="format_example">
		
		<input type="submit" value="{{{session}}}"><input type="{{{reset}}}" class="marginleft" value="Reset">
	</form>
	</div>
	</script>
<script src="../js/front.js" type="text/javascript"></script>
</body>
</html>

