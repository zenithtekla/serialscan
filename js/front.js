(function(){
    var content = document.getElementById('ui_data');
    var html = '';

    var data = JSON.parse(localStorage.getItem("tpl_data"));

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

    var template = Handlebars.compile(document.getElementById('ui_template').innerHTML);
    content.innerHTML += template(data);
})();

(function(){
var jqDeferred = $.ajax({
  type: "POST",
  dataType: "json",
  url: "../model/json_db/customer.php"});
  jqDeferred.then( function(data) {
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
            return { value : obj.customer_name, eg: obj.customer_id };
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
              suggestion: Handlebars.compile("<div style='padding:6px'>{{value}}</div>"),
              footer: function (data) {
                return Handlebars.compile("<div>Searched for <strong> {{{data.query}}} </strong></div>");
                // return '<div>Searched for <strong>' + data.query + '</strong></div>';
              }
          }
      });
  })
  .fail(function(jqXHR, textStatus, errorThrown){
    console.log('ERROR', textStatus, errorThrown);
  });
})();

(function(){
$('#customer .typeahead').bind('typeahead:select', function(ev, suggestion) {
  ev.stopPropagation();
  ev.preventDefault();
  $('#customer .typeahead').prop( "disabled", true );

  $('input[name="customer_id"]').val(suggestion.eg);

  console.log('Selection: ' + JSON.stringify(suggestion));
  var myData = JSON.stringify({"customer_id": suggestion.eg});
  $("#result").append(myData + "<br/>");

  var jqDeferred = $.ajax({
    type:"POST",
    url: "../model/json_db/assembly.php",
    data: {"customer_id": suggestion.eg},
    dataType: 'json',
  });
  jqDeferred.then( function(data) {

    // constructs the suggestion engine
    var engine = new Bloodhound({
      datumTokenizer: function (datum) {
        return Bloodhound.tokenizers.whitespace(datum.value);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // `data` is an array of country names defined in "The Basics"
      local: $.map(data, function(obj) {
          return { value : obj.assembly_number, eg: obj.revision };
      }),
      limit: 10
    });

    // kicks off the loading/processing of `local` and `prefetch`
    engine.initialize();

    // Instantiate the Typeahead UI
    $('#assembly .typeahead').typeahead(null, {
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
            suggestion: Handlebars.compile("<div style='padding:6px'>{{value}}</div>"),
            footer: function (data) {
              // return Handlebars.compile("<div>Searched for <strong> {{data.query}} </strong></div>");
              return '<div>Searched for <strong>' + data.query + '</strong></div>';
            }
        }
    });
    $('#customer .typeahead').typeahead('close');
    $('#assembly .typeahead').focus();
  })
  .fail(function(jqXHR, textStatus, errorThrown){
    console.log(jqXHR, textStatus, errorThrown);
  });
});
})();

(function(){
/*$('#assembly .typeahead').on('blur', function(event) {
  event.stopPropagation();
  $('#assembly .typeahead').typeahead('close');
});  */
$('#assembly .typeahead').bind('typeahead:select', function(ev, suggestion) {
  ev.stopPropagation();
  ev.preventDefault();
  $('#assembly .typeahead').prop( "disabled", true );

  console.log('Selection: ' + JSON.stringify(suggestion));
  var myData = JSON.stringify({"assembly_number": suggestion.value});
  $("#result").append(myData + "<br/>");

  var jqDeferred = $.ajax({
    type:"POST",
    url: "../model/json_db/revision.php",
    data: {"assembly_number": suggestion.value},
    dataType: 'json',
  });
  jqDeferred.then( function(data) {
      // constructs the suggestion engine
      var engine = new Bloodhound({
        datumTokenizer: function (datum) {
          return Bloodhound.tokenizers.whitespace(datum.value);
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `data` is an array of country names defined in "The Basics"
        local: $.map(data, function(obj) {
            return { value : obj.revision, eg: obj.assembly_id };
        }),
        limit: 10
      });

      // kicks off the loading/processing of `local` and `prefetch`
      engine.initialize();

      // Instantiate the Typeahead UI
      $('#revision .typeahead').typeahead(null, {
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
              suggestion: Handlebars.compile("<div style='padding:6px'>{{value}}</div>"),
              footer: function (data) {
                // return Handlebars.compile("<div>Searched for <strong> {{data.query}} </strong></div>");
                return '<div>Searched for <strong>' + data.query + '</strong></div>';
              }
          }
      });
      $('#assembly .typeahead').typeahead('close');
      $('#revision .typeahead').focus();
  })
  .fail(function(jqXHR, textStatus, errorThrown){
    console.log(jqXHR, textStatus, errorThrown);
  });
});
})();

(function(){
$('#revision .typeahead').bind('typeahead:select', function(ev, suggestion) {
  ev.stopPropagation();
  ev.preventDefault();
  $('#revision .typeahead').prop( "disabled", true );

  $('input[name="assembly_id"]').val(suggestion.eg);

  console.log('Selection: ' + JSON.stringify(suggestion));
  var myData = JSON.stringify({"assembly_id": suggestion.eg});
  $("#result").append(myData + "<br/>");

  var jqDeferred = $.ajax({
    type:"POST",
    url: "../model/json_db/format.php",
    data: {"assembly_id": suggestion.eg},
    dataType: 'json',
  });
  jqDeferred.then( function(data) {
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

      // Instantiate the Typeahead UI
      $('#format .typeahead').typeahead(null, {
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
              suggestion: Handlebars.compile("<div style='padding:6px'><b>{{value}}</b> - format_example : {{eg}} </div>"),
              footer: function (data) {
                // return Handlebars.compile("<div>Searched for <strong> {{data.query}} </strong></div>");
                return '<div>Searched for <strong>' + data.query + '</strong></div>';
              }
          }
      });
      $('#revision .typeahead').typeahead('close');
      $('#format .typeahead').focus();
  })
  .fail(function(jqXHR, textStatus, errorThrown){
    console.log(jqXHR, textStatus, errorThrown);
  });
});
})();

$('#format .typeahead').bind('typeahead:select', function(ev, suggestion) {
  ev.stopPropagation();
  ev.preventDefault();
  $('#format .typeahead').prop( "disabled", true );
  $('input[name="format_example"]').val(suggestion.eg);
  console.log($('input:hidden').val());
  var myData = JSON.stringify({"format": suggestion.value,"format_example": suggestion.eg});
  $("#result").append(myData + "<br/>");

  $('.button-submit').css({"border": "3px solid red","outline-width": "thin"})
                      .animate({outlineWidth: "20px"}, "slow");
});

$("input:submit").on('click', function(e){
  e.stopPropagation();

  if ($("input:password").val().length){
    $('.typeahead') .prop( "disabled", false );
    return true;
  } else e.preventDefault();
});

$("input:reset").on('click', function(){
  window.location.reload(); // css-style from http://www.cssbuttongenerator.com/
});

/*var $t_format_example = $( this ).find( 'input:hidden' );
  var foo = $('input.typeahead.tt-input').val();
  console.log(foo);
  $( this ).find( 'input:hidden' ).val(foo); */