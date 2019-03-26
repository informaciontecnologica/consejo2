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
                    <div  class="navbar-form navbar-left"> 
                        <input class="form-control" placeholder="Search" type="text" ng-model="search"/>
                    </div>
                </div>
            </div>
            <div class="row" ng-show="!estado">
                <form class="form-horizontal" role="form" id="usuario"  >

                    <div class="form-group">  
                        <div class="col-md-5 col-xs-12">
                            <label >Mail - Usuario</label>
                            <input class="form-control" type="email" ng-model="mail" id="mail" name="mail" required  autofocus  />

                            <input type="hidden" name="idregistrador" ng-model="idregistrador" value="<?php echo $_SESSION['idpersona'] ?>"/>
                        </div>
                    </div>
                    <div class="form-group">  

                        <div class="col-md-3 col-lg-3 col-xs-5">
                            <label >Clave</label>
                            <input   class="form-control" type="password" id="clave" required  name="clave" />
                        </div>
                    </div>

                    <div class="form-group">  

                        <div class="col-md-3 col-lg-3 col-xs-5">
                            <label >Nombre</label>
                            <input   class="form-control" type="text"  required  name="nombre" id="nombre" />
                        </div>
                    </div>
                    <div class="form-group">  

                        <div class="col-md-3 col-lg-3 col-xs-5">
                            <label >Apellido</label>
                            <input   class="form-control" type="text"  required id="apellido"  name="apellido"  />
                        </div>
                    </div>
                    <div class="form-group">  

                        <div class="col-md-3 col-lg-3 col-xs-5"> 
                            <label>Nacimiento</label>
                            <input   class="form-control" type="date" required  name="nacimiento"  id="nacimiento" />
                        </div>
                    </div>
                    <div class="form-group">  

                        <div class="col-md-3 col-lg-3 col-xs-5"> 
                            <label >Documento</label>
                            <input   class="form-control" type="number" required  name="documento"   id="documento"/>
                        </div>
                    </div>
                    <div class="form-group">  

                        <div class="col-md-3 col-lg-3 col-xs-5">
                            <label >Teléfono</label>
                            <input   class="form-control" type="tel" required  name="telefono"  id="telefono"/>
                        </div>
                    </div>


                    <div class="form-group">  
                        <div class="col-md-5 col-lg-3 col-xs-12"> 
                            <label >Dirección</label>
                            <input   class="form-control" type="text"  required id="direccion" name="direccion" />
                        </div>
                    </div>

                    <input class=" btn btn-primary" type="submit"  />
                </form>
            </div>
            <div id="response">  <pre></pre></div>
            
            <div class="row" ng-show="estado" >
<!--PersonaMatricula(x.id_matricula);"--> 
                <table   class="table table-striped">
                    <thead>
                        <tr>
                            <th >Id</th>
                            <th >Matricula</th>
                            <th >Nombre</th>

                            <th >Mail</th>

                        </tr>
                    </thead>  
                    <tbody>
                        <tr ng-repeat="x in usuario| filter:search | startFromGrid: currentPage * pageSize | limitTo: pageSize">
                            <td >{{x.idpersona}}</td>
                            <td ><input type="number"  ng-model="matricula" ng-value="x.id_matricula" id="matricula" min="0"  max="99999"/>
                                <button ng-click="CambiarMatricula(x.idpersona, matricula);" class="glyphicon glyphicon-save" title="Cambiar Matricula"></button>
                                <span ng-if="x.id_matricula != 0">
                                    <a ng-href="perfilpersonal.php?m={{x.id_matricula}}"

                                            class="button glyphicon glyphicon-list-alt" title="Detalle de la Persona por Matricula"></a> </span>
                            </td>
                            <td >
                                <span ng-if="x.nombre != null">
                                    {{x.nombre + " " + x.apellido}}</span>
                                <span class="text-info" ng-if="x.nombre == null">
                                    Falta Cargar Perfil</span></td>

                            <td ng-click="agregarmail(x.mail)">{{x.mail}}</td>


                            <td ><button ng-click="vistausuario(x.idpersona);" class="btn btn-primary"><span>Info</span></button></td>
                            <td>
                                <select ng-init="perfila={id:x.id_perfil}" ng-model="perfila"  ng-change="update(perfila, x.idusuario);"  
                                        ng-options="item as item.label for item in perfiles track by item.id">  </select>
                                <!--lo enviado es un objeto , se trabaja coomo objeto , el ng-init lee el valor de repeta prinicpal-->

                            </td>

                        </tr>
                    </tbody> 
                </table>
                {{id}}
            </div>

            <div  class="panel panel-info" ng-show="detalle">
                <div class="panel-heading text-center" >Detalle del Productor</div>
                <ul class="list-group ">
                    <li class="list-group-item">
                        <img width="150px" height="150px"ng-src="../imagenes/perfil/avatar/{{avatares}}"/>
                    </li>
                    <li class="list-group-item">
                        Nombre: {{persona}}
                    </li>
                    <li class="list-group-item">
                        Direccion: {{direccion}}
                    </li>
                    <li class="list-group-item">
                        Telefono: {{telefono}}
                    </li>
                    <li class="list-group-item">
                        Mail: {{mail}}
                    </li>
                    <li class="list-group-item">
                        Nacimiento: {{nacimiento}}
                    </li>
                    <li class="list-group-item">
                        Documento: {{documento}}
                    </li>

                </ul>
            </div>



            <div id="dialogo">
                <div id="mensaje"></div>
            </div>
            <div class="row" ng-show="false">

                <div >
                    <div class="panel panel-default col-md-8 col-md-offset-2">
                        <div class="panel-heading">
                            Envio de Correos
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal"  role="form" id="mailinterno"  >

                                <div  style="background-color:  #bccee1;">
                                    <input type="checkbox" id="todos" value="false" /> <label>Todos</label>
                                    <input type="checkbox" id="Profesional" value="false" /> <label>Profesionales</label>
                                    <input type="checkbox" id="Usuarios" value="false" /> <label>Usuarios</label>
                                </div>
                                <div class="form-group">  
                                    <div class="col-md-8">
                                        <label>E-mail</label>

                                        <input class="form-control" ng-model="email" type="email" id="email" name="email" required size="50" autofocus  />
                                    </div>
                                </div>
                                <div class="form-group">  
                                    <div class="col-md-5">
                                        <label>Sujeto</label>

                                        <input class="form-control" type="text" id="sujeto" name="sujeto" required size="50" autofocus  />
                                    </div></div>
                                <div class="form-group  "> 
                                    <div class="col-md-12">
                                        <label>Nota</label>

                                        <textarea  class="form-control" id="nota" type="text" rows="8" autocomplete="off"  name="nota" required cols="50"  autofocus></textarea>
                                    </div></div>
                                <input type="hidden" name="idpersona" id="idpersona" value="<?php echo $_SESSION['idpersona']; ?>"/>
                                <input class="btn btn-primary pull-right" type="submit"  value="Enviar" />

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script src="../js/usuarios.js" type="text/javascript"></script>

        <?php include '../pie.php'; ?> 
    </body>


</html>