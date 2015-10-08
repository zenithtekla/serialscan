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
	echo '
	<div class="container">
		<!-- Console Log -->
		<div id="row" class="col-md-11">
		    <div class="page-header"><h3>Console Log</h3></div>
            <p>Query result.....
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget magna et ante suscipit lacinia. Aenean porttitor velit id pretium blandit. Aenean ut sodales ante. Ut faucibus ornare venenatis. </p>
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
		</div><!-- /row -->

		<div class="row">
		    <div id="query" class="col-lg-6 input-xl margin-left">
		      <textarea id="query-input" class="field span12" cols="140" rows="10" placeholder="Enter a short synopsis"></textarea>
		      <span class="input-group-btn">
		        <button id="query-button" class="btn btn-success" type="button"><span class="glyphicon glyphicon-search"></span>&nbspQuery</button>
		      </span>
		    </div>
		</div><!-- /row -->

		<div class="row">
		    <div id="search" class="input-group">
		      <input type="text" id="haku" class="form-control" placeholder="look for part">
		      <span class="input-group-btn">
		        <button id="haku-painike" class="btn btn-success" type="button"><span class="glyphicon glyphicon-search"></span>&nbspSearch</button>
		      </span>
		    </div><!-- /input-group -->
		</div><!-- /row -->
	</div>
	';
	?>
</body>
</html>