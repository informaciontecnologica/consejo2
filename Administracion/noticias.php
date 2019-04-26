<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div  ng-controller="ControlNoticias">
    <nav class="nav alert alert-success ">
    Noticias   -   {{titulo}}<hr>
    <a class="nav-item active pull-right"  ng-click="grilla=true; Formul=false;"  class="btn btn-info" role="button"> -  Todos</a>  
    <a class="nav-item active pull-right" ng-click="ANoticias();"  class="btn btn-info" role="button">Agregar</a>  
     
   
    <a class="nav-item  "  ng-href="#" ng-click="consulta(false)" >Volver</a>
</nav>

<section ng-show="grilla">
    <div id="dedos"></div>
    <div class="row" >  
        <div class="imagenes">

         
                <div class="" ng-repeat="x in noticias" >

                    <div style="float: left;position: relative; ">
                        
                        <div class="card col-md-4  border-secondary mb-3" style="  border: #a8f5c2 1px solid   ; border-radius: 8px;"  >
                            <div  style="background-color:  #a8f5c2 ">
                                <h6 class="card-title">{{x.idnoticia}} - {{x.titulo}}</h6>
                                <h6 class="card-title"> {{x.fecha}}</h6>
                            </div>
                            <div class="card-body text-secondary">
                            
                                <p class="card-text font-weight-normal "> {{x.texto}}</p>
                               <a ng-href="#noticias/{{x.ideventos}}/{{x.path}}/{{x.titulo}}" ng-click="Aimagenes(x.ideventos, x.path, x.titulo);" class="btn btn-info" role="button">Borrar</a>
                            <a  ng-click="ENoticias(x.ideventos, x.path, x.titulo,x.texto,x.fecha);" class="btn btn-info" role="button">Editar</a>
                            </div>
                        </div>
                      

                    </div>   
                </div>
           

        </div>
    </div>

</section>
<section ng-show="Formul">
    <form ng-submit="Formularionoti()" role="Form">
        <input ng-value="{{x.ideventos}}" value="{{x.ideventos}}" name="idevento" ng-model="form.id" type="hidden"/>
      <div class="form-group col-md-3">
    <label for="Fecha">Fecha</label>
    <input type="date" ng-model="form.fecha" class="form-control col-md-3" id="fecha" aria-describedby="emailHelp" placeholder="Fecha Noticia">
    <small id="emailHelp" class="form-text text-muted">Fecha mal escrita.</small>
  </div>
  <div class="form-group col-md-5">
    <label for="Titulo">Titulo</label>
    <input type="text" class="form-control" ng-model="form.titulo" maxlength="70" id="titulo" placeholder="Titulo">
  </div>
  <div class="form-group col-md-12">
       <label for="Texto">Texto</label>
       <textarea class="form-control" ng-model="form.texto" maxlength="180" rows="5" id="texto"></textarea>
    <label class="texto" for="texto">Agregar texto</label>
  </div>
        <button type="submit" class="btn btn-primary pull-right col-md-12" ng-value="{{form.tipo}}">{{form.tipo}}</button>
    </form>
    
</section>
   

</div>