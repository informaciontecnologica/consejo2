<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include'../cabezera.php';
        ?>
        <link rel="stylesheet" href="../ngDialog-master/css/ngDialog.min.css"/>
        <link rel="stylesheet" href="../ngDialog-master/css/ngDialog-theme-default.min.css"/>
        <script src="../ngDialog-master/js/ngDialog.min.js"></script>
    </head>
    <body ng-app="myApp" ng-controller="Administracionusuarios" >
        <header>
            <?php include '../barra.php'; ?> 
        </header> 
        <div class="container" style="margin-top: 80px;">

            <div class="row"> 
                <div class="navbar navbar-default" >
                    <div class="navbar-header"><a class="navbar-brand" href="#">Usuarios</a></div>

                    <ul class="nav navbar-nav">
                        <li><a ng-click="vista('nuevo')" >Nuevo</a></li>
                        <li><a ng-click="vista('lista');" >Lista</a></li>
                    </ul>

                </div>
            </div>
            <h4>Perfil del  Abogados :  </h4>

            <form  role="form" id="mailinterno"  >

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" ng-model="nombre" id="nombre" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apellido</label>
                        <input class="form-control"  type="text" name="apellido" ng-model="apellido" id="apellido" />
                    </div>
                    <div class="form-group col-md-3">
                        <label>Documento</label>
                        <input class="form-control"  type="count" name="documento" ng-model="documento" id="documento"/>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Sexo</label>
                            <select name="sexo" class="form-control" ng-model="sexo" id="sexo">
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">  
                            <label>Nacimiento</label>
                            <input class="form-control col-md-2"  type="date" name="nacimiento" ng-model="nacimiento"  id="nacimiento"/>
                        </div>

                        <div class="form-group col-md-4">  
                            <label>Nacionalidad</label>
                            <select class="form-control" ng-options="item as item.label for item in perfiles track by item.idnacionalidad" ng-model="nacionalidad" id="nacionalidad" ></select>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">  
                            <label>Dirección Estudio</label>
                            <input class="form-control"  type="text" name="direccion" id="direccion" ng-model="direccion" />
                        </div>
                        <div class="form-group col-md-4">  
                            <label>Dirección Particular</label>
                            <input class="form-control"  type="text" name="dirparticular" ng-model="dirparticular" id="dirparticular"/>
                        </div>
                        <div class="form-group col-md-2">  
                            <label>Telefono Estudio</label>
                            <input class="form-control"  type="text" name="telefestudio" ng-model="telefestudio" id="telefestudio"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">  
                            <label>Telefono Particular</label>
                            <input class="form-control"  type="text" name="telefparticular" ng-model="telefparticular" id="telefparticular"/>
                        </div>
                        <div class="form-group col-md-2">  
                            <label>Fecha Egreso</label>
                            <input class="form-control"  type="date" name="fechaegreso" ng-model="fechaegreso" id="fechaegreso"/>
                        </div>
                        <div class="form-group col-md-4 ">  
                            <label>Titulo</label>
                            <input class="form-control"  type="text" name="titulo"  ng-model="titulo" id="titulo"/>
                        </div>
                        <div class="form-group col-md-4">  
                            <label>Universidad</label>
                            <select class="form-control" 
                                    ng-options="item as item.universidad for item in universidades track by item.iduniversidad" 
                                    ng-model="universidad" 
                                    id="universidad" ></select>

                        </div>

                        <div class="form-group col-md-2">  
                            <label>Fecha Matriculacion</label>
                            <input class="form-control"  type="date" name="fechamatricula" ng-model="fechamatricula" id="fechamatricula" />
                        </div>
                        <div class="form-group col-md-2">  
                            <label>Fecha Titulo</label>
                            <input class="form-control"  type="date" name="fechatitulo" ng-model="fechatitulo" id="fechatitulo" />
                        </div>
                        <div class="form-group col-md-2">  
                            <label>Estado Civil</label>
                            <select id="estadocivil" ng-model="estadocivil" name="estadocivil" class="form-control">
                                <option>Soltero</option>
                                <option>Casado</option>
                                <option>Divorciado</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">  
                            <label>Barrio</label>
                            <input class="form-control"  type="text" name="barrio" ng-model="barrio" id="barrio" />
                        </div>
                        <div class="form-group col-md-3">  
                            <label>Provincia</label>
                            <input class="form-control"  type="text" name="provincia" ng-model="provincia" id="provincia"/>

                        </div>
                        <div class="form-group col-md-3">  
                            <label>Ciudad</label>
                            <input class="form-control"  type="text" name="ciudad" ng-model="ciudad" id="ciudad" />
                        </div>
                        <div class="form-group col-md-4">  
                            <label>Correo Electronico</label>
                            <input class="form-control"  type="text" name="email" ng-model="email" id="email" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">  
                            <label>Observaciones</label>
                            <input class="form-control"  type="text" name="observaciones" ng-model="observaciones"  id="observaciones"/>
                        </div>

                    </div>



                    <div class="form-row">


                        <div class="form-group col-md-12">  
                            <input type="hidden" name="idpersona" id="idpersona" value="<?php echo $_SESSION['idpersona']; ?>"/>
                            <input class="btn btn-primary pull-right" type="submit"  value="Enviar" />
                        </div>    
                    </div>
            </form>

        </div>

        <script src="../jsperfilpersonal.js" type="text/javascript"></script>


    </body>

    <?php include '../pie.php'; ?> 
</html>