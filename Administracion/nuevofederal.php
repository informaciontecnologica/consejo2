<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

                <!--<h3>Federal</h3>-->
                <form class="navbar-form navbar-left" role="UltimaFecha" id="federal">
                    <h3 style="border-bottom:   1px solid #6feb75; ">Agregar Despacho Federal</h3>
                    <div class="navbar navbar-default" role="navigation">
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio1" value="1"/>Civil 1
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio2" value="2"/>Civil 2
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio3" value="3"/>Tribunal 1
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions"  required id="inlineRadio4" value="4"/>Tribunal 2
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="fecha" id="fecha" title="Ultima Fecha despacho" placeholder="Ultima Fecha despacho" value="<?php echo $recortes; ?>"/>
                        <input type="hidden" class="form-control" name="tipo" id="tipo" value="Agregar"/>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="files" id="files" title="Ultima Fecha despacho"  />
                    </div>
                    <button type="submit" class="btn btn-success" ng-value="{{accion}}">Agregar</button>
                </form>
           
    </body>
</html>
