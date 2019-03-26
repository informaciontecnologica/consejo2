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

                <h3 style="border-bottom:   1px solid #6feb75;">Nuevo Despacho Provincial</h3>

                <form class="navbar-form " role="UltimaFecha" id="DespachoProvincial">
                    <div class="navbar navbar-default" role="navigation">
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio1" value="1"/>Secretaría de recursos
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio2" value="2"/>Secretaria de tramites
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio3" value="3"/>Cámara civil
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions"  required id="inlineRadio4" value="4"/>Tribunal de Familia
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio7" value="7"/> Tribunal de trabajo Sala I
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio8" value="8"/>Tribunal de trabajo Sala II
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio9" value="9"/>Tribunal de trabajo Sala III
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio10" value="10"/>Juzgado Civil 1
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio11" value="11"/>Juzgado Civil 2 
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio12" value="12"/>JCC 2 - Ampliatoria
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio13" value="13"/>Juzgado Civil  3
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio14" value="14"/>JCC 3 - Registro público de comercio
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio15" value="15"/>Juzgado Civil  4
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio16" value="16"/>Juzgado Civil  5
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio17" value="17"/>Juzgado Civil  6
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" required id="inlineRadio19" value="18"/>Juzgado Civil Las Lomitas
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions"  required id="inlineRadio5" value="19"/>JCCTM  El Colorado 
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions"  required id="inlineRadio6" value="20"/>JCCT - Clorinda
                        </label>



                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" required name="fecha" id="fecha" title="Ultima Fecha despacho" placeholder="Ultima Fecha despacho" />
                        <input type="hidden" class="form-control" name="tipo" id="tipo" value="AgregarDespachoProvincial"/>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="files" id="files" title="Ultima Fecha despacho" required />
                    </div>
                    <button type="submit" class="btn btn-success" ng-value="{{accion}}">Agregar</button>

                </form>
   
    </body>
</html>
