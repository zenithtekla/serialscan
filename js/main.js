$(document).ready(function() {
    $("#printable").find('.print').on('click', function() {
      $("#printable").print({
        deferred: $.Deferred(),
        timeout: 250
      });
    });
    $("#scan_result").on({
        mouseenter: function(){
            $(this).css("background-color", "lightgray");
        },  
        mouseleave: function(){
            $(this).css("background-color", "lightblue");
        }, 
        click: function(){
            $(this).css("background-color", "yellow");
        },
        keyup: function(e){
            e.preventDefault();
            switch (e.which) {
                case 13:
                    $("#virhe_kuvaus").empty().append('  you press "Enter"!');
                    $("#virhe_kuvaus").show(); // ajax to scan_proc.php
                    setTimeout(function () { $("#virhe_kuvaus").hide(); }, 2000 );
                    var q = $(this).val();
                    // console.log(q);
                    $.ajax({
                        type:'POST',
                        url: '../controller/scan_proc.php',
                        data: { qr: q},
                        //contentType: "application/json",
                        // dataType: 'json'
                    }).done(function(data){
                        $("#virhe") .removeClass("alert-danger")
                                    .addClass("alert-success");
                        $("#virhe").empty().append("last scan: " + data);
                        $("#main-wrapper")  .append( data + "<br/>")
                                            .addClass("bg-success")
                                            .css({  "max-height":"300px", 
                                                    "overflow-y" : "auto" })
                        .animate({"scrollTop": $("#main-wrapper")[0].scrollHeight}, "slow");
                    }).fail(function(jqXHR,textStatus, errorThrown){
                        $("#virhe").empty().append('!ERROR: ' + textStatus + ", " + errorThrown);
                        console.log('ERROR', textStatus, errorThrown);
                    });
                    break;
                case 1:
                    $("#virhe_kuvaus").empty().append('  you have left-clicked!');
                    $("#virhe_kuvaus").show();
                    setTimeout(function () { $("#virhe_kuvaus").hide(); }, 2000 );
                    break;
                case 9:
                    $("#virhe_kuvaus").empty().append('  you press "Tab"!');
                    $("#virhe_kuvaus").show();
                    setTimeout(function () { $("#virhe_kuvaus").hide(); }, 2000 );
                    break;
            }
        }
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
          if (data.is_logout) window.location = "../controller/core/logout.php";
        },"json");
    }); /*
    
    $('#is_logout').on('click',function(){
            $.post("../controller/core/is_logout.php", {is_logout : true}, function(data){
                console.log(data);
                var arr = $.parseJSON(data);
                console.log(arr);
                if (arr.is_logout)
                    window.location = "../controller/core/logout.php";
            });
    }); */
});