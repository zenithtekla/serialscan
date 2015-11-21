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

	.button-submit {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9dce2c', endColorstr='#8cb82b');
	background-color:#9dce2c;
	-webkit-border-top-left-radius:8px;
	-moz-border-radius-topleft:8px;
	border-top-left-radius:8px;
	-webkit-border-top-right-radius:8px;
	-moz-border-radius-topright:8px;
	border-top-right-radius:8px;
	-webkit-border-bottom-right-radius:8px;
	-moz-border-radius-bottomright:8px;
	border-bottom-right-radius:8px;
	-webkit-border-bottom-left-radius:8px;
	-moz-border-radius-bottomleft:8px;
	border-bottom-left-radius:8px;
	text-indent:0px;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:23px;
	font-weight:bold;
	font-style:normal;
	height:45px;
	line-height:45px;
	width:160px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
	}
	.button-submit:hover {
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
		background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8cb82b', endColorstr='#9dce2c');
		background-color:#8cb82b;
	}.button-submit:active {
		position:relative;
		top:1px;
	}

	.button-reset {
	-moz-box-shadow:inset 0px 1px 0px 0px #e6cafc;
	-webkit-box-shadow:inset 0px 1px 0px 0px #e6cafc;
	box-shadow:inset 0px 1px 0px 0px #e6cafc;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #c579ff), color-stop(1, #a341ee) );
	background:-moz-linear-gradient( center top, #c579ff 5%, #a341ee 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c579ff', endColorstr='#a341ee');
	background-color:#c579ff;
	-webkit-border-top-left-radius:8px;
	-moz-border-radius-topleft:8px;
	border-top-left-radius:8px;
	-webkit-border-top-right-radius:8px;
	-moz-border-radius-topright:8px;
	border-top-right-radius:8px;
	-webkit-border-bottom-right-radius:8px;
	-moz-border-radius-bottomright:8px;
	border-bottom-right-radius:8px;
	-webkit-border-bottom-left-radius:8px;
	-moz-border-radius-bottomleft:8px;
	border-bottom-left-radius:8px;
	text-indent:0px;
	border:1px solid #a946f5;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:23px;
	font-weight:bold;
	font-style:normal;
	height:45px;
	line-height:45px;
	width:160px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #8628ce;
	}
	.button-reset:hover {
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #a341ee), color-stop(1, #c579ff) );
		background:-moz-linear-gradient( center top, #a341ee 5%, #c579ff 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a341ee', endColorstr='#c579ff');
		background-color:#a341ee;
	}.button-reset:active {
		position:relative;
		top:1px;
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
	echo $_SESSION['is_auth'];
	/* <input type="text" <?php echo helper_get_tab_index()?> name="username"> */
?>
	<section id="ui_data"></section>
	<script type="text/template" id="ui_template">

	<div class="container">
		<h3> {{app_name}} {{app_name_ext1}} </h3>
	<br/>
	<form action="../controller/front_post.php" method="post">

		<div class="padding">
			{{lang_015}} {{required}}
				<input type="text" name="username" class="typeahead" required>
		</div>

		<div class="padding">
			{{lang_016}} {{required}}
				<input type="password" name="password" class="typeahead" required>
		</div>

		<div class="padding">
			{{lang_010}} {{required}}
				<input type="text" name="sale_order" class="typeahead" required>
		</div>

		<div id="customer" class="scrollable-dropdown-menu padding">
			{{bold lang_014}} {{required}}
				<input class="typeahead" type="text" name="customer" id="customer">
		</div>

		<div id="assembly" class="scrollable-dropdown-menu padding">
			{{italic lang_008}} {{required}}
				<input class="typeahead" type="text" name="assembly">
		</div>

		<div id="revision" class="scrollable-dropdown-menu padding">
			{{lang_009}} {{required}}
				<input class="typeahead" type="text" name="revision">
		</div>

		<div id="format" class="scrollable-dropdown-menu padding">
			{{lang_011}} {{required}}
				<input class="typeahead" type="text" name="format">
		</div>

		<input type="hidden" name="assembly_id">
		<input type="hidden" name="customer_id">
		<input type="hidden" name="format_example">

		<input type="submit" value="{{{lang_017}}}" class="button-submit"> <input type="{{{lang_018}}}" class="button-reset" value="Reset">
		<br/>
		<br/>
		<div id="result"></div>
	</form>
	</div>
	</script>
<script src="../model/ui/ui_data.js" type="text/javascript"></script>
<script src="../js/front.js" type="text/javascript"></script>
</body>
</html>

