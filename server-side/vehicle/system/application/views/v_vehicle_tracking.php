<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="http://localhost/vehicle/">
        <title>Tracking Vehicle</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" type="text/css" media="screen" href="http://localhost/vehicle/resources/jqGrid/themes/basic/grid.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="http://localhost/vehicle/resources/theme/ui.all.css"  />
        <link rel="stylesheet" type="text/css" media="screen" href="http://localhost/vehicle/resources/css/main-app.css"  />

        <style type="text/css">
            .toggler { width: 250px; height: 125px; }
            #drop { width: 240px; height: 105px; padding: 0.4em; }
            #drop .ui-widget-header { margin: 0; padding: 0.4em; text-align: center; }
        </style>

        <script type="text/javascript" src="http://localhost/vehicle/resources/jquery-1.3.1.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/jquery.ui.all.js"></script>

        <!--  Utils for Page -->
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/inlinebox.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.validate.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.maskedinput-1.2.1.pack.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.form.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.field.min.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.autocomplete.js"></script>

        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAARCn-s2Rb8Qeo5T853_i8KhTOZcpRi3x4ZlxAD9RZHN-OsRMWtxSQpid_-Bah1NKhpWC5zY29rrD77g"
                type="text/javascript"></script>
        <script  type="text/javascript">
            var Xe = {};

            Xe.data = {};
            Xe.setDataField = function(fieldName,fieldValue)
            {
                Xe.data[fieldName] = fieldValue;
            }

            Xe.setData = function(data)
            {
                jQuery.each(data, function(name, value) {
                    Xe.data[name] = value;
                    $("#main_form input[name="+ name +"]").setValue(value);
                });
            }


            Xe.getData = function()
            {
                var obj = {};
                $.each( $("#main_form").formSerialize().split("&"), function(i,n)
                {
                    var toks = n.split("=");
                    obj[toks[0]] = toks[1];
                }
            );
                Xe.data = obj;
                return Xe.data;
            }

            //create
            Xe.Create = function()
            {
                if(!$("#main_form").valid())
                    return;
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_xe/create", Xe.getData() ,
                function(message){
                    if(message != null){
                        InlineBox.hideAjaxLoader();
                        $("#list2").trigger("reloadGrid");
                        InlineBox.showModalBox("Tạo Xe " + message);
                    }
                });
            }

            //refresh grid
            Xe.Read = function()
            {
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_xe/read_json_format", {},
                function(data){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                });
            }

            //update
            Xe.Update = function()
            {
                if(!$("#main_form").valid())
                    return;

                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_xe/update", Xe.getData() ,
                function(message){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                    InlineBox.showModalBox("Cập nhật Xe " + message);
                });
            }


            //delete
            Xe.Delete = function()
            {
                if(!$("#main_form").valid())
                    return;
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_xe/delete",Xe.getData() ,
                function(message){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                    InlineBox.showModalBox("Xoá Xe " + message);
                });
            }

            Xe.currentRowID = null;

            Xe.setSelectedRow = function(id)
            {
                Xe.currentRowID = id;
            }

            var inputDate = {};
            $( function() {
                inputDate['NGAY_CAP_NHAT'] = $("#NGAY_CAP_NHAT").datepicker({dateFormat:"yy/mm/dd"});
                $('#NGAY_CAP_NHAT').mask('9999/99/99');
                $('#NGAY_CAP_NHAT').validate({rules:{ require: true, date: true}});
            });



        </script>
    </head>

    <body>

        <div style="width: 930px;">
            <div class="box">
                <h1> Xe </h1>
                <hr>

                <form method="POST" id="main_form" action="http://localhost/vehicle/index.php/c_xe/">


                    <label>
                        <span>Số Đang ky Xe</span>
                        <input type="text" name="SO_DANG_KY_XE" value="" id="SO_DANG_KY_XE" class="input-text" onchange="Xe.setDataField(this.name,this.value);"  />
                    </label>
                </form>

                <div class="spacer" id="form_control" >
                    <input type="button" value="Tìm" onclick="test();"/>
                </div>
                <div id="ajaxloader" style="display:none" >
                    <img  src="http://localhost/vehicle/resources/css/img/ajax-loader.gif" />
                </div>
            </div>
            <hr>

        </div>
        <div id="map_container" style="width: 100%" >
            <table border="0">
                <tbody>
                    <tr>
                        <td>
                            <div id="map_canvas" style="width: 550px; height: 550px;">

                            </div>
                        </td>
                        <td VALIGN="top">
                            <div id="hanghoa" >
                                <div id="map_details1" style="width: 40%; height: 550px; display:none">
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th>Mã hãng</th>
                                                <th>Loai hang</th>
                                                <th>Tinh trang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>H001-SG1</td>
                                                <td>Buu pham</td>
                                                <td>Dang chuyen</td>
                                            </tr>
                                            <tr>
                                                <td>H002-SG1</td>
                                                <td>Buu pham</td>
                                                <td>Dang chuyen</td>
                                            </tr>
                                            <tr>
                                                <td>H002-BD1</td>
                                                <td>Buu pham</td>
                                                <td>Da chuyen xong</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="map_details2" style="width: 40%; height: 550px; display:none">
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th>Mã hãng</th>
                                                <th>Loai hang</th>
                                                <th>Tinh trang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>H078-SG1</td>
                                                <td>Buu pham</td>
                                                <td>Dang chuyen</td>
                                            </tr>
                                            <tr>
                                                <td>H006-SG1</td>
                                                <td>Buu pham</td>
                                                <td>Dang chuyen</td>
                                            </tr>
                                            <tr>
                                                <td>H004-BD1</td>
                                                <td>Buu pham</td>
                                                <td>Dang chuyen</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="map_details3" style="width: 40%; height: 550px; display:none">
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th>Mã hãng</th>
                                                <th>Loai hang</th>
                                                <th>Tinh trang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>H001-SG1</td>
                                                <td>Buu pham</td>
                                                <td>Dang chuyen</td>
                                            </tr>
                                            <tr>
                                                <td>H002-SG1</td>
                                                <td>Buu pham</td>
                                                <td>Dang chuyen</td>
                                            </tr>
                                            <tr>
                                                <td>H002-BD1</td>
                                                <td>Buu pham</td>
                                                <td>Da chuyen xong</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="map_details4" style="width: 40%; height: 550px; display:none">
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th>Mã hãng</th>
                                                <th>Loai hang</th>
                                                <th>Tinh trang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>H001-SG1</td>
                                                <td>Buu pham</td>
                                                <td>Dang chuyen</td>
                                            </tr>
                                            <tr>
                                                <td>H002-SG1</td>
                                                <td>Buu pham</td>
                                                <td>Dang chuyen</td>
                                            </tr>
                                            <tr>
                                                <td>H002-BD1</td>
                                                <td>Buu pham</td>
                                                <td>Da chuyen xong</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>



        </div>

        <br>




    </body>

    <script type="text/javascript">
        var xe = 1;

        function test(){
            if($("#SO_DANG_KY_XE").val() == "51-K12167"){
                xe = 1;

                $("#map_details1").show();
                $("#map_details2").hide();
                $("#map_details3").hide();
                $("#map_details4").hide();
            }
            else if($("#SO_DANG_KY_XE").val() == "55-M18818"){
                xe = 2;
                $("#map_details2").show();
                $("#map_details1").hide();
                $("#map_details3").hide();
                $("#map_details4").hide();
            }
            else if($("#SO_DANG_KY_XE").val() == "51-K18142"){
                xe = 3;
                $("#map_details3").show();
                $("#map_details1").hide();
                $("#map_details2").hide();
                $("#map_details4").hide();
            }
            else if($("#SO_DANG_KY_XE").val() == "51-M83998"){
                xe = 4;
                $("#map_details4").show();
                $("#map_details2").hide();
                $("#map_details3").hide();
                $("#map_details1").hide();
            }


            initForm();
        }


        var initForm = function(){
            //init validation form
            $("#main_form").validate();

            $("#SO_DANG_KY_XE").autocomplete("http://localhost/vehicle/index.php/c_xe/SO_DANG_KY_XE_suggestion", {
                width: 200,
                max: 4,
                highlight: false,
                scroll: true,
                scrollHeight: 300,
                formatItem: function(data, i, n, value) {
                    return "<img width=90 height=60 src='" + value.split("$$")[1] + "'/> " +  value.split("$$")[0];
                },
                formatResult: function(data, value) {
                    return  value.split("$$")[0];
                }
            });

            //init input mask

            if (GBrowserIsCompatible()) {
                var map = new GMap2(document.getElementById("map_canvas"));

                if(xe == 1){
                    map.setCenter(new  GLatLng(10.7534,106.6290), 13, G_SATELLITE_MAP);



                    map.addControl(new GScaleControl())


                    var img = "<img width='83'  src='http://localhost/vehicle/resources/images/80cd2fce08f6e4fccbd64c2f4bf1f4c9.jpg' />"
                    var text = "<span id='vehicle_marker' style='color:red;font-weight:bold'> xe 1"+ img +"</span>";

                    GEvent.addListener(marker, "dragstart", function() {
                        logLatLon();
                    });

                    GEvent.addListener(marker, "dragend", function() {
                        logLatLon();
                    });

                    map.addOverlay(marker);
                    var polyline = new GPolyline([
                        new GLatLng(10.75340,106.62900),
                        new GLatLng(10.754811,106.6305971),
                        new GLatLng(10.753926,106.6344165802002),
                        new GLatLng(10.75253,106.632270),
                        new GLatLng(10.741656,106.619009),
                        new GLatLng(10.72909,106.608581)
                    ], "#FF0000", 10);
                    map.addOverlay(polyline);
                }
                else  if(xe == 2){
                    point = new  GLatLng(10.778337,106.686516);
                    marker = new GMarker(point, {draggable: true});
                    map.setCenter(point , 13, G_SATELLITE_MAP);


                    map.addControl(new GScaleControl())


                    var img = "<img width='83'  src='http://www.t-shn.com/images.php?type=3&f=xeCarrytruck1226561269.jpg' />"
                    var text = "<span id='vehicle_marker' style='color:red;font-weight:bold'> xe 2"+ img +"</span>";

                    GEvent.addListener(marker, "dragstart", function() {
                        logLatLon();
                    });

                    GEvent.addListener(marker, "dragend", function() {
                        logLatLon();
                    });

                    map.addOverlay(marker);
                    var polyline = new GPolyline([
                        new  GLatLng(10.778337,106.686516),
                        new GLatLng(10.754811,106.6305971),
                        new GLatLng(10.753926,106.6344165802002),
                        new GLatLng(10.75253,106.632270),
                        new GLatLng(10.741656,106.619009),
                        new GLatLng(10.72909,106.608581)
                    ], "#FF0000", 10);
                    map.addOverlay(polyline);
                }
                else if(xe == 3){
                    point = new  GLatLng(10.778337,106.686516);
                    marker = new GMarker(point, {draggable: true});
                    map.setCenter(point , 13, G_SATELLITE_MAP);



                    map.addControl(new GScaleControl());


                    var img = "<img width='83'  src='http://localhost/vehicle/resources/images/images.jpg' />"
                    var text = "<span id='vehicle_marker' style='color:red;font-weight:bold'> xe 3"+ img +"</span>";

                    GEvent.addListener(marker, "dragstart", function() {
                        logLatLon();
                    });

                    GEvent.addListener(marker, "dragend", function() {
                        logLatLon();
                    });

                    map.addOverlay(marker);
                }
                else if(xe == 4){
                    point = new  GLatLng(10.759681,106.6728687);
                    marker = new GMarker(point, {draggable: true});
                    map.setCenter(point , 16, G_SATELLITE_MAP);

                    map.addOverlay(marker);
                    var polyline = new GPolyline([
                        new  GLatLng(10.75675088,106.685400009),
                        new GLatLng(10.754811,106.6305971),
                        new GLatLng(10.76145183,106.6899061),
                        new GLatLng(10.764466298,106.692502)

                    ], "#FF0000", 10);
                    map.addOverlay(polyline);

                    map.addControl(new GScaleControl());


                    var img = "<img width='83'  src='http://localhost/vehicle/resources/images/3e0cab7bb222a646f4f9c5903439e106.jpg' />"
                    var text = "<span id='vehicle_marker' style='color:red;font-weight:bold'> xe 4"+ img +"</span>";

                    GEvent.addListener(marker, "dragstart", function() {
                        logLatLon();
                    });

                    GEvent.addListener(marker, "dragend", function() {
                        logLatLon();
                    });

                    map.addOverlay(marker);
                };
                map.addControl(new GLargeMapControl());
                map.addControl(new GMapTypeControl());
                map.setMapType(G_SATELLITE_MAP);

                map.openInfoWindow(point, text);
            }

        }
        jQuery("#main_form").ready(initForm);

        var point = new GLatLng(10.75340,106.62900);
        var marker = new GMarker(point, {draggable: true});

        function logLatLon(){
            if( console != null )
                console.log( marker.getLatLng() );
        }

        function updateVehicleMarker() {
            point = new GLatLng(10.75381,106.63014)
            marker = new GMarker(point);
            initForm();
        }

        function bounceInfoWindow() {
            $("#vehicle_marker").effect("bounce", { times: 3,distance:25 }, 400);
        }



    </script>

    <div class="info-box" id="info-box" style="display:none">
        <div class="toggler">
            <div id="drop" class="ui-widget-content ui-corner-all">
                <h3 class="ui-widget-header ui-corner-all" id="info-box-header">info box</h3>
                <p>
                    <div id="info-box-msg" align="center" style="font-size:13px;font-weight: bold;"> content </div>
                </p>
                <center>
                    <input type="button" value="Đóng" id="inform-box-close" onclick="$('.info-box').toggle('drop')" />
                </center>
            </div>
        </div>
    </div>
</html>