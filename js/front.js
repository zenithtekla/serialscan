(function(){
    var content = document.getElementById('myData');
    var html = '';
    var data = {
        title: 'Serial_Scan USER ACCESS',
        username: 'Login name',
        password: 'Password',
        sale_order: 'Sale Order',
        customer: 'Customer',
        assembly: 'Assembly',
        revision: 'Revision',
        format: 'Format',
        session: 'New session',
        reset: 'Reset'
    };
    Handlebars.registerHelper('heading',function(text){
        text = Handlebars.escapeExpression(text);
       return new Handlebars.SafeString('<h2>'+text+'</h2>');
    });
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

    var template = Handlebars.compile(document.getElementById('url-template').innerHTML);
    content.innerHTML += template(data);
})();

$.ajax({
  dataType: "json",
  url: "../model/json_db/customers.php"})
  .done( function(data) {
    /*    $.each(data,function(i,v){
            console.log(v.format);
            $.each(v,function(i,va){
                console.log(va);
            })
        });
      $.map(data, function(obj) { 
        console.log(obj.format + "example" + obj.format_example);
      }); http://forum.jquery.com/topic/jquery-and-json-troubles */
      // constructs the suggestion engine
      var engine = new Bloodhound({
        datumTokenizer: function (datum) {
          return Bloodhound.tokenizers.whitespace(datum.value);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `data` is an array of country names defined in "The Basics"
        local: $.map(data, function(obj) { 
            return { value : obj.name, eg: obj.assembly_number };
        }),
        limit: 10
      });
    
      // kicks off the loading/processing of `local` and `prefetch`
      engine.initialize();

      // Instantiate the Typeahead UI
      $('#customer .typeahead').typeahead(null, {
          name: 'data',
          displayKey: 'value',
          hint: true,
          highlight: true,
          minLength: 1,
          source: engine.ttAdapter(),
          templates: {
              empty: [
                '<div class="empty-message">',
                  'Result not found',
                '</div>'
              ].join('\n'),
              suggestion: Handlebars.compile("<div style='padding:6px'><b>{{value}}</b> - assembly_number : {{eg}} </div>"),
              footer: function (data) {
                return Handlebars.compile("<div>Searched for <strong> {{data.query}} </strong></div>");
                // return '<div>Searched for <strong>' + data.query + '</strong></div>';
              }
          }
      });
  })
  .fail(function(jqXHR, textStatus, errorThrown){
    console.log('ERROR', textStatus, errorThrown);
  }); 



$('#customer .typeahead').bind('typeahead:select', function(ev, suggestion) {
  $('input:hidden').val(suggestion.eg);
  console.log($('input:hidden').val());
  console.log('Selection: ' + JSON.stringify(suggestion));
  
  var myData = JSON.stringify({"assembly_number": suggestion.eg});
  $("#result").append(myData + "<br/>");

  $.ajax({
    type:"POST",
    url: "../model/json_db/assembly.php",
    data: {"assembly_number": suggestion.eg},
    dataType: 'json',
  })
  .done( function(data) {
    $("#result").append(data.assembly_number);
    /*    $.each(data,function(i,v){
            console.log(v.format);
            $.each(v,function(i,va){
                console.log(va);
            })
        });
      $.map(data, function(obj) { 
        console.log(obj.format + "example" + obj.format_example);
      }); http://forum.jquery.com/topic/jquery-and-json-troubles */
      // constructs the suggestion engine
      var engine = new Bloodhound({
        datumTokenizer: function (datum) {
          return Bloodhound.tokenizers.whitespace(datum.eg);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `data` is an array of country names defined in "The Basics"
        local: $.map(data, function(obj) { 
            return { value : obj.formatId, eg: obj.revision };
        }),
        limit: 10
      });
    
      // kicks off the loading/processing of `local` and `prefetch`
      engine.initialize();

      // Instantiate the Typeahead UI
      $('#assembly .typeahead').typeahead(null, {
          name: 'data',
          displayKey: 'eg',
          hint: true,
          highlight: true,
          minLength: 1,
          source: engine.ttAdapter(),
          templates: {
              empty: [
                '<div class="empty-message">',
                  'Result not found',
                '</div>'
              ].join('\n'),
              suggestion: Handlebars.compile("<div style='padding:6px'><b>{{eg}}</b> - format : {{value}} </div>"),
              footer: function (data) {
                return Handlebars.compile("<div>Searched for <strong> {{data.query}} </strong></div>");
                // return '<div>Searched for <strong>' + data.query + '</strong></div>';
              }
          }
      });
  })
  .fail(function(jqXHR, textStatus, errorThrown){
    console.log(jqXHR, textStatus, errorThrown);
  });
});

$('#assembly .typeahead').bind('typeahead:select', function(ev, suggestion) {
  console.log('Selection: ' + JSON.stringify(suggestion));
});
/*var $t_format_example = $( this ).find( 'input:hidden' );
  var foo = $('input.typeahead.tt-input').val();
  console.log(foo);
  $( this ).find( 'input:hidden' ).val(foo); */