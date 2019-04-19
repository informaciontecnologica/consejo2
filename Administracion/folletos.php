<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="alert alert-success" role="alert">Folletos</div>
<nav class="nav ">

    <a href="#" class="nav-item active">{{id}} - {{titulo}}</a>
    <a class="nav-item pull-right button-primary "  ng-href="#" ng-click="consulta(false)" >Volver</a>
</nav>


<section ng-controller="Controlfolletos" >
    <div id="dedos"></div>
    <div class="row" ng-show="valor">  
        <div class="imagenes">
            <input id="inputid" name="imagenes[]"  multiple=true type="file" class="file" data-preview-file-type="text"/>
            <div class="listaimagen">
                <div class="" ng-repeat="x in imagenes" >
                    <div style="float: left;position: relative;">
                        <img src="../icons/if_Cancel_1063907.png" title="Eliminar" class="borrarimagen" id="eliminarimagen" ng-click="eliminarimagen(x.idimagenes, x.idevento)"  />

                        <img class="img-thumbnail" ng-src="../imagenes/eventos/{{x.path}}/folletos/{{x.imagen}}" style="float: left;position: relative; z-index:0; " width="250" height="150">
                    </div>   
                </div>
            </div>

        </div>
    </div>

</section>

