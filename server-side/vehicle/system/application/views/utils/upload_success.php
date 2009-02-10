<html>
    <head>
        <title>Upload Form</title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>resources/css/main-app.css"  />
        <script type="text/javascript" src="<?php echo base_url()?>resources/jquery-1.3.1.js"></script>
    </head>

    <body>
        <img id="uploaded_img" src="<?=$img_src?>" style="display:none">
        <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
        <script  type="text/javascript">
            function getUploadedImgSrc(){
                var url = $("#uploaded_img").attr("src");
                parent.Xe.setImageVehicle(url);
            }
            $("#uploaded_img").ready(getUploadedImgSrc);
        </script>
    </body>
</html>