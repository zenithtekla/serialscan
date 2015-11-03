$.ajax({
  dataType: "json",
  url: "../model/json_db/formats.php"})
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
            return { value : obj.format, eg: obj.format_example };
        }),
        limit: 10
      });
    
      // kicks off the loading/processing of `local` and `prefetch`
      engine.initialize();
      
      // $('#scrollable-dropdown-menu .typeahead').typeahead(null, {
      //   name: 'data',
      //   displayKey: 'value',
      //   hint: true,
      //   highlight: true,
      //   minLength: 1,
      //   // `ttAdapter` wraps the suggestion engine in an adapter that
      //   // is compatible with the typeahead jQuery plugin
      //   source: engine.ttAdapter(),
      //   templates: {
      //     empty: [
      //       '<div class="empty-message">',
      //         'Result not found',
      //       '</div>'
      //     ].join('\n'),
      //     suggestion: Handlebars.compile("<p style='padding:1px'><b>{{value}}</b> - example : {{eg}} </p>"),
      //     footer: Handlebars.compile("<b>Searched for {{value}}</b>")
      //   }
      // });
      // Instantiate the Typeahead UI
      $('#scrollable-dropdown-menu .typeahead').typeahead(null, {
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
              suggestion: Handlebars.compile("<div style='padding:6px'><b>{{value}}</b> - example : {{eg}} </div>"),
              // footer: "<b>Searched for "+ console.log($('input.typeahead.tt-input').val()+"</b>"
              footer: function (data) {
                // return Handlebars.compile("<b>Searched for {{data.query}} </b>")
                return '<div>Searched for <strong>' + data.query + '</strong></div>';
              }
          }
      });
  })
  .fail(function(jqXHR, textStatus, errorThrown){
    console.log('ERROR', textStatus, errorThrown);
  }); // at sitepoint below they use only jqXHR, textStatus

$('#scrollable-dropdown-menu .typeahead').bind('typeahead:select', function(ev, suggestion) {
  $('input:hidden').val(suggestion.eg);
  console.log($('input:hidden').val());
  console.log('Selection: ' + JSON.stringify(suggestion));
});

/*var $t_format_example = $( this ).find( 'input:hidden' );
  var foo = $('input.typeahead.tt-input').val();
  console.log(foo);
  $( this ).find( 'input:hidden' ).val(foo); */