<html>
    <head>
        <base href="http://localhost/vehicle/">
        <title>Chi_nhanh</title>
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
            var Chi_nhanh = {};

            Chi_nhanh.data = {};
            Chi_nhanh.setDataField = function(fieldName,fieldValue)
            {
                Chi_nhanh.data[fieldName] = fieldValue;
            }

            Chi_nhanh.setData = function(data)
            {
                jQuery.each(data, function(name, value) {
                    Chi_nhanh.data[name] = value;
                    $("#form_Chi_nhanh input[name="+ name +"]").setValue(value);
                });
            }


            Chi_nhanh.getData = function()
            {
                var obj = {};
                $.each( $("#form_Chi_nhanh").formSerialize().split("&"), function(i,n)
                {
                    var toks = n.split("=");
                    obj[toks[0]] = toks[1];
                }
            );
                Chi_nhanh.data = obj;
                return Chi_nhanh.data;
            }

            //create
            Chi_nhanh.Create = function()
            {
                if(!$("#form_Chi_nhanh").valid())
                    return;
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_chi_nhanh/create", $("#form_Chi_nhanh").formToArray() ,
                function(message){
                    if(message != null){
                        InlineBox.hideAjaxLoader();
                        $("#list2").trigger("reloadGrid");
                        InlineBox.showModalBox("Tạo Chi_nhanh " + message);
                    }
                });
            }

            //refresh grid
            Chi_nhanh.Read = function()
            {
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_chi_nhanh/read_json_format", {},
                function(data){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                });
            }

            //update
            Chi_nhanh.Update = function()
            {
                if(!$("#form_Chi_nhanh").valid())
                    return;

                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_chi_nhanh/update", $("#form_Chi_nhanh").formToArray() ,
                function(message){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                    InlineBox.showModalBox("Cập nhật Chi_nhanh " + message);
                });
            }


            //delete
            Chi_nhanh.Delete = function()
            {
                if(!$("#form_Chi_nhanh").valid())
                    return;
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_chi_nhanh/delete",$("#form_Chi_nhanh").formToArray() ,
                function(message){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                    InlineBox.showModalBox("Xoá Chi_nhanh " + message);
                });
            }

            Chi_nhanh.currentRowID = null;

            Chi_nhanh.setSelectedRow = function(id)
            {
                Chi_nhanh.currentRowID = id;
            }

            Chi_nhanh.setSelectedTab = function(){
                $('#container-1 > ul').tabs('select',0);
            }

           
        </script>
    </head>

    <body>
        <div id="container-1">
            <ul>
                <li><a href="#fragment-1"><span>Thông tin chi nhánh</span></a></li>
                <li><a href="#fragment-2"><span>Danh sách chi nhánh</span></a></li>
                <li><a href="#fragment-3"><span>Quản lý địa điểm </span></a></li>
            </ul>
            <div id="fragment-1">
                <div style="width: 930px;">
                    <div class="box">
                        <h1> Chi Nhánh </h1>
                        <hr>

                        <form method="POST" id="form_Chi_nhanh" action="http://localhost/vehicle/index.php/c_chi_nhanh/">

                            <label>
                                <span>MS chi nhánh</span>
                                <input type="text" name="MS_CHI_NHANH" value="" id="MS_CHI_NHANH" class="input-text required" onchange="Chi_nhanh.setDataField(this.name,this.value);"  />
                            </label>

                            <label>
                                <span>Tên chi nhánh</span>
                                <input type="text" name="TEN_CHI_NHANH" value="" id="TEN_CHI_NHANH" class="input-text required" onchange="Chi_nhanh.setDataField(this.name,this.value);"  />
                            </label>


                            <label>
                                <span>Địa điểm</span>
                                <input type="text" name="diemdiemID" value="" id="diemdiemID" class="input-text" onclick="$('#container-1 > ul').tabs('select', 2);"  />
                            </label>
                        </form>

                        <div class="spacer" id="form_control" >
                            <a href="javascript:void(0)" onclick="Chi_nhanh.Create()" class="green">Thêm</a>
                            <a href="javascript:void(0)" onclick="Chi_nhanh.Update()" class="green">Cập nhập</a>
                            <a href="javascript:void(0)" onclick="Chi_nhanh.Delete()" class="green">Xoá</a>
                        </div>
                        <div id="ajaxloader" style="display:none" >
                            <img  src="http://localhost/vehicle/resources/css/img/ajax-loader.gif" />
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
            <div id="fragment-2">
                <div>
                    <table id="list2" class="scroll" style="margin-top:8px;" cellpadding="0" cellspacing="0"></table>
                    <div id="pager2" class="scroll" style="text-align:center;"></div>
                </div>
            </div>
            <div id="fragment-3">
                <iframe name='image_vehicle_iframe' id='image_vehicle_iframe' scrolling="auto" style="border: 0px none; width: 880px; height: 780px;" src="http://localhost/vehicle/index.php/c_diadiem/"></iframe>
            </div>
        </div>

    </body>

    <script type="text/javascript">
        // $('#last_activity').val().toString()
        var jGrid = null;
        var colNamesT = new Array();
        var colModelT = new Array();
        var gridimgpath = 'http://localhost/vehicle/resources/jqGrid/themes/basic/images';

        colNamesT.push('MS_CHI_NHANH');
        colModelT.push({name:'MS_CHI_NHANH',index:'MS_CHI_NHANH', editable: false});
        colNamesT.push('TEN_CHI_NHANH');
        colModelT.push({name:'TEN_CHI_NHANH',index:'TEN_CHI_NHANH', editable: false});
        colNamesT.push('diemdiemID');
        colModelT.push({name:'diemdiemID',index:'diemdiemID', editable: false});

        var loadView = function()
        {
            jGrid = jQuery("#list2").jqGrid(
            {
                url:'http://localhost/vehicle/index.php/c_chi_nhanh/read_json_format',
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
                caption:"Chi nhánh",
                onSelectRow: function(){
                    var id = jQuery("#list2").getGridParam('selrow');
                    Chi_nhanh.setData(jQuery("#list2").getRowData(id));
                }
            });
            jGrid.navGrid('#pager2',{edit:false,add:false,del:false, search: false, refresh: true});
            $("#alertmod").remove();//FIXME
        }
        jQuery("#list2").ready(loadView);


        var initForm = function(){
            //init validation form
            $("#form_Chi_nhanh").validate();

            //init input mask
            //$("#MS_CHI_NHANH").mask("cn99aaaaa");
            $('#container-1 > ul').tabs();
        }
        jQuery("#form_Chi_nhanh").ready(initForm);

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