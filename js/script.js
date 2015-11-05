(function(){
    var content = document.getElementById('myData');
    var html = '';
    var data = {
        title: 'Serial_Scan webApp homePage',
        link: [
            {
                url:'https://serialscan-cloud-zenithtekla.c9.io/view/front.php',
                label:'Operating user Front page'
            },
            {
                url:'https://serialscan-cloud-zenithtekla.c9.io/view/cmod_enter.php',
                label:'CMOD_entry_interface'
            },
            {
                url:'https://serialscan-cloud-zenithtekla.c9.io/view/cmod_view.php',
                label:'CMOD_terminal'
            }
        ]
    };
    Handlebars.registerHelper('bold',function(text){
        text = Handlebars.escapeExpression(text);
       return Handlebars.SafeString('<b>'+text+'</b>');
    });
    var template = Handlebars.compile(document.getElementById('url-template').innerHTML);
    content.innerHTML = template(data);
})();
