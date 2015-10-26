$(document).ready(function() {
    $("#printable").find('.print').on('click', function() {
      $("#printable").print({
        deferred: $.Deferred(),
        timeout: 250
      });
    });
    // autofocus on scan field
/*    $('#scan_result').focus();

    $('#scan_result').scannerDetection({
      timeBeforeScanTest: 200, // wait for the next character for upto 200ms
      startChar: [120], // Prefix character for the cabled scanner (OPL6845R)
      endChar: [13], // be sure the scan is complete if key 13 (enter) is detected
      avgTimeByChar: 40, // it's not a barcode if a character takes longer than 40ms
      onKeyDetect: function(event){console.log(event.which); return false;}
      onComplete: function(barcode){
       // alert("# : ", barcode);
        $(this).parent().submit();
      } // main callback function
    }); */

    $('#is_logout').on('click',function(){
        $.post("../controller/core/is_logout.php", {"is_logout": true}, function(data){
          if (data.is_logout) alert("logging out!");
        },"json");
    });

    //make username required
    $('#new_username').editable('option', 'validate', function(v) {
       if(!v) return 'Required field!';
    });

    $('#password').editable('option', 'validate', function(v) {
       if(!v) return 'Required field!';
    });

    $('#assembly-number').editable('option', 'validate', function(v) {
       if(!v) return 'Required field!';
    });

    $('#revision').editable('option', 'validate', function(v) {
       if(!v) return 'Required field!';
    });

    $('#sale-order').editable('option', 'validate', function(v) {
       if(!v) return 'Required field!';
    });
});