<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'../cabezera.php';
        ?>
<!--        <script src='//ajax.googleapis.com/ajax/libs/angularjs/1.2.19/angular-route.min.js'></script>-->

    </head>
    <body ng-app="App" ng-controller="perfil" >

        <header>
            <?php include '../barra.php'; ?> 
        </header> 
        <div class="barrasuperior">Consejo Profesional de la Abogacia Formosa</div>
        <div class="container">
            <?php
            ?>
            <div  ng-init="tipoperfil =<?php echo $_SESSION['perfil']; ?>; idusuario = <?php echo htmlspecialchars(json_encode($_SESSION['idusuario'])) ?>; registro = <?php echo htmlspecialchars(json_encode($_SESSION['nombre'])) ?>; userInit('<?php echo $_SESSION['id_matricula'] ?>', '<?php echo $_SESSION['idpersona'] ?>')" class="row" style="margin-top: 40px; ">
                <div  class="navbar navbar-default" role="navigation">
                    <div class="navbar-header"><a class="navbar-brand" href="#">Perfil</a></div>
                    <ul class="nav navbar-nav">
                        <li><a  href="password.php" >Password</a></li> 
                        <li><a href="ayuda.php?tag=perfil" class="glyphicon glyphicon-question-sign"></a></li>
                        <li><a href="#" > ID:<?php echo $_SESSION['idpersona'] ?></a></li>
                        <li><a  ng-repeat="p in perfiles| filter:<?php echo $_SESSION['perfil']; ?> ">Perfil :{{p.label}}</a></li>
                        <li><a href="#" > Matricula:<?php echo $_SESSION['id_matricula'] ?></a></li>
                        <?php
                        $ar = array(1);
                        if ((in_array($_SESSION['perfil'], $ar))) {
                            if ($_SESSION['id_matricula']) {
                                ?>
                                <li><a  style="background:  #1c94c4; color:  #BCE8F1"href="#" ng-click="ver();">Datos Personales Abogado</a></li>
                                <?php
                            }
                        }
                     
                        ?>
                    </ul>
                </div>

                <h4>Perfil del Sistema Consejo de Abogados </h4>

                <form  role="form" id="perfilpersonal" ng-show="perfil"  ng-submit="formulariopersonal()" >
                    <div class="panel panel-success"> 
                        <div class="panel-heading ">Datos Personales</div> 
                        <div class="panel-body">
                            <div class="form-row">    
                                <div class="form-group col-md-5 ">  
                                    <label for="nombre">Nombre</label>
                                    <input class="form-control" type="text" ng-model="persona.nombre" required  name="nombre" />
                                </div>
                                <div class="form-group  col-md-5">  
                                    <label for="apellido">Apellido</label>
                                    <input class="form-control" class="form-control" ng-model="persona.apellido"type="text" requi                                                               red name="apellido" value="bbbbb                                                               bb" /                                                               >
                            </div>
                            <div class="form-group col-md-2"> 
                                <label for="documento">Documento</label>
                                <input  class="form-control" type="count" ng-model="persona.documento" name="documento" required value="" />
                            </div>
                            <div class="form-group col-md-3">  
                                <label class="text-center">Sexo</label>
                                <div class="form-inline">

                                    <div class="form-check col-md-6"> 
                                        <input class="form-check-input" type="radio" name="sexo" ng-model="persona.sexo" required id="exampleRadios1" value="M" checked/>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Masculino                                                        
                                        </label>
                                    </div>
                                    <div class="form-check  col-md-6">
                                        <input class="form-check-input" type="radio" name="sexo" required ng-model="persona.sexo" id="exampleRadios2" value="F"/>
                                        <label class="form-check-label" for="exampleRadios2">Femenino
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="form-row ">
                            <div class="form-group col-md-2">  
                                <label>Estado Civil</label>
                                <select class="form-control" class="custom-select mr-sm-2" required ng-model="persona.estadocivil" >
                                    <option selected>Seleccionar..</option>
                                    <OPTION value="CASADO">Casado</OPTION>
                                    <OPTION value="DIVORCIADO">Divorciado</OPTION>
                                    <OPTION value="SOLTERO">Soltero</OPTION>
                                </select>
                            </div>
                            <div class="form-group col-md-2">  
                                <label>Nacionalidad</label>
                                <select  class="form-control " ng-model="persona.nacionalidad" name="nacionalidad" required id="nacionalidad" 

                                         ng-options="option.pais for option in pais track by option.idpais">
                                </select>
                            </div>

                            <div class="form-group  col-md-2">  
                                <label>Telefono Particular</label>
                                <input class="form-control" type="text" name="telefonoparticular" required ng-model="persona.teleparticular" />
                            </div>

                            <div class="form-group col-md-2"> 
                                <label for="Fecha">Nacio</label>
                                <input  class="form-control" type="date" ng-model="persona.nacimiento" required name="nacimiento" value="" />
                            </div>
                            <div class="form-group  col-md-5">  
                                <label>Dirección Particular</label>
                                <input  class="form-control"type="text" name="direccionparticular" required ng-model="persona.dirparticular" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">  
                                <label>Barrio</label>
                                <input class="form-control" type="text" name="barrio" required ng-model="persona.barrio" />
                            </div>
                            <div class="form-group col-md-2">  
                                <label>Provincia</label>
                                <input class="form-control" type="text" name="provincia" required ng-model="persona.provincia" />
                            </div>
                            <div class="form-group col-md-2">  
                                <label>Ciudad</label>
                                <input class="form-control" type="text" name="ciudad" required ng-model="persona.ciudad" />
                            </div>

                        </div>
                    </div>
                </div>


                <div ng-if="PantallaTitulo=='1'" class="panel panel-success"> 
                    <div class="panel-heading">Titulos</div> 
                    <div class="panel-body">
                        <div class="form-row">
                            <div class="form-group col-md-5">  
                                <label>Titulo</label>
                                <input class="form-control" type="text" name="observaciones" required ng-model="abogado.titulo"/>
                            </div>

                            <div class="form-group col-md-5">  
                                <label>Universidad</label>
                                <select class="form-control" class="custom-select mr-sm-2" required ng-model="persona.universidad"
                                        ng-options="uni as uni.universidad for uni in universidad track by universidad.iduniversidades" >
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-5">  
                                <label>Mail Trabajo</label>
                                <input class="form-control" type="mail" name="observaciones" required ng-model="abogado.mailtrabajo"/>

                        </div>  
                            <div class="form-group col-md-5">  
                                <label>Direccion Oficina</label>
                                <input class="form-control" type="text" name="observaciones" required ng-model="abogado.direccionoficina"/>
                                
                            </div>
                            <div class="form-group col-md-2">  
                                <label>Telefono Oficina</label>
                                <input class="form-control" type="tel" name="observaciones" required ng-model="abogado.teleoficina"/>
                            </div>
                            
                    </div>  

                </div>  
        </div>



        <div class="form-row">
            <div class="form-group col-md-12">
                <input type="hidden" name="idpersona" id="idpersona" ng-value="<?php echo $_SESSION['idpersona']; ?>"/>
                <input type="hidden" name="idperfil" id="idperfil" ng-model="persona.idperfil" ng-value="<?php echo $_SESSION['perfil'] ?>"/>
                <input type="hidden" name="idusuario" id="idusuario" ng-model="persona.idusuario" ng-value="26"/>
                <input class="btn btn-primary pull-right" type="submit"  ng-value="estadoform" />
            </div>
        </div>
        </form>

    </div>
    </div>


    <?php
    if (isset($idpersona)) {
        include '../controles/clases/Avatar.php';
        $fo = new Avatar();
        $foto = $fo->GetFoto($idpersona);
    }
    ?>
    <!--    <div class="panel panel-info">
            <div class="panel-heading">Foto </div>
            <div >
                <img  class="avatar" id="previewing"   src="../imagenes/perfil/avatar/<?php echo $foto ?>"></img></div>
    
    
    
            <input type="hidden" name="idpersona" value="<?php echo $_SESSION['idpersona'] ?>" />
        </div>
        <div class="form-group">  
            <div class="col-md-6 col-xs-6">
                <input type="hidden" value="<?php echo $foto ?>"  id="file_oculto" />
                <input type="file" value="<?php echo $foto ?>" name="file" id="file" />
            </div>
    
        </div>-->



    <div id="message"></div>

    <?php include '../pie.php'; ?> 
</body>
<script src="../js/perfil.js" type="text/javascript"></script>
</html>