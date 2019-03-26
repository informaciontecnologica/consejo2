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
<!--       <div class="row" ng-show="ListaFederal">-->

                <div class="navbar navbar-default" role="navigation">
                    <label class="form-inline">
                        <input type="text" ng-model="searchfederal" class="form-control" placeholder="Filtrar"/>
                    </label>
                </div>
                <div class="form-control">
                    <div class='btn-group'> 
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == 0' ng-click='currentPage = currentPage - 1'>&laquo;</button>
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage == page.no - 1' ng-click='setPage(page.no)' ng-repeat='page in pages'>{{page.no}}</button>
                        <button type='button' class='btn btn-default btn-xs' ng-disabled='currentPage >= usuarios.length / pageSize - 1'  ng-click='currentPage = currentPage + 1'>&raquo;</button>         </div>
                </div>

                <div class="tg-wrap">
                    <table id="tg-ezXJz" class="tg">
                        <caption class="text-center">Lista de Despachos Federales</caption>
                        <thead>
                            <tr>

                                <th class="tg-031e">Items</th>
                                <th class="tg-yw4l">Tribunal</th>
                                <th class="tg-yw4l">Fecha</th>
                                <th class="tg-yw4l">Ver</th>
                                <th class="tg-yw4l">Borrar</th>
                            </tr>
                        </thead>
                        <tbody ng-repeat="fe in federales| filter:searchfederal | startFromGrid: currentPage * pageSize | limitTo: pageSize">
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{tribunalesFederales[fe.idlugar - 1].nombre}}</td>
                                <td>{{fe.fecha| date:'dd-MM-yyyy'}} </td>
                                <td> <a ng-href="../despachos/federal/{{fe.nombrearchivo}}" target="top" title="Ver" class="glyphicon glyphicon-edit"></a></td>
                                <td><button ng-click="BorrarFederal(fe.idfederal)" title="Borrar" class="glyphicon glyphicon-remove pull-right"></button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            <!--</div>-->
    </body>
</html>
