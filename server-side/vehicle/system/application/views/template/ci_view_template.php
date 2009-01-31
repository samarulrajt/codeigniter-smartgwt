<html>
    <head>
        <base href="<?php echo base_url()?>">
        <title><?=ucwords($object_name)?></title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>resources/jqGrid/themes/basic/grid.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>resources/theme/ui.all.css"  />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>resources/css/main-app.css"  />
        <style type="text/css">
            .toggler { width: 250px; height: 125px; }
            #drop { width: 240px; height: 105px; padding: 0.4em; }
            #drop .ui-widget-header { margin: 0; padding: 0.4em; text-align: center; }
        </style>

        <script type="text/javascript" src="<?php echo base_url()?>resources/jquery-1.3.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>resources/jquery.ui.all.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>resources/jqGrid/jquery.jqGrid.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url()?>resources/utils/inlinebox.js"></script>        
        <script type="text/javascript" src="<?php echo base_url()?>resources/utils/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>resources/utils/jquery.maskedinput-1.2.1.pack.js"></script>



        <script  type="text/javascript">
            var <?=ucwords($object_name)?> = {};

    <?=ucwords($object_name)?>.data = {};
    <?=ucwords($object_name)?>.setData = function(fieldName,fieldValue)
        {
    <?=ucwords($object_name)?>.data[fieldName] = fieldValue;
        }

    <?=ucwords($object_name)?>.getData = function()
    {
        var arr = $('#main_form').serializeArray();
        for(var e in arr)  {
    <?=ucwords($object_name)?>.data[arr[e].name] = arr[e].value;
        }
        return <?=ucwords($object_name)?>.data;
    }

    //create
    <?=ucwords($object_name)?>.Create = function()
    {
        if(!$("#main_form").valid())
            return;
        InlineBox.showAjaxLoader();
        jQuery.post("<?php echo site_url("$object_name")?>_c/create", <?=ucwords($object_name)?>.getData() ,
        function(message){
            if(message != null){
                InlineBox.hideAjaxLoader();
                $("#list2").trigger("reloadGrid");
                InlineBox.showModalBox("Tạo <?=ucwords($object_name)?> " + message);
            }
        });
    }

    //refresh grid
    <?=ucwords($object_name)?>.Read = function()
    {
        InlineBox.showAjaxLoader();
        jQuery.post("<?php echo site_url("$object_name")?>_c/read_json_format", {},
        function(data){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
        });
    }

    //update
    <?=ucwords($object_name)?>.Update = function()
    {
       if(!$("#main_form").valid())
            return;

        InlineBox.showAjaxLoader();
        jQuery.post("<?php echo site_url("$object_name")?>_c/update", <?=ucwords($object_name)?>.getData() ,
        function(message){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
            InlineBox.showModalBox("Cập nhật <?=ucwords($object_name)?> " + message);
        });
    }


    //delete
    <?=ucwords($object_name)?>.Delete = function()
    {
        if(!$("#main_form").valid())
            return;
        InlineBox.showAjaxLoader();
        jQuery.post("<?php echo site_url("$object_name")?>_c/delete",<?=ucwords($object_name)?>.getData() ,
        function(message){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
            InlineBox.showModalBox("Xoá <?=ucwords($object_name)?> " + message);
        });
    }

    <?=ucwords($object_name)?>.currentRowID = null;

    <?=ucwords($object_name)?>.setSelectedRow = function(id)
    {
    <?=ucwords($object_name)?>.currentRowID = id;
    }

    var inputDate = {};
    $(function() {
    <?php foreach($fields as $field):?>
    // inputDate['<?=$field->name?>'] = $("#<?=$field->name?>").datepicker({dateFormat:"dd/mm/yy"});
    <?php endforeach;?>
    });
        </script>
    </head>

    <body>
        <?php echo("<?php echo validation_errors(); ?>") ?>

        <div style="width: 930px;">
            <div class="box">
                <h1> <?=ucwords($object_name)?> </h1>
                <hr>
                <?php echo("<?=\$form_view ?>"); ?>
                <div class="spacer" id="form_control" >
                    <a href="javascript:void(0)" onclick="<?=ucwords($object_name)?>.Create()" class="green">Thêm</a>
                    <a href="javascript:void(0)" onclick="<?=ucwords($object_name)?>.Update()" class="green">Cập nhập</a>
                    <a href="javascript:void(0)" onclick="<?=ucwords($object_name)?>.Delete()" class="green">Xoá</a>
                </div>
                <div id="ajaxloader" style="display:none" >
                    <img  src="<?php echo base_url()?>resources/css/img/ajax-loader.gif" />
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
        var gridimgpath = '<?php echo base_url()?>resources/jqGrid/themes/basic/images';

        <?php foreach($fields as $field):?>
        colNamesT.push('<?=$field->name?>');
        colModelT.push({name:'<?=$field->name?>',index:'<?=$field->name?>', editable: false});
        <?php endforeach;?>

        var loadView = function()
        {
            jGrid = jQuery("#list2").jqGrid(
            {
                url:'<?php echo site_url("$object_name")?>_c/read_json_format',
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
                caption:"<?=ucwords($object_name)?>"
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