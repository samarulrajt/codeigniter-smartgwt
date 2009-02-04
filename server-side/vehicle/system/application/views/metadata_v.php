<html>
    <head>
        <base href="http://localhost/vehicle/">
        <title>Metadata</title>
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

        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/inlinebox.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.validate.js"></script>
        <script type="text/javascript" src="http://localhost/vehicle/resources/utils/jquery.maskedinput-1.2.1.pack.js"></script>



        <script  type="text/javascript">
            var Metadata = {};

Metadata.data = {};
Metadata.setDataField = function(fieldName,fieldValue)
    {
        Metadata.data[fieldName] = fieldValue;
    }

 Metadata.setData = function(data)
    {
        jQuery.each(data, function(name, value) {
           Metadata.data[name] = value;
            $('#main_form [name='+ name +']').val( value );
        });
    }


Metadata.getData = function()
    {
        var arr = $('#main_form').serializeArray();
        for(var e in arr)  {
        Metadata.data[arr[e].name] = arr[e].value;
        }
        return Metadata.data;
    }

    //create
Metadata.Create = function()
    {
        if(!$("#main_form").valid())
            return;
        InlineBox.showAjaxLoader();
        jQuery.post("http://localhost/vehicle/index.php/metadata_c/create", Metadata.getData() ,
        function(message){
            if(message != null){
                InlineBox.hideAjaxLoader();
                $("#list2").trigger("reloadGrid");
                InlineBox.showModalBox("Tạo Metadata " + message);
            }
        });
    }

    //refresh grid
Metadata.Read = function()
    {
        InlineBox.showAjaxLoader();
        jQuery.post("http://localhost/vehicle/index.php/metadata_c/read_json_format", {},
        function(data){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
        });
    }

    //update
Metadata.Update = function()
    {
        if(!$("#main_form").valid())
            return;

        InlineBox.showAjaxLoader();
        jQuery.post("http://localhost/vehicle/index.php/metadata_c/update", Metadata.getData() ,
        function(message){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
            InlineBox.showModalBox("Cập nhật Metadata " + message);
        });
    }


    //delete
Metadata.Delete = function()
    {
        if(!$("#main_form").valid())
            return;
        InlineBox.showAjaxLoader();
        jQuery.post("http://localhost/vehicle/index.php/metadata_c/delete",Metadata.getData() ,
        function(message){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
            InlineBox.showModalBox("Xoá Metadata " + message);
        });
    }

Metadata.currentRowID = null;

Metadata.setSelectedRow = function(id)
    {
        Metadata.currentRowID = id;
    }

    var inputDate = {};
    $( function() {
    });
        </script>
    </head>

    <body>
        <?php echo validation_errors(); ?>
        <div style="width: 930px;">
            <div class="box">
                <h1> Metadata </h1>
                <hr>

                <form method="POST" id="main_form" >
                                                            <label>
                        <span>id</span>
                        <input type="text" name="id" value="" id="id" class="input-text" onchange="Metadata.setDataField(this.name,this.value);"  />
                    </label>
                                                                                <label>
                        <span>tablename</span>
                        <input type="text" name="tablename" value="" id="tablename" class="input-text" onchange="Metadata.setDataField(this.name,this.value);"  />
                    </label>
                                                                                <label>
                        <span>use_scaffolding</span>
                        <input type="text" name="use_scaffolding" value="" id="use_scaffolding" class="input-text" onchange="Metadata.setDataField(this.name,this.value);"  />
                    </label>
                                                        </form>

                <div class="spacer" id="form_control" >
                    <a href="javascript:void(0)" onclick="Metadata.Create()" class="green">Thêm</a>
                    <a href="javascript:void(0)" onclick="Metadata.Update()" class="green">Cập nhập</a>
                    <a href="javascript:void(0)" onclick="Metadata.Delete()" class="green">Xoá</a>
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

    colNamesT.push('id');
    colModelT.push({name:'id',index:'id', editable: false});
    colNamesT.push('tablename');
    colModelT.push({name:'tablename',index:'tablename', editable: false});
    colNamesT.push('use_scaffolding');
    colModelT.push({name:'use_scaffolding',index:'use_scaffolding', editable: false});

    var loadView = function()
    {
        jGrid = jQuery("#list2").jqGrid(
        {
            url:'http://localhost/vehicle/index.php/metadata_c/read_json_format',
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
            caption:"metadata",
            onSelectRow: function(){
                var id = jQuery("#list2").getGridParam('selrow');
                 Metadata.setData(jQuery("#list2").getRowData(id));
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