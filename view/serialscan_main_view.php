<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SerialScan app</title>
	<link href="../css/default.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="../plugin/jquery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../plugin/jqueryui/jquery-ui.min.js"></script>
  	<script src="../bootstrap/js/bootstrap.min.js"></script>

	<script src="../bootstrap/plugins/jQuery-Plugin-Js/jQuery.print.js"></script>
	<script type="text/javascript" src="../plugin/jquery.scannerdetection.js"></script>
	<noscript>This webApp requires Javascript</noscript>
</head>
<body>
<?php
	require_once('../controller/core/is_auth.php');

	$t_arr = [];
	$t_arr['assembly']			= $_SESSION['assembly'];
	$t_arr['revision'] 			= $_SESSION['revision'];
	$t_arr['customer'] 			= $_SESSION['customer'];
	$t_arr['sale_order'] 		= $_SESSION['sale_order'];
	$t_arr['format'] 			= $_SESSION['format'];
	$t_arr['format_example'] 	= $_SESSION['format_example'];
	$t_arr['access_level'] 		= $_SESSION['access_level'];
	$t_arr['username'] 			= $_SESSION['username'];
	$t_arr['time'] 				= $_SESSION['time'];
	$t_arr['userId'] 			= $_SESSION['userId'];
	$t_arr['assemblyId'] 		= $_SESSION['assemblyId'];
	$t_arr['customerId'] 		= $_SESSION['customerId'];
	$t_arr['ssId']				= session_id();
	$t_arr['sessionId']			= str_repeat('*', max(1, strlen($t_arr['ssId']) - 4)) . substr($t_arr['ssId'], strlen($t_arr['ssId']) - 4, strlen($t_arr['ssId']));

	$jsonString = json_encode($t_arr, JSON_PRETTY_PRINT);

	$t_sessionId = 'md5#0001';
?>
	<div id="ui_data"></div>
	<script src="../plugin/handlebars/handlebars-v4.0.4.js"></script>

	<script id="ui_template" type="text/template">
	<div class="container" id="printable">
		<p>	{{lang_001}} {{tpl_dataObj.username}},
			{{lang_002}} {{tpl_dataObj.time}}
		</p>
		<div id="logo-section" class="page-header row">
			<div id="logo" class="col-lg-3">
				{{#notGreater 25 tpl_dataObj.access_level}}
					{{{cmod_link}}}
				{{else}}
				{{/notGreater}}
				<img src={{{logo_file}}} style={{{logo_size}}} alt={{app_name}} id="logo">
			</div>
			<div id="company-name" class="col-lg-3">
				<span id="entreprise" class="entreprise">
					{{ent}}
				</span>
			</div>
			<div id="session-id" class="col-lg-3 no-print">
				<span id="sessionId">
				{{tpl_dataObj.sessionId}}
				</span>
			</div>
			<div id="bouton" class="col-lg-3 no-print">
				<button type="submit" class="btn btn-success save-button">
					{{lang_003}}
				</button>&nbsp
				<button type="submit" id="is_logout" class="btn btn-danger">
					{{lang_004}}
				</button>
			</div>
		</div><!-- /row -->

		<div id="top-function-wrapper" class="btn-group floatright marginright">
			<button type="button" id="muokkaus-painike" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span>
				{{lang_005}}</button>
			<button type="button" id="suuruus-painike" class="btn btn-primary"><span class="glyphicon glyphicon-text-size"></span>
				{{lang_006}}</button>
			<button type="button" id="tulostaa-painike" class="btn btn-primary print"><span class="glyphicon glyphicon-print"></span>
				{{{lang_007}}}</button>
		</div>

		<div id="head-info-wrapper" class="row">
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="assembly">
					{{lang_008}} {{required}}
				</span>
				<span class="form-control">
					{{tpl_dataObj.assembly}}
				</span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="revision">
					{{lang_009}} {{required}}
				</span>
				<span class="form-control">
					{{tpl_dataObj.revision}}
				</span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="customer">
					{{lang_014}} {{required}}
				</span>
				<span class="form-control">
					{{tpl_dataObj.customer}}
				</span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="sale_order">
					{{lang_010}} {{required}}
				</span>
				<span class="form-control">
					{{tpl_dataObj.sale_order}}
				</span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="format">
					{{lang_011}} {{required}}
				</span>
				<span class="form-control">
					{{tpl_dataObj.format}}
				</span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="format_example">
					{{lang_012}} {{required}}
				</span>
				<span class="form-control">
					{{tpl_dataObj.format_example}}
				</span>
			</div>
		</div>
		<div id="log-wrapper" class="col-md-11 pull-right right-scroll"></div>
		<div class="row no-print">
			<div id="scan_input" class="input-group input-group-lg col-lg-offset-4 col-lg-5 col-centered">
			  <span class="input-group-addon" id="sizing-addon1">#</span>
			  <input type="text" autofocus id="scan_result" class="form-control" placeholder={{{lang_013}}} aria-describedby="sizing-addon1">
			</div>
		</div>{{! /row }}

		<div id="konsoli_loki">
			<div id="virhe" class="alert"></div>
			<div id="virhe_kuvaus" class="alert"></div>
		</div>

	</div><!-- end of container -->
	</script>
	<script type="text/javascript">
		sessionData =<?php echo $jsonString?>;
		localStorage.setItem("sessionData", JSON.stringify(sessionData));
		regex_format = sessionData.format;
	</script>
	<script src="../js/ui_data.js" type="text/javascript"></script>
	<script src="../js/main.js" type="text/javascript"></script>

	<script type="text/javascript">
	(function(){
	    // Grab the template script $("ui_template").html()
		var myInfo = document.getElementById("ui_template").innerHTML;

		// Compile the template
		var template = Handlebars.compile(myInfo);

		// Define our data object -- tpl_data portion re-allocated.
		var data = JSON.parse(localStorage.getItem("tpl_data"));

		Handlebars.registerHelper("required", function(){
			return new Handlebars.SafeString('<span class="required"> * </span>');
		});
		Handlebars.registerHelper("notGreater", function(num1, num2, options){
			if (num2 > num1){
				return options.fn(this);
			} else {
				return options.inverse(this);
			}
		});
		// Pass our data to the template and add the compiled html to the page
		document.getElementById("ui_data").innerHTML += template(data);
	})();
	</script>


</body>
</html>