<head>
<link href="../css/default.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
  // intercept form submit and use Ajax http://stackoverflow.com/a/4069359
</script>

</head>
<body>
<section id="ui_data"></section>
<script type="text/template" id="ui_template">
	<div class="container" id="printable">
		<h2>{{lang_026}}</h2>
		<br/>
		<form action="../controller/cmod_enter_post.php" method="post">
			<p>{{lang_014}} {{required}} 	<input type="text" name="customer_name" required></p>
			<p>{{lang_008}} {{required}} 	<input type="text" name="assembly_number" required></p>
			<p>{{lang_009}} {{required}} 	<input type="text" name="revision" required></p>
			<p>{{lang_011}} {{required}} 	<input type="text" name="format" required></p>
			<p>{{lang_012}} {{required}} 	<input type="text" name="format_example" required></p>

			<input type="submit" value="{{lang_025}}"> <input type="reset" class="marginleft" value="{{lang_018}}">
		</form>
	</div>
</script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../plugin/handlebars/handlebars-v4.0.4.js"></script>
<script src="../model/ui/ui_data.js" type="text/javascript"></script>
<script type="text/javascript">
(function(){
    var content = document.getElementById('ui_data');

    var data = JSON.parse(localStorage.getItem("tpl_data"));

    Handlebars.registerHelper('bold',function(text){
        text = Handlebars.escapeExpression(text);
       return new Handlebars.SafeString('<b>'+text+'</b>');
    });
    Handlebars.registerHelper('italic',function(text){
        text = Handlebars.escapeExpression(text);
       return new Handlebars.SafeString('<i>'+text+'</i>');
    });
    Handlebars.registerHelper("required", function(){
			return new Handlebars.SafeString('<span class="required"> * </span>');
		});

    var template = Handlebars.compile(document.getElementById('ui_template').innerHTML);
    content.innerHTML += template(data);
})();
</script>
</body>