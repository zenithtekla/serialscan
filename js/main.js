(function(){
    // Grab the template script $("ui_template").html()
	var myInfo = document.getElementById("ui_template").innerHTML;

	// Compile the template
	var template = Handlebars.compile(myInfo);

	// Define our data object -- tpl_data portion re-allocated.
	var data = JSON.parse(localStorage.getItem("tpl_data"));

	Handlebars.registerHelper("required", function(){
		return new Handlebars.SafeString('<span class="required"> * </span>');
	});
	Handlebars.registerHelper("notGreater", function(num1, num2, options){
		if (num2 > num1){
			return options.fn(this);
		} else {
			return options.inverse(this);
		}
	});
	// Pass our data to the template and add the compiled html to the page
	document.getElementById("ui_data").innerHTML += template(data);
})();

$(document).ready(function() {
    $("#haku-painike").on('click', function() {
       console.log('klikataa tästä');
       $("#virhe_kuvaus")  .addClass("alert-info")
                                        .empty().append(' olet klikannut tästä! ');
    });
    $('#printable .print').on('click', function() {
      $("#printable").print({
        deferred: $.Deferred(),
        timeout: 250
      });
    });
    var myfunc = function(q){
        setTimeout(function () { $("#virhe_kuvaus").removeClass("alert-info").hide(); }, 3500 );
        console.log(regex_format);
        // upfront validation
        var regex = new RegExp(regex_format);
        if(regex.test(q)) {
            $.ajax({
                type:'POST',
                url: '../controller/scan_proc.php',
                data: { new_scan: q, regex: regex_format}
                //contentType: "application/json",
                // dataType: 'json'
            }).done(function(data){
                if (data.indexOf('ERROR')>-1){
                    $("#virhe") .removeClass("alert-success")
                                .addClass("alert-danger");
                    $("#virhe").empty().append("Attention: " + data);
                } else {
                    $("#virhe_kuvaus")  .addClass("alert-info")
                                    .empty().append(' input saved with {Enter} key ! ');
                    $("#virhe_kuvaus").show(); // ajax to scan_proc.php

                    $("#virhe") .removeClass("alert-danger")
                                .addClass("alert-success");

                    $("#virhe").empty().append("last scan: " + data);
                    $("#log-wrapper")  .append( data + "<br/>")
                                        .addClass("bg-success")
                                        .css({  "max-height":"300px",
                                                "overflow-y" : "auto" })
                    .animate({"scrollTop": $("#log-wrapper")[0].scrollHeight}, "slow");
                }
            }).fail(function(jqXHR,textStatus, errorThrown){
                $("#virhe") .removeClass("alert-success")
                            .addClass("alert-danger")
                            .empty().append('!ERROR: ' + textStatus + ", " + errorThrown);
                console.log('ERROR', textStatus, errorThrown);
            });
        } else {
            $("#virhe") .removeClass("alert-success")
                            .addClass("alert-danger");
            $("#virhe").empty().append("ERROR - regEx not matched!");
            setTimeout(function () { $("#virhe").removeClass("alert-danger").hide(); }, 10000 );
        }
    };
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
                    myfunc($(this).val());
                    break;
                case 35:
                    myfunc($(this).val());
                     $("#virhe_kuvaus")  .addClass("alert-info")
                                        .empty().append(' input saved with \'End\' key ! ');
                    break;
                case 1:
                    $("#virhe_kuvaus")  .addClass("alert-info")
                                        .empty().append(' input saved with {left-clicked} key ! ');
                    $("#virhe_kuvaus").show();
                    setTimeout(function () { $("#virhe_kuvaus").removeClass("alert-info").hide(); }, 3500 );
                    break;
                case 9:
                    $("#virhe_kuvaus")  .addClass("alert-info")
                                        .empty().append(' input saved with {Tab} key ! ');
                    $("#virhe_kuvaus").show();
                    setTimeout(function () { $("#virhe_kuvaus").removeClass("alert-info").hide(); }, 3500 );
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

    $('#is_logout').on('click',function(e){
        e.preventDefault();
        $.post("../controller/core/is_logout.php", {"is_logout": true}, function(data){
          if (data.is_logout) window.location.replace("../controller/core/logout.php");
        },"json");
    }); /*

    $('#is_logout').on('click',function(){
            $.post("../controller/core/is_logout.php", {is_logout : true}, function(data){
                console.log(data);
                var arr = $.parseJSON(data);
                console.log(arr);
                if (arr.is_logout)
                    window.location.replace("../controller/core/logout.php");
            });
    }); */
});