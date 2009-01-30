<html>
    <head>
        <base href="<?php echo base_url()?>">
        <title><?=ucwords($object_name)?></title>

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>js/jqGrid34beta2/themes/steel/grid.css" />
        <link type="text/css" href="<?php echo base_url()?>js/theme/ui.all.css" rel="Stylesheet" />

        <script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.3.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.ui.all.js"></script>

    </head>
    <body>

        <script type="text/javascript">
            var <?=ucwords($object_name)?> = {};
            var colNamesT = new Array();
            var colModelT = new Array();
            var gridimgpath = '<?php echo base_url()?>js/jqGrid34beta2/themes/steel/images';

<?=ucwords($object_name)?>.data = {};
<?=ucwords($object_name)?>.setData = function(fieldName,fieldValue)
    {
        <?=ucwords($object_name)?>.data[fieldName] = fieldValue;
    }

<?=ucwords($object_name)?>.Create = function()
    {
        jQuery.post("<?php echo site_url("$object_name")?>_c/create",  <?=ucwords($object_name)?>.data,
        function(data){
            alert("Create " + data);
            jQuery("#<?=ucwords($object_name)?>_tbody").append(data);
        });
    }
<?=ucwords($object_name)?>.Read = function()
    {
        jQuery.post("<?php echo site_url("$object_name")?>_c/read_json_format", <?=ucwords($object_name)?>.data,
        function(data){
            alert("Data Loaded: " + data);
        });
    }
<?=ucwords($object_name)?>.Update = function()
    {
        jQuery.post("<?php echo site_url("$object_name")?>_c/update", <?=ucwords($object_name)?>.data,
        function(data){
            alert("Data Loaded: " + data);
        });
    }
<?=ucwords($object_name)?>.Delete = function()
    {
        jQuery.post("<?php echo site_url("$object_name")?>_c/delete", <?=ucwords($object_name)?>.data,
        function(data){
            alert("Data Loaded: " + data);
        });
    }

<?=ucwords($object_name)?>.currentRowID = null;

<?=ucwords($object_name)?>.setSelectedRow = function(id)
    {
<?=ucwords($object_name)?>.currentRowID = id;
    }

    var inputDate = {};
    $(function() {
        $("#datepicker").daterangepicker(); 

<?php foreach($fields as $field):?>
        inputDate['<?=$field->name?>'] = $("#txt_<?=$field->name?>").datepicker({dateFormat:"dd/mm/yy"});
<?php endforeach;?>
    });

    // $('#txt_last_activity').val().toString()
        </script>

<!--
        <form method="POST">
            <?php foreach($fields as $field):?>
            <label for="<?=$field->name?>"><?=$field->name?></label>:
            <input type="text" id="txt_<?=$field->name?>" name="<?=$field->name?>" value="" size="30" onchange="<?=ucwords($object_name)?>.setData(this.name,this.value);" />
            <br>
            <?php endforeach;?>
        </form>
    -->

        <?php echo("<?=\$form_view ?>"); ?>


        <input type="button" value="Create" onclick="<?=ucwords($object_name)?>.Create();"/>
        <input type="button" value="Read" onclick="<?=ucwords($object_name)?>.Read();"/>
        <input type="button" value="Update" onclick="<?=ucwords($object_name)?>.Update();"/>
        <input type="button" value="Delete" onclick="<?=ucwords($object_name)?>.Delete();"/>
        

        <hr>

        <table id="list2" class="scroll" cellpadding="0" cellspacing="0"></table>
        <div id="pager2" class="scroll" style="text-align:center;"></div>

        <p>Date: <input id="datepicker" type="text"></p>
    </body>



    <script type="text/javascript" src="<?php echo base_url()?>js/jqGrid34beta2/jquery.jqGrid.js"></script>
    <script type="text/javascript">

<?php foreach($fields as $field):?>
    colNamesT.push('<?=$field->name?>');
    colModelT.push({name:'<?=$field->name?>',index:'<?=$field->name?>', editable:true , width:90 });
<?php endforeach;?>

    //jQuery(document).ready(	tableToGrid("#grid_view"));
    jQuery(document).ready(loadView());
    function loadView()
    {
        jQuery("#list2").jqGrid(
        {
            url:'<?php echo site_url("$object_name")?>_c/read_json_format',
            editurl: '<?php echo site_url("$object_name")?>_c/read_json_format',
            mtype : "POST",
            datatype: "json",
            colNames: colNamesT ,
            colModel: colModelT ,
            rowNum:10,
            rowList:[10,20,30],
            imgpath: gridimgpath,
            pager: jQuery('#pager2'),
            sortname: colNamesT[0],
            viewrecords: true,
            sortorder: "desc",
            caption:"<?=ucwords($object_name)?>",

            onSelectRow: function(id){
                alert(id);
            }
        }).navGrid('#pager2',{edit:false,add:false,del:false});
    }

    </script>
</html>