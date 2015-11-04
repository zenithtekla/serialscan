function doToggle(id) {
    var e= document.getElementById(id);
    if ( e.style.display == 'block' )
            e.style.display = 'none';
        else
            e.style.display = 'block';
}

window.onload = function() {
  var mime = 'text/x-mariadb';
  // get mime type
  if (window.location.href.indexOf('mime=') > -1) {
    mime = window.location.href.substr(window.location.href.indexOf('mime=') + 5);
  }
  $("#edelQ").hide();
  $("#mycode").val($.trim($("#mycode").val()));
  var editor = CodeMirror.fromTextArea(document.getElementById('mycode', 'exec_code'), {
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

    function doQuery(){
    $("#edelQ").show();
    var q = editor.getValue().trim();
    $("#output").append( q + "\n\n");
    var r = $("#output").text();
    CodeMirror.runMode( r, "text/x-mariadb", document.getElementById("output"));
    $("#edelQ").animate({"scrollTop": $("#edelQ")[0].scrollHeight}, "slow");
    
    $.ajax({
        type:'POST',
        url: '../controller/cmod_query.php',
        data: {qr: q},
        // contentType: "application/json; charset=utf-8"
    }). done(function(data){
        $('#querytulos').empty().append("<pre>" + data + "</pre>");
        // $('#querytulos').css({"max-height":150+'px'}, {"overflow-y":"auto"});
    }).fail(function(jqXHR, textStatus, errorThrown){
        console.log('ERROR', textStatus, errorThrown);
    });
}
/*function doHighlight() {
    
    document.getElementById("myBtn").style.display = 'none';
    document.getElementById("myForm").style.display = 'none';
}*/

$(function(){
    $("#myBtn").on({
        click: function(e){
            e.preventDefault();
            doQuery();
        }
    })
})

};

// search func
function reloadSearch() {
    if(!isLoading){
        var q = $('#haku').val();
        if (q.length >= 3) {
            isLoading = true;
            // ajax fetch the data
            $.ajax({
                type:'get',
                url:'../controller/cmod_search.php',
                data: {hakuQ : q}
            }). done(function(data){
                $('#hakutulos').empty().html("fetching Result: <strong>" + data + "</strong>");
            })
            $('#hakusana').html("fetching...<i>" + q + "</i>");
            
            // enforce the delay
            setTimeout(function(){
                isLoading=false;
                if(isDirty){
                isDirty = false;
                reloadSearch();
                }
            }, delay);
        }
    }
};

var delay = 1000;
var isLoading = false;
var isDirty = false;
$(function() {
    reloadSearch();
    $("#haku").keyup(function(){
        isDirty = true;
        reloadSearch();
	});
});