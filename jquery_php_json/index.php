<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Test</title>
        <script type="text/javascript" src="/jquery_php_json/js/jquery/jquery.core.js"></script>
        <script type="text/javascript" src="/jquery_php_json/js/jquery/jquery.json-1.3.js"></script>
    </head>
    <body>
        <script type="text/javascript">
            if (typeof K2 == "undefined") var K2 = {};
            if (typeof K2.Reflection == "undefined") K2.Reflection = {};

            K2.Reflection.GetProperties = function(obj){
                var props = new Array();
                for (var s in obj)
                {
                    if (typeof(obj[s]) != "function") {
                        props[props.length] = s;
                    }
                }
                return props;
            };

            K2.Reflection.GetMethods = function(obj){
                var methods = new Array();

                for (var s in obj)
                {
                    if (typeof(obj[s]) == "function") {
                        methods[methods.length] = s;
                    }
                }

                return methods;
            };



            function  ABC() {
                this.initFromJSON = function(json){
                    var obj = jQuery.evalJSON(json);
                    for(var e in obj) {
                        if(typeof(this[e]) != "function") {
                            this[e] = obj[e];
                        }
                    }
                    return this;
                }
                this.toJSONString = function() {
                    var o = {};
                    for(var e in this){                        
                        if(typeof(this[e]) != "function")
                        {                            
                            console.log(this[e]);
                            o[e] = this[e];
                        }
                    }  
                    return jQuery.toJSON(o);
                }
            
                this.a = 0;
                this.b = "";
                this.c = 0.0;                
            }

            function callTest()
            {
                var url = "http://localhost/jquery_php_json/test.php";
                var callback = function(a)
                {
                    a = jQuery.trim(a);
                    jQuery("#server_reponse").html(a);           

                    //init data got from server
                    var abc = new ABC();
                    abc.initFromJSON(a);
                    console.log( abc );

                    //modify client data and show
                    abc.a = 223.23;
                    abc.b = true;
                    console.log( abc.toJSONString() );
                }
                jQuery.post(url, {}, callback);
            }
        </script>

        <input type="button" value="Test" onclick="callTest()" />

        <div id="server_reponse"></div>
  
    </body>
</html>
