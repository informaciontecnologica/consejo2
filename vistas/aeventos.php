<?php ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php 
        echo "<script src=\"../jquery/jquery-2.1.3.min.js\" type=\"text/javascript\"></script>
        <link href=\"../jquery/jquery-ui-1.12.1.custom/jquery-ui.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <!--<script src=\"../bootstrap-3.3.5-dist/js/bootstrap.min.js\" type=\"text/javascript\"></script>-->
        <!--<link href=\"../bootstrap-3.3.5-dist/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\"/>-->
        <!-- ideally at the bottom of the page -->
        <script src=\"../jquery/angular.min.js\" type=\"text/javascript\"></script>";
        ?>    
        

    </head>

  

    <body ng-app="App" ng-controller="eventos">
       

        <section class="container"  >
         
            <div ng-repeat="gege in doc">{{gege}}</div>

        </section>



      
          
      
    
    
            
    </body>
<script>
        var app = angular.module('App', []);
        app.controller('eventos', function ($scope, $http, $filter) {

     $scope.lista1 = function () {
                $http({
                     url: '../controles/clases/GetDocumento.php',
                    method: "POST",
                    data: {'idevento': '24', 'tipo': 'doc'}
                }).then(function (response) {
//                    $scope.documentos(24, "doc");
//                    console.log("Llego!!");
                    $scope.doc = response.data.documento;
                    console.log(response.data.documentos);
                });
            };
              $scope.lista1();

            
   
            $scope.lista = function () {
                $http({
                    url: '../controles/clases/intermedio.php',
                    method: "POST",
                    data: {tipo: 'TodosEventosAgrupados'}
                }).then(function (response) {
//                    $scope.documentos(24, "doc");
//                    console.log("Llego!!");
                    $scope.evento = response.data.eventos;
                    console.log(response.data.eventos);
                });
            };
            $scope.lista();


        });
       

    </script>
</html>
