<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

            <title>$titulo</title>

            <script src="../../jquery/jquery-2.1.3.min.js" type="text/javascript"></script>
            <link href="../../jquery/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet" type="text/css"/>
            <script src="../../bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript"></script>
            <link href="../../bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <!-- ideally at the bottom of the page -->
            <script src="../../jquery/angular.min.js" type="text/javascript"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
                    <link href="../../estilo.css" rel="stylesheet" type="text/css"/>
                    <script src="../../jquery/jquery-ui-1.12.1.custom/jquery-ui.js"></script>



                    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
                    <link href="../../jquery/bootstrap-fileinput-master/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
                    <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
                    <!-- link href="path/to/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
                    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <!-- piexif.min.js is only needed for restoring exif data in resized images and when you 
                          wish to resize images before upload. This must be loaded before fileinput.min.js -->
                    <script src="../../jquery/bootstrap-fileinput-master/js/plugins/piexif.min.js" type="text/javascript"></script>
                    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
                         This must be loaded before fileinput.min.js -->
                    <script src="../../jquery/bootstrap-fileinput-master/js/plugins/sortable.min.js" type="text/javascript"></script>
                    <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
                         This must be loaded before fileinput.min.js -->
                    <script src="../../jquery/bootstrap-fileinput-master/js/plugins/purify.min.js" type="text/javascript"></script>
                    <!-- the main fileinput plugin file -->
                    <script src="../../jquery/bootstrap-fileinput-master/js/fileinput.min.js"></script>
                    <!-- bootstrap.js below is needed if you wish to zoom and view file content 
                         in a larger detailed modal dialog -->
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
                    <!-- optionally if you need a theme like font awesome theme you can include 
                        it as mentioned below -->
                    <script src="../../jquery/bootstrap-fileinput-master/js/locales/fa.js"></script>
                    <!-- optionally if you need translation for your language then include 
                        locale file as mentioned below -->
                    <script src="../../jquery/bootstrap-fileinput-master/js/locales/es.js"></script>
                    </head>


                    </head>

                    <body >
                        <div id="dedos"> </div>
                        <input id="input-id" type="file" name="imagenes[]" multiple=true class="file" data-preview-file-type="text"/>
                        <input id="de" type="text" name="de" multiple=true class="file" data-preview-file-type="text" value="qqqqqqqqqqqq"/>
                    </body>
                    <?php
                    $directory = "../../imagenes/eventos/";
                    $imagenes = glob($directory . "*.*");
                    ?>

                    <script  type="text/javascript">
                        titles = {'id-0': 'file-name-1', 'id-1': 'file-name-2'};
                        // initialize with defaults
                        $("#input-id").fileinput({
                            language: "es",
                            uploadUrl: 'up.php',
                            uploadAsync: true,
                            minFilecount: 1,
                            MaxFilecount: 5,
                            showPreview: true,
                            showRemove: true,
                            initialPreview: [
                                "DSC01666.jpg",
                                "http://lorempixel.com/800/460/people/2"
                            ],
                            initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                            initialPreviewFileType: 'image',
                            initialPreviewConfig: [
                                {caption: "People-1.jpg", size: 576237, width: "120px", url: "/site/file-delete", key: 1},
                                {caption: "People-2.jpg", size: 932882, width: "120px", url: "/site/file-delete", key: 2},
                            ],
                            elErrorContainer: "#dedos",
                            uploadExtra: {
                                titles: JSON.stringify(titles)
                            }


                        });

                    </script>
                    </html>
                    <?php // }?>  
                    <?php
// foreach($imagenes as $image){ ?>