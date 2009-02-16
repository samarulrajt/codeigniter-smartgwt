<html>
    <head>
        <base href="http://localhost/vehicle/">
        <title>Diadiem</title>
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
        <script type="text/javascript" src="http://localhost/vehicle/resources/jqGrid/jquery.jqGrid.js"></script>

        <!--  Utils for Page -->
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/inlinebox.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.validate.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.maskedinput-1.2.1.pack.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.form.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.field.min.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.autocomplete.js"></script>

        <script  type="text/javascript">
            var Diadiem = {};

            Diadiem.data = {};
            Diadiem.setDataField = function(fieldName,fieldValue)
            {
                Diadiem.data[fieldName] = fieldValue;
            }
            var tem = null;
            Diadiem.setData = function(data)
            {
                jQuery.each(data, function(name, value) {
                    Diadiem.data[name] = value;
                    $("#form_Diadiem input[name="+ name +"]").setValue(value);



                    if(parent.Chi_nhanh != null ){
                        parent.Chi_nhanh.setData( {'diemdiemID': Diadiem.data['diemdiemID'] } );
                        parent.Chi_nhanh.setSelectedTab();
                    }
                    if(parent.Nhat_ki_hanh_trinh != null ){                      
                        
                        if(tem == "diemdiemKT")
                            parent.Nhat_ki_hanh_trinh.setData( {'diemdiemKT': Diadiem.data['diemdiemID'] } );
                        else if(tem == "diemdiemKH")
                            parent.Nhat_ki_hanh_trinh.setData( {'diemdiemKH': Diadiem.data['diemdiemID'] } );
                       
                        parent.Nhat_ki_hanh_trinh.setSelectedTab();
                    }
                });
            }


            Diadiem.getData = function()
            {
                var obj = {};
                $.each( $("#form_Diadiem").formSerialize().split("&"), function(i,n)
                {
                    var toks = n.split("=");
                    obj[toks[0]] = toks[1];
                }
            );
                Diadiem.data = obj;
                return Diadiem.data;
            }

            //create
            Diadiem.Create = function()
            {
                if(!$("#form_Diadiem").valid())
                    return;
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_diadiem/create", $("#form_Diadiem").formToArray() ,
                function(message){
                    if(message != null){
                        InlineBox.hideAjaxLoader();
                        $("#list2").trigger("reloadGrid");
                        InlineBox.showModalBox("Tạo Diadiem " + message);
                    }
                });
            }

            //refresh grid
            Diadiem.Read = function()
            {
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_diadiem/read_json_format", {},
                function(data){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                });
            }

            //update
            Diadiem.Update = function()
            {
                if(!$("#form_Diadiem").valid())
                    return;

                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_diadiem/update", $("#form_Diadiem").formToArray() ,
                function(message){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                    InlineBox.showModalBox("Cập nhật Diadiem " + message);
                });
            }


            //delete
            Diadiem.Delete = function()
            {
                if(!$("#form_Diadiem").valid())
                    return;
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_diadiem/delete",$("#form_Diadiem").formToArray() ,
                function(message){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                    InlineBox.showModalBox("Xoá Diadiem " + message);
                });
            }

            Diadiem.getCurrentLatLon = function(){
                //var link = window.frames.mapmarker_iframe.document.getElementById("link").getAttribute("href");
                var link = $("#googlemarker_link").val();
                console.log(link);
                var ll = link.substring(link.search("ll=")+3,link.search("&spn=")).split(",");
                $("#lat").val(ll[0]);
                $("#lon").val(ll[1]);
                $("#googlemarker_link").val("");
            }

            Diadiem.showMap = function(){
                $("#mapmarker_iframe").slideToggle("normal");
            }

        </script>
    </head>

    <body>
        <iframe name='mapmarker_iframe' id='mapmarker_iframe' scrolling="auto" style="display:none;border: 0px none; width: 800px; height: 450px;" src="http://www.google.com/mapmaker">
        </iframe>


        <label for="googlemarker_link">Link: </label>
        <input type="text" id="googlemarker_link" name="googlemarker_link" value="" />
        <input type="button" value="Lấy LATLON" id="" onclick="Diadiem.getCurrentLatLon();" />
        <input type="button" value="Google Map Marker" id="" onclick="Diadiem.showMap();" />


        <div style="width: 930px;">
            <div class="box">
                <h1> Diadiem </h1>
                <hr>

                <form method="POST" id="form_Diadiem" action="http://localhost/vehicle/index.php/c_diadiem/">

                    <label>
                        <span>diemdiemID</span>
                        <input type="text" name="diemdiemID" value="" id="diemdiemID" class="input-text" onchange="Diadiem.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>lat</span>
                        <input type="text" name="lat" value="" id="lat" class="input-text" onchange="Diadiem.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>lon</span>
                        <input type="text" name="lon" value="" id="lon" class="input-text" onchange="Diadiem.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>diachi</span>
                        <input type="text" name="diachi" value="" id="diachi" class="input-text" onchange="Diadiem.setDataField(this.name,this.value);"  />
                    </label>
                </form>

                <div class="spacer" id="form_control" >
                    <a href="javascript:void(0)" onclick="Diadiem.Create()" class="green">Thêm</a>
                    <a href="javascript:void(0)" onclick="Diadiem.Update()" class="green">Cập nhập</a>
                    <a href="javascript:void(0)" onclick="Diadiem.Delete()" class="green">Xoá</a>
                </div>
                <div id="ajaxloader" style="display:none" >
                    <img  src="http://localhost/vehicle/resources/css/img/ajax-loader.gif" />
                </div>
            </div>
            <hr>
            <div>
                <table id="list2" class="scroll" style="margin-top:8px;" cellpadding="0" cellspacing="0"></table>
                <div id="pager2" class="scroll" style="text-align:center;"></div>
            </div>
        </div>


    </body>

    <script type="text/javascript">
        // $('#last_activity').val().toString()
        var jGrid = null;
        var colNamesT = new Array();
        var colModelT = new Array();
        var gridimgpath = 'http://localhost/vehicle/resources/jqGrid/themes/basic/images';

        colNamesT.push('diemdiemID');
        colModelT.push({name:'diemdiemID',index:'diemdiemID', editable: false});
        colNamesT.push('lat');
        colModelT.push({name:'lat',index:'lat', editable: false});
        colNamesT.push('lon');
        colModelT.push({name:'lon',index:'lon', editable: false});
        colNamesT.push('diachi');
        colModelT.push({name:'diachi',index:'diachi', editable: false});

        var loadView = function()
        {
            jGrid = jQuery("#list2").jqGrid(
            {
                url:'http://localhost/vehicle/index.php/c_diadiem/read_json_format',
                mtype : "POST",
                datatype: "json",
                colNames: colNamesT ,
                colModel: colModelT ,
                rowNum:10,
                height: 270,
                rowList:[10,20,30],
                imgpath: gridimgpath,
                pager: jQuery('#pager2'),
                sortname: colNamesT[0],
                viewrecords: true,
                caption:"diadiem",
                onSelectRow: function(){
                    var id = jQuery("#list2").getGridParam('selrow');
                    Diadiem.setData(jQuery("#list2").getRowData(id));
                }
            });
            jGrid.navGrid('#pager2',{edit:false,add:false,del:false, search: false, refresh: true});
            $("#alertmod").remove();//FIXME
        }
        jQuery("#list2").ready(loadView);


        var initForm = function(){
            //init validation form
            $("#form_Diadiem").validate();

            //init input mask

        }
        jQuery("#form_Diadiem").ready(initForm);

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