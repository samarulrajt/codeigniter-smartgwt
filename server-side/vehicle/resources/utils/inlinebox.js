            InlineBox = {};
            InlineBox.toggleInfoBox = function(header,message)
            {
                $("#info-box-header").text(header);
                $("#info-box-msg").text(message);
                $(".info-box").toggle("drop");
            }
            InlineBox.showAjaxLoader = function()
            {
                $("#ajaxloader").show();
                $("#form_control").hide();
            }
            InlineBox.hideAjaxLoader = function()
            {
                $("#ajaxloader").hide();
                $("#form_control").show();
            }

            function initModalBox(){
                //variable to reference window
                $myWindow = jQuery("#info-box-msg");
                //instantiate the dialog
                $myWindow.dialog({ height: 250,
                    width: 400,
                    modal: true,
                    position: 'center',
                    autoOpen:false,
                    title:'Thông báo',
                    overlay: { opacity: 0.5, background: 'black'}
                });
                InlineBox.modalbox = $myWindow;
            }
            jQuery("#info-box-msg").ready(initModalBox);

            //function to show dialog
            InlineBox.showModalBox = function(message) {
                $("#info-box-msg").text(message);
                //if the contents have been hidden with css, you need this
                InlineBox.modalbox.show();
                //open the dialog
                InlineBox.modalbox.dialog("open");
            };

            //function to close dialog, probably called by a button in the dialog
            InlineBox.closeModalBox = function() {
                InlineBox.modalbox.dialog("close");
            };


