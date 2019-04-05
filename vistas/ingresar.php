
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'../cabezera.php' ?>
    </head>
    <body>
        <header>
            <?php include '../barra.php'; ?> 
        </header> 
        
        <div class="container" style="margin-top: 150px;">
  
         
            <?php
            if (!isset($_SESSION['nombre'])) {
                ?>
                <div class="row">
                    <div class="col-xs-12 col-md-push-3 col-md-5 ">
                        <div class="panel panel-info">
                            <div class="panel-heading text-center ">Ingresar</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form"  action="../controles/controles/sess.php" method="post">
                                    <div class="col-xs-12 col-sm-6 col-md-12 col-md-push-1">
                                        <div class="form-group  ">  
                                            <label class=" col-xs-12 " >Mail</label>
                                            <div class="col-xs-12 col-md-11">
                                                <input class="form-control" type="mail" ng-model="mail" name="mail" required  maxlength="45" autofocus/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-12 col-md-push-1">
                                        <div class="form-group">  
                                            <label class="col-xs-12 col-md-12 " >Clave</label>
                                            <div class="col-xs-8 col-md-8 ">
                                                <input  class="form-control" type="password" ng-model="password" required  name="password" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-12 col-md-push-1">
                                            <div class="form-group">  
                                                <div class="col-xs-12  col-md-12 ">
                                                    <a href="claveperdio.php">Perdio su Clave?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-9 col-md-push-2">
                                            <div class="form-group">  
                                                <div class="col-xs-12  col-md-12 ">
                                                    <input class="btn btn-primary pull-right"  type="submit" value=" Login " />
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <div id="mensaje"></div>

        </div>
    </body>
    <script>
        function cerrar(){
            <?php                    session_destroy(); ?>
        }
        </script>
</html>