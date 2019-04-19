<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<nav class="nav alert alert-success ">
    Noticias<hr>
   <a href="#" class="nav-item active" ng-href="#noticias/{{x.ideventos}}/{{x.path}}/{{x.titulo}}" ng-click="Aimagenes(x.ideventos, x.path, x.titulo);" class="btn btn-info" role="button">Agregar</a>
    {{titulo}}
    <a class="nav-item pull-right button-primary "  ng-href="#" ng-click="consulta(false)" >Volver</a>
</nav>


<section ng-controller="ControlNoticias" >
    <div id="dedos"></div>
    <div class="row" ng-show="valor">  
        <div class="imagenes">
         
            <div class="listaimagen">
                <div class="" ng-repeat="x in noticias" >
                    <div style="float: left;position: relative;">
                        {{noticias}} - 
   <a ng-href="#noticias/{{x.ideventos}}/{{x.path}}/{{x.titulo}}" ng-click="Aimagenes(x.ideventos, x.path, x.titulo);" class="btn btn-info" role="button">Borrar</a>
                        
                    </div>   
                </div>
            </div>

        </div>
    </div>

</section>

