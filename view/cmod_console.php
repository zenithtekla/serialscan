<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SerialScan app</title>

	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="../plugin/jquery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../plugin/jqueryui/jquery-ui.min.js"></script>
	<script src="../plugin/handlebars/handlebars-v4.0.4.js"></script>
  	<!-- duplicated <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  	<script src="../bootstrap/js/bootstrap.min.js"></script>

	<!-- insert Syntax Highlighter -->
  	<link rel="stylesheet" href="../plugin/codemirror/lib/codemirror.css">

	<link rel="stylesheet" href="../plugin/codemirror/addon/fold/foldgutter.css">
	<link rel="stylesheet" href="../plugin/codemirror/addon/dialog/dialog.css">
	<link rel="stylesheet" href="../plugin/codemirror/addon/display/fullscreen.css">
	<link rel="stylesheet" href="../plugin/codemirror/theme/monokai.css">

	<script src="../plugin/codemirror/lib/codemirror.js"></script>
	<script src="../plugin/codemirror/mode/sql/sql.js"></script>
	<link rel="stylesheet" href="../plugin/codemirror/addon/hint/show-hint.css" />
	<script src="../plugin/codemirror/addon/hint/show-hint.js"></script>
	<script src="../plugin/codemirror/addon/hint/sql-hint.js"></script>
	<script src="../plugin/codemirror/addon/search/searchcursor.js"></script>
	<script src="../plugin/codemirror/addon/runmode/runmode.js"></script>
	<script src="../plugin/codemirror/mode/xml/xml.js"></script>

	<script src="../plugin/codemirror/addon/search/search.js"></script>
	<script src="../plugin/codemirror/addon/dialog/dialog.js"></script>
	<script src="../plugin/codemirror/addon/edit/matchbrackets.js"></script>
	<script src="../plugin/codemirror/addon/edit/closebrackets.js"></script>
	<script src="../plugin/codemirror/addon/comment/comment.js"></script>
	<script src="../plugin/codemirror/addon/wrap/hardwrap.js"></script>
	<script src="../plugin/codemirror/addon/fold/foldcode.js"></script>
	<script src="../plugin/codemirror/addon/fold/brace-fold.js"></script>
	<script src="../plugin/codemirror/mode/javascript/javascript.js"></script>
	<script src="../plugin/codemirror/addon/display/fullscreen.js"></script>
	<script src="../plugin/codemirror/keymap/sublime.js"></script>
	<style type="text/css">
		#querytulos pre {
		  max-height: 250px;
		  overflow-y: auto;
		  color:green;
		  background-color: #ddd;
		}
		#edelQ {
		  max-height: 200px;
		  overflow-y: auto;
		  background-color: #F5F5F5;
		}
	</style>
</head>
<body>
<?php
	require_once('../controller/core/date_time.php');
	echo getDateTime();
?>
	<section id="ui_data"></section>
	<script type="text/template" id="ui_template">
	<div class="container">
	<article>
		<h3>{{app_name_ext2}}</h3>
		<button id="toggleEdit" onclick="doToggle(\'edelQ\');">{{lang_019}}</button><em>{{lang_020}}</em>
		<div id="edelQ"><pre id="output" class="cm-s-default"></pre></div>
		<br/>
		<br/>
		<div class="row">
		    <div id="query" class="col-lg-8 input-xl margin-left">
				<form id="myForm">
				<textarea id="mycode" name="code" class="field span12" cols="140" rows="10">
					-- SQL Code Sample
					CREATE TABLE IF NOT EXISTS `seriscan_format` (
						`id` int(11) NOT NULL AUTO_INCREMENT,
						-- id = formatId
						`format` varchar(60) NOT NULL,
						`format_example` varchar(60) NOT NULL,
						PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;
				</textarea>
				</form>

		<p><strong>{{lang_021}}</strong>
				    <code><a href="?mime=simplemode">simplemode</a></code>,
				    <code><a href="?mime=text/x-sql">text/x-sql</a></code>,
				    <code><a href="?mime=text/x-mysql">text/x-mysql</a></code>,
				    <code><a href="?mime=text/x-mariadb">text/x-mariadb</a></code>,
			        <code><a href="?mime=text/x-cassandra">text/x-cassandra</a></code>,
		            <code><a href="?mime=text/x-plsql">text/x-plsql</a></code>,
		            <code><a href="?mime=text/x-mssql">text/x-mssql</a></code>,
				    <code><a href="?mime=text/x-hive">text/x-hive</a></code>.
		</p>
		</div>
			<span class="input-group-btn">
				<button id="myBtn" class="btn btn-success" type="button">{{lang_022}}<span class="glyphicon glyphicon-menu-right"></span></button>
			</span>
		</div><!-- /row -->
		<div class="row">
			<div id="search" class="input-group">
			<input type="text" id="haku" class="form-control" placeholder="look for part">
			<span class="input-group-btn">
		    	<button id="haku-painike" class="btn btn-success" type="button"><span class="glyphicon glyphicon-search"></span>{{lang_023}}</button>
	      	</span>
		    </div><!-- /input-group -->
		    <div id="hakusana"></div>
		    <div id="hakutulos"></div>
		</div><!-- /row -->
		<br/>
		<button id="toggleEditing" onclick="doToggle(\'querytulos\');">{{lang_019}}</button> {{lang_024}}
		<div id="querytulos"></div>
	</div>
	</script>
	<script src="../js/ui_data.js" type="text/javascript"></script>
	<script src="../js/cmod_console.js" type="text/javascript"></script>
</body>
</html>