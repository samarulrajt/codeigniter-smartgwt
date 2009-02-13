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

        <div id="map_canvas" style="width: 650px; height: 550px">

        </div>

        <br>

        <div style="width: 930px;">
            <div class="box">
                <h1> Xe </h1>
                <hr>

                <form method="POST" id="main_form" action="http://localhost/vehicle/index.php/c_xe/">

                    <label>
                        <span>STT xe</span>
                        <input type="text" name="STT_XE" value="" id="STT_XE" class="input-text" onchange="Xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Số ĐK</span>
                        <input type="text" name="SO_DANG_KY_XE" value="" id="SO_DANG_KY_XE" class="input-text" onchange="Xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Số model xe</span>
                        <input type="text" name="MS_MODEL_XE" value="" id="MS_MODEL_XE" class="input-text" onchange="Xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>MS Thiết bị</span>
                        <input type="text" name="MS_THIET_BI" value="" id="MS_THIET_BI" class="input-text" onchange="Xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Thể tích thật</span>
                        <input type="text" name="THE_TICH_THAT" value="" id="THE_TICH_THAT" class="input-text" onchange="Xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Ngày cập nhật</span>
                        <input type="text" name="NGAY_CAP_NHAT" value="" id="NGAY_CAP_NHAT" class="input-text" onchange="Xe.setDataField(this.name,this.value);"  />
                    </label>
                </form>

                <div class="spacer" id="form_control" >
                    <a href="javascript:void(0)" onclick="Xe.Create()" class="green">Thêm</a>
                    <a href="javascript:void(0)" onclick="Xe.Update()" class="green">Cập nhập</a>
                    <a href="javascript:void(0)" onclick="Xe.Delete()" class="green">Xoá</a>
                </div>
                <div id="ajaxloader" style="display:none" >
                    <img  src="http://localhost/vehicle/resources/css/img/ajax-loader.gif" />
                </div>
            </div>
            <hr>

        </div>


    </body>

    <script type="text/javascript">



        var initForm = function(){
            //init validation form
            $("#main_form").validate();

            //init input mask

            if (GBrowserIsCompatible()) {
                var map = new GMap2(document.getElementById("map_canvas"));
                map.setCenter(new  GLatLng(10.7534,106.6290), 15, G_SATELLITE_MAP);

                map.addControl(new GSmallMapControl());
                map.addControl(new GMapTypeControl());
                map.setMapType(G_SATELLITE_MAP);

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
                    new GLatLng(10.7534,106.6290),
                    new GLatLng(10.7539,106.6299),
                    new GLatLng(10.750890416685106,106.63033962249756)
                ], "#FF0000", 10);
                map.addOverlay(polyline);

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