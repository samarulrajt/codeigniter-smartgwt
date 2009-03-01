<html>
    <head>
        <base href="<?php echo base_url()?>">
        <title><?=ucwords($object_name)?></title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ("<?php echo base_url()?>")?>resources/jqGrid/themes/basic/grid.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ("<?php echo base_url()?>")?>resources/theme/ui.all.css"  />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ("<?php echo base_url()?>")?>resources/css/main-app.css"  />
        <style type="text/css">
            .toggler { width: 250px; height: 125px; }
            #drop { width: 240px; height: 105px; padding: 0.4em; }
            #drop .ui-widget-header { margin: 0; padding: 0.4em; text-align: center; }
        </style>

        <script type="text/javascript" src="<?php echo ("<?php echo base_url()?>")?>resources/jquery-1.3.1.js"></script>
        <script type="text/javascript" src="<?php echo ("<?php echo base_url()?>")?>resources/jqGrid/jquery.jqGrid.js"></script>
        <script type="text/javascript" src="<?php echo ("<?php echo base_url()?>")?>resources/jquery.ui.all.js"></script>

        <!--  Utils for Page -->
        <script type="text/javascript" src="<?php echo ("<?php echo base_url()?>")?>resources/utils/inlinebox.js"></script>
        <script type="text/javascript" src="<?php echo ("<?php echo base_url()?>")?>resources/utils/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo ("<?php echo base_url()?>")?>resources/utils/jquery.maskedinput-1.2.1.pack.js"></script>
        <script type="text/javascript" src="<?php echo ("<?php echo base_url()?>")?>resources/utils/jquery.form.js"></script>
        <script type="text/javascript" src="<?php echo ("<?php echo base_url()?>")?>resources/utils/jquery.field.min.js"></script>
        <script type="text/javascript" src="<?php echo ("<?php echo base_url()?>")?>resources/utils/jquery.autocomplete.js"></script>

        <script  type="text/javascript">
            var <?=ucwords($object_name)?> = {};

<?=ucwords($object_name)?>.data = {};
<?=ucwords($object_name)?>.setDataField = function(fieldName,fieldValue)
    {
<?=ucwords($object_name)?>.data[fieldName] = fieldValue;
    }

<?=ucwords($object_name)?>.setData = function(data)
    {
        jQuery.each(data, function(name, value) {
<?=ucwords($object_name)?>.data[name] = value;
            $("#form_<?=ucwords($object_name)?> input[name="+ name +"]").setValue(value);
        });
    }


<?=ucwords($object_name)?>.getData = function()
    {
        var obj = {};
        $.each( $("#form_<?=ucwords($object_name)?>").formSerialize().split("&"), function(i,n)
        {
            var toks = n.split("=");
            obj[toks[0]] = toks[1];
        }
    );
<?=ucwords($object_name)?>.data = obj;
        return <?=ucwords($object_name)?>.data;
    }

    //create
<?=ucwords($object_name)?>.Create = function()
    {
        if(!$("#form_<?=ucwords($object_name)?>").valid())
        return;
        InlineBox.showAjaxLoader();
        jQuery.post("<?php echo ("<?php echo site_url('c_$object_name/create')?>")?>", $("#form_<?=ucwords($object_name)?>").formToArray() ,
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
        jQuery.post("<?php echo site_url("c_$object_name")?>/read_json_format", {},
        function(data){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
        });
    }

    // Filter the Grid and refresh 
<?=ucwords($object_name)?>.Filter = function()
    {
        //var name_field = $("#"+id).attr("name");
        //var value_field =  $("#"+id).val();
        //jQuery("#list2").setPostData({name_field:value_field});
        var post_data = <?=ucwords($object_name)?>.getData();

        for(var e in post_data){
            if($.trim(post_data[e]) == "")
                delete post_data[e];
        }
        jQuery("#list2").setPostData(post_data);
        $("#list2").trigger("reloadGrid");
    }

    //update
<?=ucwords($object_name)?>.Update = function()
    {
        if(!$("#form_<?=ucwords($object_name)?>").valid())
        return;

        InlineBox.showAjaxLoader();
        jQuery.post("<?php echo ("<?php echo site_url('c_$object_name/update')?>")?>", $("#form_<?=ucwords($object_name)?>").formToArray() ,
        function(message){
            InlineBox.hideAjaxLoader();
            $("#list2").trigger("reloadGrid");
            InlineBox.showModalBox("Cập nhật <?=ucwords($object_name)?> " + message);
        });
    }


    //delete
<?=ucwords($object_name)?>.Delete = function()
    {
        if(!$("#form_<?=ucwords($object_name)?>").valid())
        return;
        InlineBox.showAjaxLoader();
        jQuery.post("<?php echo ("<?php echo site_url('c_$object_name/delete')?>")?>",$("#form_<?=ucwords($object_name)?>").formToArray() ,
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



        </script>
    </head>

    <body>
        <div id="container-1">
            <ul>
                <li><a href="#fragment-1"><span>Thông tin chung</span></a></li>               
            </ul>
            <div id="fragment-1" style="width: 930px;">
                <div>
                    <table id="list2" class="scroll" style="margin-top:8px;" cellpadding="0" cellspacing="0"></table>
                    <div id="pager2" class="scroll" style="text-align:center;"></div>
                </div>

                <hr>

                <div class="box">
                    <h1> <?=ucwords($object_fullname)?> </h1>
                    <hr>

                    <form method="POST" id="form_<?=ucwords($object_name)?>" action="">
                        <?php foreach($fields as $field):?>
                        <label>
                            <span><?=$field->fullname?></span>
                            <input type="text" name="<?=$field->name?>" value="<?=$field->default?>" id="<?=$object_name?>_<?=$field->name?>" class="input-text keyAutoComplete" onchange="<?=ucwords($object_name)?>.setDataField(this.name,this.value);"  />
                        </label>
                        <?php endforeach;?>
                    </form>

                    <div class="spacer" id="form_control" >
                        <a href="javascript:void(0)" onclick="<?=ucwords($object_name)?>.Create()" class="green"> Thêm </a>
                        <a href="javascript:void(0)" onclick="<?=ucwords($object_name)?>.Update()" class="green">Cập nhập</a>
                        <a href="javascript:void(0)" onclick="<?=ucwords($object_name)?>.Filter()" class="green"> Tìm </a>
                        <a href="javascript:void(0)" onclick="<?=ucwords($object_name)?>.Delete()" class="green"> Xoá </a>
                    </div>
                    <div id="ajaxloader" style="display:none" >
                        <img  src="<?php echo base_url()?>resources/css/img/ajax-loader.gif" />
                    </div>
                </div>

            </div>
        </div>
    </body>

    <script type="text/javascript">        
        var jGrid = null;
        var colNamesT = new Array();
        var colModelT = new Array();
        var gridimgpath = '<?php echo ("<?php echo base_url()?>")?>resources/jqGrid/themes/basic/images';

<?php foreach($fields as $field):?>
    colNamesT.push('<?=$field->name?>');
    colModelT.push({name:'<?=$field->name?>',index:'<?=$field->name?>', editable: false});

     <?php if($field->isKey): ?>  
     <?php endif;?>
<?php endforeach;?>

    var loadView = function()
    {
        jGrid = jQuery("#list2").jqGrid(
        {
            url:'<?php echo ("<?php echo site_url('c_$object_name/read_json_format')?>")?>',
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
            caption:"<?=$object_fullname?>",
            onSelectRow: function(){
                var id = jQuery("#list2").getGridParam('selrow');
<?=ucwords($object_name)?>.setData(jQuery("#list2").getRowData(id));
            }
        });
        jGrid.navGrid('#pager2',{edit:false,add:false,del:false, search: false, refresh: true});
        $("#alertmod").remove();//FIXME
    }
    jQuery("#list2").ready(loadView);


    var initForm = function(){
        //init validation form
        $("#form_<?=ucwords($object_name)?>").validate();
        $('#container-1 > ul').tabs();
 
    }
    jQuery("#form_<?=ucwords($object_name)?>").ready(initForm);

    var keyAutoComplete_fields = {};
    $(".keyAutoComplete").each(function(i,e)
    {
        keyAutoComplete_fields[$(e).attr('id')] = $(e).autocomplete("<?php echo ("<?php echo site_url('c_$object_name/keyAutoComplete')?>")?>", {
            width: 200,
            max: 5,
            highlight: false,
            scroll: true,
            scrollHeight: 300,
            formatItem: function(data, i, n, value) {
                return value;
            },
            formatResult: function(data, value) {
                return  value;
            }
        });
        $(e).focus(function()   {
            var id = $(this).attr('id');
            keyAutoComplete_fields[id].setOptions({url : "<?php echo ("<?php echo site_url('c_$object_name/keyAutoComplete')?>")?>/"+$('#'+id).attr("name")});
        });
    });
  

     var inputDate = {};
    $( function() {
<?php foreach($fields as $field):?>
<?php if($field->isDate): ?>
        inputDate['<?=$object_name?>_<?=$field->name?>'] = $("#<?=$object_name?>_<?=$field->name?>").datepicker({dateFormat:"yy/mm/dd"});
        $('#<<?=$object_name?>_<?=$field->name?>').mask('9999/99/99');
        $('#<?=$object_name?>_<?=$field->name?>').validate({rules:{ require: true, date: true}});
<?php endif; ?>
<?php endforeach;?>
    });


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