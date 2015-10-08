<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SerialScan app</title>
	<link href="css/default.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="bootstrap/js/bootstrap.min.js"></script>
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
		<div class="container">
		<div id="logo-section" class="page-header row">
			<div id="logo" class="col-lg-3"><a href="cmod_view.php"><span class="label label-default"><span class="glyphicon glyphicon-cog"></span>&nbspCMOD&nbsp<span class="glyphicon glyphicon-barcode"></span>&nbsp<span class="glyphicon glyphicon-qrcode"></span></span></a>&nbsp&nbsp<img src="' . $t_logo_file . '" alt="SerialScan" id="logo"></div>
			<div id="company-name" class="col-lg-3"><span id="entreprise" class="entreprise"> ' . $t_company_name . '</span></div>
			<div id="session-id" class="col-lg-3"><span id="sessionId"> ' . $t_sessionId . '</span></div>
			<div id="bouton" class="col-lg-3">
				<button type="submit" class="btn btn-success save_button">New Session</button>&nbsp
				<button type="submit" class="btn btn-danger">Save & close session</button>
			</div>
		</div><!-- /row -->

		<div id="top-function-wrapper" class="btn-group floatright marginright">
			<button type="button" id="muokkaus-painike" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span>&nbspToggle-Edit</button>
			<button type="button" id="suuruus-painike" class="btn btn-primary"><span class="glyphicon glyphicon-text-size"></span>&nbspText-size</button>
			<button type="button" id="suuruus-painike" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>&nbsp&nbspPrint or &nbsp<kbd>ctrl&nbsp+&nbspp</kbd></button>
		</div>

		<div id="head-info-wrapper" class="row">
			<div id="assembly-number">	Assembly number: '	. $t_assembly_number . ' </div>
			<div id="revision">			Revision: ' 		. $t_revision		 . ' </div>
			<div id="sale-order">		Sale Order: ' 		. $t_sale_order		 . ' </div>
		</div>

		<div id="main-wrapper" class="col-md-11 pull-right">
		    <div id="main">
		    <div class="page-header"><h3>Scroll text</h3></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget magna et ante suscipit lacinia. Aenean porttitor velit id pretium blandit. Aenean ut sodales ante. Ut faucibus ornare venenatis. Duis sit amet arcu eros. Mauris volutpat vestibulum congue.
				Nulla tincidunt augue vel dolor convallis lobortis. Nunc nibh dolor, tincidunt elementum lorem id, porta imperdiet neque. Quisque egestas lacus nec magna mattis aliquam. Nunc eget orci odio. Quisque neque odio, lobortis a orci ut, tempus feugiat tortor. Quisque et tincidunt arcu. Sed vel accumsan risus. Quisque enim ipsum, luctus vitae ultrices at, vulputate eu lorem. Curabitur at nibh sagittis, lobortis odio nec, sodales velit.

				Mauris in ullamcorper sapien. Morbi imperdiet consequat luctus. Donec vestibulum dapibus libero elementum posuere. Quisque posuere ipsum turpis, nec porttitor eros lobortis vel. Proin porttitor consequat adipiscing. Proin posuere orci odio, in pellentesque elit dapibus eu. Sed aliquam mollis hendrerit. Sed quis sapien nisl. Duis a bibendum tortor, nec malesuada justo. Sed luctus lorem nec velit consequat, vel ultricies lorem pulvinar.
			</p>
    		</div>
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
					<tr>
						<td>July</td>
						<td>Dooley</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="row">
		<div id="scan_input" class="input-group input-group-lg col-lg-offset-4 col-lg-5 col-centered">
		  <span class="input-group-addon" id="sizing-addon1">#</span>
		  <input type="text" id="scan_result" class="form-control" placeholder="new serial number (auto-submit)" aria-describedby="sizing-addon1">
		</div>
		</div><!-- /row -->
		<div id="konsoli_loki">	<div id="virhe" class="alert alert-danger"> ' 		. $t_virhe . '</div>
								<div id="virhe_kuvaus" class="alert alert-info"> ' 	. $t_virhe_kuvaus . '</div>
		</div>

		</div>
	';
	/* 	<input type="button" id="painike" 	value="Toggle-Edit"></div>
		<input type="button" id="painike" 	value="Sizing"></div>
		<input type="button" id="tulostaa" 	value="Print"></div> 		*/
	?>
</body>
</html>