<head>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="../plugin/jquery/jquery-1.11.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <section id="myData"></section>
    
    <script src="../plugin/handlebars/handlebars-v4.0.4.js"></script>
    
    <script id="url-template" type="text/template">
    <div class="container col-md-offset-3">
        <br>
        <div class="col-md-offset-2">
            {{bold title}}
        </div>
        <br>
        {{#link}}
            <h3><div><a href="{{url}}">{{label}}</a></div></h3><br/>
        {{/link}}
    </div>
    </script>
    
    <script src="../js/index_script.js"></script>
</body>

<?php
// header("refresh:2; url=front.php");
