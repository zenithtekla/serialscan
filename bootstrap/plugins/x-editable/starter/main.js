$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'inline';
    //make username editable
    $('#username').editable({
    });
    $('#mytextbox').editable({
    });

    $('#field').editable({
        type:  'input',
        pk:    1,
        name:  'assembly-number',
        url:   'post.php',
    });

    //make field editable
    $('#field').click(function(){
        $('#field').editable({
            type:  'input',
            pk:    1,
            name:  'assembly-number',
            url:   'post.php',
        });
    });

    $(".canedit").editable({
        type: "text", // send: 'always' above?
        title: 'enter SO', //edit description
        name:  'assembly-number', // emptytext: 'Click here to add a description!',
        placeholder: 'Description goes here.',
        mode: "inline",
        escape: false,
        validate: function(value) {
            if (value.match(/cat/i)) {
                return "What's about the dog? Please, just no talking about cats!";
            }

            if($.trim(value) == '')
                    return 'Value is required.';

            var regexp = new RegExp("[0-9]"); // http://stackoverflow.com/questions/22524791/taking-decimal-inputs-for-x-editable-field

            if (!regexp.test(value)) {
                return 'This field is not valid';
            }

        },
        ajaxOptions: { url: 'post.php'},
        params: function(params) { // http://stackoverflow.com/questions/16744965/how-do-i-stop-a-bootstrap-x-editable-from-updating-an-edited-field-when-ajax-cal
            var d = new $.Deferred;
            console.log("id of element changed: " + params.name);
            console.log("new value: " + params.value);
            setTimeout(function() {
                // to simulate some asynchronous processing
                d.resolve();
            }, 500); // http://tutorials.jenkov.com/jquery/deferred-objects.html#codeBox
            return d.promise();
        }
    });

    //make status editable
    $('#status').editable({
        type: 'select',
        title: 'Select status',
        placement: 'right',
        value: 2,
        source: [
            {value: 1, text: 'status 1'},
            {value: 2, text: 'status 2'},
            {value: 3, text: 'status 3'}
        ]
        /*
        //uncomment these lines to send data on server
        ,pk: 1
        ,url: '/post'
        */
    });
});