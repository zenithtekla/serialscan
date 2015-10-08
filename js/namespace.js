<script type="application/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="application/javascript">

    /*In a nutshell, namespacing is a way to protect your code using javascript object literal notation to provide encapsulation. Minimizing your code’s footprint in this root scope by structuring your methods/data inside a single namespace should be the goal of every decent developer. The advantages are that you can name your variables whatever you like and not have to worry about some other code overwriting it’s value. In this post I’m going to show you nested object namespacing because this is the most common form of namespacing in jQuery.
    http://www.sitepoint.com/jquery-function-namespacing-plain-english/

    jQuery4u = {
                    multiply : function (x,y){
                        return (x*y);
                    },
                    another_func : function(){}
                }
    jQuery4u.multiply(2,2);

    //sub-namespace

    var MYNAMESPACE = {};
    MYNAMESPACE.SUBNAME = {

        myFunction: function()
        {
            console.log('running MYNAMESPACE.SUBNAME.myFunction...');
        }

    }
    MYNAMESPACE.SUBNAME.myFunction(); //function call
    */



    $(document).ready(function() {
        (function () {
            $.fn.AppRedirect = function() {
                this.sendRequest = parts.sendRequest;
                this.doRedirect = parts.doRedirect;

                return this;
            }

            var parts = {

                doRedirect: function() {
                    console.log('doRedirect');
                },

                sendRequest: function() {
                    console.log('sendRequest');
                }

            };
        })();

        $("body").AppRedirect().sendRequest();
        $("body").AppRedirect().doRedirect();
    });

    //You do not need any of that weirdness, to use stuff like $.each you just attach functions to the function object instead of the prototype object:

    function Constructor() {
        if (!(this instanceof Constructor)) {
            return new Constructor();
        }
    }

    Constructor.prototype = {

        each: function() {
            return "instance method";
        }

    };

    Constructor.each = function() {
        return "static method";
    };


    var a = Constructor();

    a.each(); //"instance method"
    Constructor.each(); //"static method"

    // small
    (function($){
        $.fn.extend({
            clicked: function() {
                return this.bind('click.clicked', function() {
                    $(this).addClass('clicked');
                });
            },
            unclicked: function() {
                retun this.removeClass('clicked').unbind('click.clicked');
            }
        });
    })(jQuery);
</script>