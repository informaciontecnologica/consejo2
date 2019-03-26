
<html>
    <head>
        <?php include '../cabezera.php'; ?>
        <script type="text/javascript">
            
var app = angular.module('App', []);
app.controller('control', function ($scope, $http, $filter) {}
        
);
            
            
            $("document").ready(function () {
                $("#formulario").submit(function () {
                    var data = {
                        "action": "listar"
                    };
                    
                    data = $(this).serialize() + "&" + $.param(data);
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "pruebaintermedio.php", //Relative or absolute path to response.php file
                        data: data,
                        success: function (echo) {
console.log(echo);
////                        $('p').append(myJsonString['texto']);
//                            $.each(echo.response, function (i, item) {
////                               alert([item.texto, item.titulo]);
//                               $( "#dedos" ).append( item.texto );
//                               
//                            });
                           


                        }
                             
                    });
                });
            });
        </script>
    </head>
    <body ng-app="App" ng-controller="control">
        
        <form id="formulario"  method="post" accept-charset="utf-8">
            <input type="text" name="titulo" value="t1" />
            <input type="date" name="fecha" value="2017-05-06"/>
            <input type="text" name="texto" value="ssss" />
            <select name="tipo">
                <option value="leer">leer</option>
                <option value="set">set</option>
            </select>
            <input type="submit" name="submit" value="Submit form"  />
        </form> 
        <p id="dedos">asdasdas</p>
        <div ng-repeat="x in registros">
           {{x.texto}}
        </div>
    </body>
</html>