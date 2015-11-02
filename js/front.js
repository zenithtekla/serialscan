var $t_format_example = $( this ).find( 'input:hidden' );
// "../model/json_db/formats.json"

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
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `data` is an array of country names defined in "The Basics"
        local: $.map(data, function(obj) { 
            return { value : obj.format + ", example: " + obj.format_example };
        })
      });
    
      // kicks off the loading/processing of `local` and `prefetch`
      engine.initialize();
      
      $('#async .typeahead').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'data',
        displayKey: 'value',
        // `ttAdapter` wraps the suggestion engine in an adapter that
        // is compatible with the typeahead jQuery plugin
        source: engine.ttAdapter()
      });
  })
  .fail(function(jqXHR, textStatus, errorThrown){
    console.log('ERROR', textStatus, errorThrown);
  }); // at sitepoint below they use only jqXHR, textStatus
  
