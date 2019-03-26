<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include'../cabezera.php';
        ?>
        <script src='//ajax.googleapis.com/ajax/libs/angularjs/1.2.19/angular-route.js'></script>
    </head>
    <body ng-app="App" ng-controller="despachos">
        <header>
            <?php include '../barra.php'; ?> 
        </header> 
        <div class="container" style="margin-top: 80px;">
            <div class="row">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header"><a class="navbar-brand" href="#">Administración Despachos</a></div>
                    <ul class="nav navbar-nav">
                        <li><a href="#/nuevofederal/125">Nuevo Federal</a></li>
                        <li><a href="#/nuevoprovincial/125">Nuevo Provincial</a></li>
                        <li><a href="#/provincial/125">L. Provincial</a></li>
                        <li><a href="#/federal/5">L. Federal</a></li>

                    </ul>
                    <?php
                    // Utilizar el parámetro opcional flags a partir de PHP 5
                    $recortes = file_get_contents('fechaultima.php');
                    ?>


                </div>
            </div>
           



           
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#bbb;margin:0px auto;}
                .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#594F4F;background-color:#E0FFEB;}
                .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#bbb;color:#493F3F;background-color:#9DE0AD;}
                .tg .tg-baqh{text-align:center;vertical-align:top}
                .tg .tg-rmb8{background-color:#C2FFD6;vertical-align:top}
                .tg .tg-0l6a{background-color:#C2FFD6;text-align:center;vertical-align:top}
                .tg .tg-yw4l{vertical-align:top}
                .tg .tg-3xcq{font-size:12px;font-family:"Courier New", Courier, monospace !important;;background-color:#67fd9a;text-align:center;vertical-align:top}
                th.tg-sort-header::-moz-selection { background:transparent; }th.tg-sort-header::selection      { background:transparent; }th.tg-sort-header { cursor:pointer; }table th.tg-sort-header:after {  content:'';  float:right;  margin-top:7px;  border-width:0 4px 4px;  border-style:solid;  border-color:#404040 transparent;  visibility:hidden;  }table th.tg-sort-header:hover:after {  visibility:visible;  }table th.tg-sort-desc:after,table th.tg-sort-asc:after,table th.tg-sort-asc:hover:after {  visibility:visible;  opacity:0.4;  }table th.tg-sort-desc:after {  border-bottom:none;  border-width:4px 4px 0;  }@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}</style>
            <!--//**********************************-->


            <div ng-view></div>





        </div>



        </div>
    </body>
    <script src="../js/despachos.js" type="text/javascript"></script>

</html>
