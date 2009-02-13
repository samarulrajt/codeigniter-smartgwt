<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="http://localhost/vehicle/">
        <title>Xe</title>
         <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

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
                    if(name == 'MS_MODEL_XE'){
                        $("#main_form select[name='MS_MODEL_XE']").setValue(value);
                    }
                    else if(name == "IMAGE_VEHICLE"){
                        Xe.setImageVehicle(value);
                    }
                    else{
                        $("#main_form input[name="+ name +"]").setValue(value);
                    }

                });
            };

            Xe.setImageVehicle = function(src){
                $("#main_form input[name='IMAGE_VEHICLE']").setValue(src);
                $("#IMAGE_VEHICLE").attr("src", src);
            }

            //FIXME
            Xe.getData = function()
            {
                var obj = {};
                $.each(  $("#main_form").formToArray() , function(i,o)
                {
                    obj[o.name] = o.value;
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
                jQuery.post("http://localhost/vehicle/index.php/c_xe/create",  $("#main_form").formToArray() ,
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

            //refresh grid
            Xe.Filter = function(k)
            {
                jQuery("#list2").setPostData({SO_DANG_KY_XE:k});
                $("#list2").trigger("reloadGrid");
            }

            //update
            Xe.Update = function()
            {
                if(!$("#main_form").valid())
                    return;

                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_xe/update",  $("#main_form").formToArray() ,
                function(message){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                    InlineBox.showModalBox("Cập nhật Xe " + message);
                });
            }


            //delete
            Xe.Delete = function()
            {
                if(!confirm("Bạn có đồng ý xoá dữ liệu chiếc xe này ?"))
                    return;
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_xe/delete",{"STT_XE":$('#STT_XE').val()} ,
                function(message){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                    InlineBox.showModalBox("Xoá Xe " + message);
                });
            }

            var Hop_dong_thue_xe = {};

            Hop_dong_thue_xe.data = {};
            Hop_dong_thue_xe.setDataField = function(fieldName,fieldValue)
            {
                Hop_dong_thue_xe.data[fieldName] = fieldValue;
            }

            Hop_dong_thue_xe.setData = function(data)
            {
                jQuery.each(data, function(name, value) {
                    Hop_dong_thue_xe.data[name] = value;
                    $("#main_form input[name="+ name +"]").setValue(value);
                });
            }


            Hop_dong_thue_xe.getData = function()
            {
                var obj = {};
                $.each( $("#main_form").formSerialize().split("&"), function(i,n)
                {
                    var toks = n.split("=");
                    obj[toks[0]] = toks[1];
                }
            );
                Hop_dong_thue_xe.data = obj;
                return Hop_dong_thue_xe.data;
            }

            //create
            Hop_dong_thue_xe.Create = function()
            {
                if(!$("#main_form").valid())
                    return;
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_hop_dong_thue_xe/create", Hop_dong_thue_xe.getData() ,
                function(message){
                    if(message != null){
                        InlineBox.hideAjaxLoader();
                        $("#list2").trigger("reloadGrid");
                        InlineBox.showModalBox("Tạo Hop_dong_thue_xe " + message);
                    }
                });
            }

            //refresh grid
            Hop_dong_thue_xe.Read = function()
            {
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_hop_dong_thue_xe/read_json_format", {},
                function(data){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                });
            }

            //update
            Hop_dong_thue_xe.Update = function()
            {
                if(!$("#main_form").valid())
                    return;

                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_hop_dong_thue_xe/update", Hop_dong_thue_xe.getData() ,
                function(message){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                    InlineBox.showModalBox("Cập nhật Hop_dong_thue_xe " + message);
                });
            }


            //delete
            Hop_dong_thue_xe.Delete = function()
            {
                if(!$("#main_form").valid())
                    return;
                InlineBox.showAjaxLoader();
                jQuery.post("http://localhost/vehicle/index.php/c_hop_dong_thue_xe/delete",Hop_dong_thue_xe.getData() ,
                function(message){
                    InlineBox.hideAjaxLoader();
                    $("#list2").trigger("reloadGrid");
                    InlineBox.showModalBox("Xoá Hop_dong_thue_xe " + message);
                });
            }
        </script>
    </head>

    <body>

        <div id="container-1">
            <ul>
                <li><a href="#fragment-1"><span>Thông tin chung</span></a></li>
                <li><a href="#fragment-2"><span>Danh sách xe</span></a></li>
                <li><a href="#fragment-3"><span>Hợp đồng </span></a></li>
                <li><a href="#fragment-4"><span>Chi nhánh quản lý</span></a></li>
            </ul>
            <div id="fragment-1">
                <div style="width: 880px;">
                    <div class="box">
                        <h1> Xe </h1>
                        <hr>

                        <form method="POST" id="main_form" action="http://localhost/vehicle/index.php/c_xe/">

                            <label style="display:none" >
                                <span>STT xe</span>
                                <input type="text" name="STT_XE" value="" id="STT_XE" class="input-text " onchange="Xe.setDataField(this.name,this.value);"  />
                            </label>

                            <label>
                                <span>Số Đăng ký xe</span>
                                <input type="text" name="SO_DANG_KY_XE" value="" id="SO_DANG_KY_XE" class="input-text required" onchange="Xe.setDataField(this.name,this.value);"  />
                            </label>

                            <label>
                                <span>Model xe</span>
                                <?=$model_xe_list ?>
                            </label>

                            <label>
                                <span>Hình ảnh xe</span>
                                <input type="hidden" name="IMAGE_VEHICLE" value=""/>
                                <img id="IMAGE_VEHICLE" class="img_with_max" src="http://localhost/vehicle/resources/images/no-image.jpg" />
                                <iframe name='image_vehicle_iframe' id='image_vehicle_iframe' scrolling="auto" style="border: 0px none; width: 400px; height: 60px;" src="http://localhost/vehicle/index.php/upload/"></iframe>
                            </label>

                            <label>
                                <span>MS Thiết bị</span>
                                <input type="text" name="MS_THIET_BI" value="" id="MS_THIET_BI" class="input-text " onchange="Xe.setDataField(this.name,this.value);"  />
                            </label>

                            <label>
                                <span>Thể tích thật</span>
                                <input type="text" name="THE_TICH_THAT" value="" id="THE_TICH_THAT" class="input-text number required" onchange="Xe.setDataField(this.name,this.value);"  />
                            </label>

                            <label>
                                <span>Ngày cập nhật</span>
                                <input type="text" name="NGAY_CAP_NHAT" value="" id="NGAY_CAP_NHAT" class="input-text required" onchange="Xe.setDataField(this.name,this.value);"  />
                            </label>

                            <hr>

                            <fieldset>
                                <legend>Thông tin chi tiết model xe</legend>

                                <div style="width:48%;display:inline">
                                    <label>
                                        <span>Loại model</span>
                                        <input type="text" name="LOAI_MODEL" value="" id="LOAI_MODEL" class="input-text" readonly  />
                                    </label>

                                    <label>
                                        <span>Nhãn hiệu</span>
                                        <input type="text" name="NHAN_HIEU" value="" id="NHAN_HIEU" class="input-text" readonly  />
                                    </label>

                                    <label>
                                        <span>MS Thuế</span>
                                        <input type="text" name="MS_THUE" value="" id="MS_THUE" class="input-text" readonly  />
                                    </label>


                                    <label>
                                        <span>Loai xe</span>
                                        <input type="text" name="GENRE" value="" id="GENRE" class="input-text" readonly  />
                                    </label>

                                    <label>
                                        <span>Số sườn</span>
                                        <input type="text" name="SO_SUON" value="" id="SO_SUON" class="input-text" readonly  />
                                    </label>
                                </div>

                                <div style="width:48%;display:inline">
                                    <label>
                                        <span>Nhiên liệu</span>
                                        <input type="text" name="FUEL" value="" id="FUEL" class="input-text" readonly  />
                                    </label>

                                    <label>
                                        <span>PTAC</span>
                                        <input type="text" name="PTAC" value="" id="PTAC" class="input-text" readonly />
                                    </label>

                                    <label>
                                        <span>Trọng tải</span>
                                        <input type="text" name="PAYLOAD" value="" id="PAYLOAD" class="input-text" readonly  />
                                    </label>

                                    <label>
                                        <span>Diện tích sàn</span>
                                        <input type="text" name="FLOOR_AREA" value="" id="FLOOR_AREA" class="input-text" readonly  />
                                    </label>


                                    <label>
                                        <span>KM đã đi</span>
                                        <input type="text" name="KM_METER_AVAILABLE" value="" id="KM_METER_AVAILABLE" class="input-text" readonly  />
                                    </label>
                                </div>
                            </fieldset>
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
            </div>
            <div id="fragment-2">
                <div>
                    <form method="POST" id="vehicle_search_form" >
                        <label>Số Đăng ký xe </label>
                        <input type="text" name="SO_DANG_KY_XE" id="filter_SO_DANG_KY_XE" value="" class="input-text"  />
                        <input type="button" value="Tìm" onclick="Xe.Filter($('#filter_SO_DANG_KY_XE').val())"/>
                    </form>
                </div>
                <div style="margin-top:5px;">
                    <table id="list2" class="scroll" style="margin-top:8px;" cellpadding="0" cellspacing="0"></table>
                    <div id="pager2" class="scroll" style="text-align:center;"></div>
                </div>
            </div>
            <div id="fragment-3">
                <form method="POST" id="formXe_HDTX">
                    <label>Số Đăng ký xe </label>
                    <input type="text" name="SO_DANG_KY_XE" id="filter_SO_DANG_KY_XE" value="" class="input-text"  />
                    
                    <label>
                        <span>MS hợp đồng</span>
                        <input type="text" name="MS_HOP_DONG" value="" id="MS_HOP_DONG" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>MS chi nhánh</span>
                        <input type="text" name="MS_CHI_NHANH" value="" id="MS_CHI_NHANH" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Chi nhánh quản lý xe</span>
                        <input type="text" name="CHI_NHANH_QUAN_LY_XE" value="" id="CHI_NHANH_QUAN_LY_XE" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Cơ quan cho thuê</span>
                        <input type="text" name="CO_QUAN_CHO_THUE_XE" value="" id="CO_QUAN_CHO_THUE_XE" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Mã hợp đồng</span>
                        <input type="text" name="HOP_DONG" value="" id="HOP_DONG" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Loại hợp đồng</span>
                        <input type="text" name="LOAI_HOP_DONG" value="" id="LOAI_HOP_DONG" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Người tiếp nhận</span>
                        <input type="text" name="NGUOI_TIEP_NHAN" value="" id="NGUOI_TIEP_NHAN" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Số tiền</span>
                        <input type="text" name="SO_TIEN_" value="" id="SO_TIEN_" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Thực trả</span>
                        <input type="text" name="SOTHUC_TE_" value="" id="SOTHUC_TE_" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>MS thể xăng</span>
                        <input type="text" name="MS_THE_XANG" value="" id="MS_THE_XANG" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Mã số PIN</span>
                        <input type="text" name="MS_PIN" value="" id="MS_PIN" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>

                    <label>
                        <span>Mã số tài xế</span>
                        <input type="text" name="MS_TAI_XE" value="" id="MS_TAI_XE" class="input-text" onchange="Hop_dong_thue_xe.setDataField(this.name,this.value);"  />
                    </label>
                </form>
            </div>
            <div id="fragment-4">
                hop dong
            </div>

        </div>

    </body>

    <script type="text/javascript">
        // $('#last_activity').val().toString()
        var jGrid = null;
        var colNamesT = new Array();
        var colModelT = new Array();
        var gridimgpath = 'http://localhost/vehicle/resources/jqGrid/themes/basic/images';

        colNamesT.push('STT_XE');
        colModelT.push({name:'STT_XE',index:'STT_XE', editable: false});
        colNamesT.push('SO_DANG_KY_XE');
        colModelT.push({name:'SO_DANG_KY_XE',index:'SO_DANG_KY_XE', editable: false});
        colNamesT.push('MS_MODEL_XE');
        colModelT.push({name:'MS_MODEL_XE',index:'MS_MODEL_XE', editable: false});
        colNamesT.push('MS_THIET_BI');
        colModelT.push({name:'MS_THIET_BI',index:'MS_THIET_BI', editable: false});
        colNamesT.push('THE_TICH_THAT');
        colModelT.push({name:'THE_TICH_THAT',index:'THE_TICH_THAT', editable: false});
        colNamesT.push('NGAY_CAP_NHAT');
        colModelT.push({name:'NGAY_CAP_NHAT',index:'NGAY_CAP_NHAT', editable: false});
        colNamesT.push('IMAGE_VEHICLE');
        colModelT.push({name:'IMAGE_VEHICLE',index:'IMAGE_VEHICLE', editable: false, hidden:true});

        var loadView = function()
        {
            jGrid = jQuery("#list2").jqGrid(
            {
                url:'http://localhost/vehicle/index.php/c_xe/read_json_format',
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
                caption:"Xe",
                onSelectRow: function(){
                    var id = jQuery("#list2").getGridParam('selrow');
                    Xe.setData(jQuery("#list2").getRowData(id));
                }
            });
            jGrid.navGrid('#pager2',{edit:false,add:false,del:false, search: false, refresh: true});
            $("#alertmod").remove();//FIXME
        }
        jQuery("#list2").ready(loadView);

        var changeModelXeHandler = function(){
            var h = $("#main_form select[name='MS_MODEL_XE']");
            var url = "http://localhost/vehicle/index.php/c_model_xe/readModel_xe/" + h.val();
            var callback = function(obj) {
                Xe.setData(obj);
            };
            jQuery.getJSON(url, {}, callback);
        }

        var initForm = function(){
            //init validation form

            $("#NGAY_CAP_NHAT").datepicker({dateFormat:"yy/mm/dd"});
            $('#NGAY_CAP_NHAT').mask('9999/99/99');
            $('#NGAY_CAP_NHAT').validate({rules:{ require: true, date: true}});
            $("#NGAY_CAP_NHAT").val($.datepicker.formatDate('yy/mm/dd', new Date()));
            $("#main_form").validate();

            //init input mask
            $("#SO_DANG_KY_XE").mask("**-**9999");

            $('#container-1 > ul').tabs();

            $("#main_form select[name='MS_MODEL_XE']").change(changeModelXeHandler);

            $("#filter_SO_DANG_KY_XE").autocomplete("http://localhost/vehicle/index.php/c_xe/SO_DANG_KY_XE_suggestion", {
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