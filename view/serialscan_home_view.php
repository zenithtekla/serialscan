<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SerialScan app</title>
	<link href="../css/default.css" rel="stylesheet">
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="../bootstrap/js/bootstrap.min.js"></script>
  	<link href="../bootstrap/plugins/bootstrap-editable-v1.1.4/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
	<script src="../bootstrap/plugins/bootstrap-editable-v1.1.4/bootstrap-editable/js/bootstrap-editable.min.js"></script>
	<script src="../bootstrap/plugins/jQuery-Plugin-Js/jQuery.print.js"></script>
	<script src="../js/main.js" type="text/javascript"></script>
	<noscript>This webApp requires Javascript</noscript>
</head>
<body>
	<?php

	$t_assembly_number = '#content_holder_001';
	$t_revision = '#content_holder_002';
	$t_sale_order = '#content_holder_003';
	$t_virhe = '<strong>Warning! #ERROR</strong>_placeholder_001';
	$t_virhe_kuvaus = '<strong>#ERR</strong>_description_placeholder_002';
	$t_sessionId = 'md5#0001';
	$t_company_name = 'Express Manufacturing Inc.';
	$t_logo_file = 'serialscan.png';
	echo '
		<div class="container" id="printable">
		<div id="logo-section" class="page-header row">
			<div id="logo" class="col-lg-3"><a href="cmod_view.php"><span class="label label-default no-print"><span class="glyphicon glyphicon-cog"></span>&nbspCMOD&nbsp<span class="glyphicon glyphicon-barcode"></span>&nbsp<span class="glyphicon glyphicon-qrcode"></span></span></a>&nbsp&nbsp<img src="' . $t_logo_file . '" alt="SerialScan" id="logo"></div>
			<div id="company-name" class="col-lg-3"><span id="entreprise" class="entreprise"> ' . $t_company_name . '</span></div>
			<div id="session-id" class="col-lg-3 no-print"><span id="sessionId"> ' . $t_sessionId . '</span></div>
			<div id="bouton" class="col-lg-3 no-print">
				<button type="submit" class="btn btn-success save-button">New Session</button>&nbsp
				<button type="submit" class="btn btn-danger">Save & close session</button>
			</div>
		</div><!-- /row -->

		<div id="top-function-wrapper" class="btn-group floatright marginright">
			<button type="button" id="muokkaus-painike" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span>&nbspToggle-Edit</button>
			<button type="button" id="suuruus-painike" class="btn btn-primary"><span class="glyphicon glyphicon-text-size"></span>&nbspText-size</button>
			<button type="button" id="tulostaa-painike" class="btn btn-primary print"><span class="glyphicon glyphicon-print"></span>&nbsp&nbspPrint or &nbsp<kbd>ctrl&nbsp+&nbspp</kbd></button>
		</div>

		<div id="head-info-wrapper" class="row">
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="assembly-number1">Assembly number&nbsp<span class="required">*</span></span>
				<span class="form-control"><a href="#" id="assembly-number"></a></span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="sizing-addon1">Revision &nbsp<span class="required">*</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
				<span class="form-control"><a href="#" id="revision"></a></span>
			</div>
			<div id="general_input" class="input-group input-group-sm col-sm-4">
				<span class="input-group-addon" id="sizing-addon1">Sale Order &nbsp<span class="required">*</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
				<span class="form-control"><a href="#" id="sale-order"></a></span>
			</div>
		</div>

		<div id="main-wrapper" class="col-md-11 pull-right right-scroll">
			<p>DataTable:</p>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Serial Number</th>
					 </tr>
				</thead>
				<tbody>
					<tr>
						<td>John</td>
						<td>Doe</td>
					</tr>
					<tr>
						<td>Mary</td>
						<td>Moe</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="row no-print">
		<div id="scan_input" class="input-group input-group-lg col-lg-offset-4 col-lg-5 col-centered">
		  <span class="input-group-addon" id="sizing-addon1">#</span>
		  <input type="text" id="scan_result" class="form-control" placeholder="new serial number (auto-submit)" aria-describedby="sizing-addon1">
		</div>
		</div><!-- /row -->
		<div id="konsoli_loki">	<div id="virhe" class="alert alert-danger"> ' 		. $t_virhe . '</div>
								<div id="virhe_kuvaus" class="alert alert-info"> ' 	. $t_virhe_kuvaus . '</div>
		</div>

		</div><!-- end of container -->
	';
	/* 	<input type="button" id="painike" 	value="Toggle-Edit"></div>
		<input type="button" id="painike" 	value="Sizing"></div>
		<input type="button" id="tulostaa" 	value="Print"></div> 		*/
	?>
</body>
</html>