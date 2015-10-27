<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SerialScan app</title>

	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="../plugin/jquery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../plugin/jqueryui/jquery-ui.min.js"></script>
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

</head>
<body>
	<?php
	echo '
	<div class="container">
		<!-- Console Log -->
		<article>

			<h2>Query InputArea</h2>
			<button id="toggleEditing" onclick="doToggle(\'foo\');">Toggle</button>
			<div id="foo">Toggle displayed text.</div>

			<pre id="output" class="cm-s-default"></pre><br>

		<div class="row">
		    <div id="query" class="col-lg-6 input-xl margin-left">'?>
				<form id="myForm">
				<textarea id="code" name="code" class="field span12" cols="140" rows="10" placeholder="Enter a short synopsis">-- SQL Code Sample
				CREATE TABLE IF NOT EXISTS `seriscan_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  -- id = formatId
  `format` varchar(60) NOT NULL,
  `format_example` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;
				</textarea>
				</form>
		<?php
		echo '
				<p><strong>MIME types defined:</strong>
				    <code><a href="?mime=simplemode">simplemode</a></code>,
				    <code><a href="?mime=text/x-sql">text/x-sql</a></code>,
				    <code><a href="?mime=text/x-mysql">text/x-mysql</a></code>,
				    <code><a href="?mime=text/x-mariadb">text/x-mariadb</a></code>,
			        <code><a href="?mime=text/x-cassandra">text/x-cassandra</a></code>,
		            <code><a href="?mime=text/x-plsql">text/x-plsql</a></code>,
		            <code><a href="?mime=text/x-mssql">text/x-mssql</a></code>,
				    <code><a href="?mime=text/x-hive">text/x-hive</a></code>.
				</p>

		      <span class="input-group-btn">
		        <button id="myBtn" onclick="doHighlight();" class="btn btn-success" type="button"><span class="glyphicon glyphicon-search"></span>&nbspQuery</button>
		      </span>
		    </div>
		</div><!-- /row -->
		<br>
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
	<script>
		document.getElementById('code').focus();
		document.getElementById('code').select();
		function doToggle(id) {
		    var e= document.getElementById(id);
		    if ( e.style.display == 'block' )
		            e.style.display = 'none';
		        else
		            e.style.display = 'block';
		}

		function doHighlight() {
		    CodeMirror.runMode("Running script:\n\n" + document.getElementById("code").value, "text/x-mariadb",
		                     document.getElementById("output"));
		    document.getElementById("myBtn").style.display = 'none';
		    document.getElementById("myForm").style.display = 'none';
		}

		window.onload = function() {
		  var mime = 'text/x-mariadb';
		  // get mime type
		  if (window.location.href.indexOf('mime=') > -1) {
		    mime = window.location.href.substr(window.location.href.indexOf('mime=') + 5);
		  }
		  var editor = CodeMirror.fromTextArea(document.getElementById('code', 'exec_code'), {
		    mode: mime,
		    keyMap: "sublime",
		    indentWithTabs: true,
		    smartIndent: true,
		    lineNumbers: true,
		    autoCloseBrackets: true,
		    matchBrackets : true,
		    showCursorWhenSelecting: true,
		    theme: "monokai",
		    tabSize: 2,
		    autofocus: true,
		    extraKeys: {"Ctrl-Space": "autocomplete"},
		    hintOptions: {tables: {
		      users: {name: null, score: null, birthDate: null},
		      countries: {name: null, population: null, size: null}
		    }}
		  });
		  editor.execCommand("selectAll");
		};
	</script>
</body>
</html>