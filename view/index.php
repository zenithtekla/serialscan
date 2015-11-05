<head>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="../plugin/jquery/jquery-1.11.3.min.js"></script>
</head>
<body>
    <section id="myData"></section>
    
    <script src="../plugin/handlebars/handlebars-v4.0.4.js"></script>
    
    <script id="url-template" type="text/template">
    <div class="container">
        {{bold title}}
        {{#link}}
            <h3><div><a href="{{url}}">{{label}}</a></div></h3><br/>
        {{/link}}
    </div>
    </script>
    
    <script src="../js/script.js"></script>
</body>

<?php
// header("refresh:2; url=front.php");
