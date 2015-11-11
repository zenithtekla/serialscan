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
	$t_arr['ss_key'] 			= $_SESSION['ss_key'];

	$jsonString = json_encode($t_arr, JSON_PRETTY_PRINT);

	$t_sessionId = 'md5#0001';
?>
	<div id="homeviewData"></div>
	<script src="../plugin/handlebars/handlebars-v4.0.4.js"></script>

	<script id="homeview-template" type="text/template">
	<div class="container" id="printable">
		<p>	{{lang_001}} {{dataObj.username}},
			{{lang_002}} {{dataObj.time}}
		</p>
		<div id="logo-section" class="page-header row">
			<div id="logo" class="col-lg-3">
				{{#notGreater 25 dataObj.access_level}}
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
				{{dataObj.sessionId}}
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
				<span class="input-group-addon" id="assembly_number1">
					{{lang_008}} {{required}}
				</span>
				<span class="form-control">
					{{dataObj.assembly_number}}
				</span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="assembly_number1">
					{{lang_009}} {{required}}
				</span>
				<span class="form-control">
					{{dataObj.revision}}
				</span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="assembly_number1">
					{{lang_010}} {{required}}
				</span>
				<span class="form-control">
					{{dataObj.sale_order}}
				</span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="assembly_number1">
					{{lang_011}} {{required}}
				</span>
				<span class="form-control">
					{{dataObj.format}}
				</span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="assembly_number1">
					{{lang_012}} {{required}}
				</span>
				<span class="form-control">
					{{dataObj.format_example}}
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
	<script src="../js/main.js" type="text/javascript"></script>

	<script type="text/javascript">
	var jsonData =<?php echo $jsonString?>;
	(function(){
		console.log(jsonData);
		console.log(jsonData.username);
	    // Grab the template script $("homeview-template").html()
		var myInfo = document.getElementById("homeview-template").innerHTML;

		// Compile the template
		var template = Handlebars.compile(myInfo);

		// Define our data object
		var data = {
			app_name: "SerialScan",
			lang_001:"session_user: ",
			lang_002:"session_login_time: ",
			lang_003:"New Session",
			lang_004:"Save & close session",
			lang_005:" Toggle-Edit",
			lang_006:" Text-size",
			lang_007:" Print or &nbsp<kbd>ctrl&nbsp+&nbspp</kbd>",
			lang_008:"Assembly number  ",
			lang_009:"Revision ",
			lang_010:"Sale Order ",
			lang_011:"Format ",
			lang_012:"Format Example ",
			lang_013:"new serial number (auto-submit)",
			logo_size: "border:0;max-width:40px;max-height:40px;",
			logo_file: "../img/serialscan.png",
			ent: 'Express Manufacturing Inc.',
			cmod_link: '<a href="cmod_console.php"><span class="label label-default no-print"><span class="glyphicon glyphicon-cog"></span>&nbspCMOD&nbsp<span class="glyphicon glyphicon-barcode"></span>&nbsp<span class="glyphicon glyphicon-qrcode"></span></span></a>',
			dataObj:{
				primary_key: jsonData.primary_key,
			    assembly_number: jsonData.assembly_number,
			    revision: jsonData.revision,
			    sale_order: jsonData.sale_order,
			    format: jsonData.format,
			    format_example: jsonData.format_example,
			    access_level: jsonData.access_level,
			    username: jsonData.username,
			    time: jsonData.time,
			    sessionId: 'md5#0001'
			}
		};
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
		document.getElementById("homeviewData").innerHTML += template(data);
	})();
	</script>


</body>
</html>