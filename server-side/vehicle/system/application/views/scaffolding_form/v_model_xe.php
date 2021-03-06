<html>
    <head>
        <base href="http://localhost/vehicle/">
        <title>Model_xe</title>
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
            var Model_xe = {};

Model_xe.data = {};
Model_xe.setDataField = function(fieldName,fieldValue)
    {
        Model_xe.data[fieldName] = fieldValue;
    }

 Model_xe.setData = function(data)
    {
        jQuery.each(data, function(name, value) {
           Model_xe.data[name] = value;
            $("#main_form input[name="+ name +"]").setValue(value);
        });
    }


Model_xe.getData = function()
    {
        var obj = {};
        $.each( $("#main_form").formSerialize().split("&"), function(i,n)
                        {
                            var toks = n.split("=");
                            obj[toks[0]] = toks[1];
                        }
        );        
        Model_xe.data = obj;
        return Model_xe.data;
    }

    //create
Model_xe.Create = function()
    {
        if(!$("#main_form").valid())
            return;
        InlineBox.showAjaxLoader();
        jQuery.post("http://localhost/vehicle/index.php/c_model_xe/create", $("#main_form").formToArray() ,
        function(message){
            if(message != null){
                InlineBox.hideAjaxLoader();
                $("#list2").trigger("reloadGrid");
                InlineBox.showModalBox("Tạo Model_xe " + message);
            }
        });
    }

    //refresh grid
Model_xe.Read = function()
    {
        InlineBox.showAjaxLoader();
        jQuery.post("http://localhost/vehicle/index.php/c_model_xe/read_json_format", {},
        function(data){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
        });
    }

    //update
Model_xe.Update = function()
    {
        if(!$("#main_form").valid())
            return;

        InlineBox.showAjaxLoader();
        jQuery.post("http://localhost/vehicle/index.php/c_model_xe/update", $("#main_form").formToArray() ,
        function(message){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
            InlineBox.showModalBox("Cập nhật Model_xe " + message);
        });
    }


    //delete
Model_xe.Delete = function()
    {
        if(!$("#main_form").valid())
            return;
        InlineBox.showAjaxLoader();
        jQuery.post("http://localhost/vehicle/index.php/c_model_xe/delete",$("#main_form").formToArray() ,
        function(message){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
            InlineBox.showModalBox("Xoá Model_xe " + message);
        });
    }

Model_xe.currentRowID = null;

Model_xe.setSelectedRow = function(id)
    {
        Model_xe.currentRowID = id;
    }

    var inputDate = {};
    $( function() {
    });
        </script>
    </head>

    <body>  
        <div style="width: 930px;">
            <div class="box">
                <h1> Model Xe </h1>
                <hr>

                <form method="POST" id="main_form" action="http://localhost/vehicle/index.php/c_model_xe/">
                                        
                    <label>
                        <span>STT</span>
                        <input type="text" name="STT_MODEL_XE" value="" id="STT_MODEL_XE" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>Mã số model xe</span>
                        <input type="text" name="MS_MODEL_XE" value="" id="MS_MODEL_XE" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>Loại model</span>
                        <input type="text" name="LOAI_MODEL" value="" id="LOAI_MODEL" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>Nhãn hiệu</span>
                        <input type="text" name="NHAN_HIEU" value="" id="NHAN_HIEU" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>MS Thuế</span>
                        <input type="text" name="MS_THUE" value="" id="MS_THUE" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>Nhiên liệu</span>
                        <input type="text" name="FUEL" value="" id="FUEL" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>PTAC</span>
                        <input type="text" name="PTAC" value="" id="PTAC" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>Trọng tải</span>
                        <input type="text" name="PAYLOAD" value="" id="PAYLOAD" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>Diện tích sàn</span>
                        <input type="text" name="FLOOR_AREA" value="" id="FLOOR_AREA" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>Loai xe</span>
                        <input type="text" name="GENRE" value="" id="GENRE" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>Số sườn</span>
                        <input type="text" name="SO_SUON" value="" id="SO_SUON" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                        
                    <label>
                        <span>KM_METER_AVAILABLE</span>
                        <input type="text" name="KM_METER_AVAILABLE" value="" id="KM_METER_AVAILABLE" class="input-text" onchange="Model_xe.setDataField(this.name,this.value);"  />
                    </label>                    
                                    </form>

                <div class="spacer" id="form_control" >
                    <a href="javascript:void(0)" onclick="Model_xe.Create()" class="green">Thêm</a>
                    <a href="javascript:void(0)" onclick="Model_xe.Update()" class="green">Cập nhập</a>
                    <a href="javascript:void(0)" onclick="Model_xe.Delete()" class="green">Xoá</a>
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

    colNamesT.push('STT_MODEL_XE');
    colModelT.push({name:'STT_MODEL_XE',index:'STT_MODEL_XE', editable: false});
    colNamesT.push('MS_MODEL_XE');
    colModelT.push({name:'MS_MODEL_XE',index:'MS_MODEL_XE', editable: false});
    colNamesT.push('LOAI_MODEL');
    colModelT.push({name:'LOAI_MODEL',index:'LOAI_MODEL', editable: false});
    colNamesT.push('NHAN_HIEU');
    colModelT.push({name:'NHAN_HIEU',index:'NHAN_HIEU', editable: false});
    colNamesT.push('MS_THUE');
    colModelT.push({name:'MS_THUE',index:'MS_THUE', editable: false});
    colNamesT.push('FUEL');
    colModelT.push({name:'FUEL',index:'FUEL', editable: false});
    colNamesT.push('PTAC');
    colModelT.push({name:'PTAC',index:'PTAC', editable: false});
    colNamesT.push('PAYLOAD');
    colModelT.push({name:'PAYLOAD',index:'PAYLOAD', editable: false});
    colNamesT.push('FLOOR_AREA');
    colModelT.push({name:'FLOOR_AREA',index:'FLOOR_AREA', editable: false});
    colNamesT.push('GENRE');
    colModelT.push({name:'GENRE',index:'GENRE', editable: false});
    colNamesT.push('SO_SUON');
    colModelT.push({name:'SO_SUON',index:'SO_SUON', editable: false});
    colNamesT.push('KM_METER_AVAILABLE');
    colModelT.push({name:'KM_METER_AVAILABLE',index:'KM_METER_AVAILABLE', editable: false});

    var loadView = function()
    {
        jGrid = jQuery("#list2").jqGrid(
        {
            url:'http://localhost/vehicle/index.php/c_model_xe/read_json_format',
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
            caption:"Model Xe",
            onSelectRow: function(){
                var id = jQuery("#list2").getGridParam('selrow');
                 Model_xe.setData(jQuery("#list2").getRowData(id));
            }
        });
        jGrid.navGrid('#pager2',{edit:false,add:false,del:false, search: false, refresh: true});
        $("#alertmod").remove();//FIXME
    }
    jQuery("#list2").ready(loadView);


    var initForm = function(){
        //init validation form
        $("#main_form").validate();

        //init input mask

    }
    jQuery("#main_form").ready(initForm);

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