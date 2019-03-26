/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('App', []);

app.controller('perfil', function ($scope, $http) {
    $scope.perfil = false;




    $scope.nacio = function () {
        $http({
            url: '../controles/clases/Get_perfil.php',
            method: "POST",
            data: {"tipo": "pais"}

        }).then(function (response) {
            console.log(response);
            $scope.pais = response.data.pais;

        });

    };
    $scope.unive = function () {
        $http({
            url: '../controles/clases/Get_perfil.php',
            method: "POST",
            data: {"tipo": "universidad"}

        }).then(function (response) {
            console.log(response);
            $scope.universidad = response.data.universidad;
        });
    };

    $scope.nacio();

   
    
    $scope.cambios = function () {
          console.log("sadas "+$scope.tipoperfil);
        switch ($scope.tipoperfil) {
            case 3:
                $scope.unive();
              $scope.PantallaTitulo='1';
                break;
        }
    };


    $scope.userInit = function (idmatricula, idpersona) {
        $scope.perfil = !$scope.perfil;
        $scope.idmatricula = idmatricula;
        $scope.cambios();
        console.log("perfil :  " + $scope.tipoperfil + "aaa "+  $scope.perfil+ "   idsusario : " + $scope.idusuario + " idmatricula: " + idmatricula + " idpersona: " + idpersona + "  registro: " + $scope.registro.id_matricula);
        if ($scope.registro.id_matricula > 0) {
            $scope.Editarmatricula = true;
            $scope.unive();
        } else {
            $scope.Editarmatricula = false;
        }
        $scope.nacio();
        if (idpersona == "noidpersona") {
            $scope.estadoform = "Agregar";

        }
        if (idpersona != "noidpersona") {

            $scope.estadoform = "Modificar";
            $scope.personas(idpersona);

        }

    };

    $scope.formulariopersonal = function () {
        $scope.persona.idusuario = $scope.idusuario;
        $scope.persona.idperfil = document.getElementById("idperfil").value;
        $scope.persona.idpersona = document.getElementById("idpersona").value;
        console.log($scope.persona);
        switch ($scope.estadoform) {
            case "Agregar":
                $scope.opcion = "AgregarPerfilPersonal";
                break;
            case "Modificar":
                $scope.opcion = "ModificarPerfilPersonal"
        }
        $http({
            url: '../controles/controles/usuariosintermedios.php',
            method: "POST",
            data: {"tipo": $scope.opcion, "persona": $scope.persona}

        }).then(function (response) {

            console.log(response);
            if (response.data.personas == "ok") {
                alert("Se a registro con existo, " + $scope.persona);
                $scope.idpersona = response.data.idpersona;
            }

        });

    };


    $scope.personas = function (idpersona) {
        $http({
            url: '../controles/clases/Get_perfil.php',
            method: "POST",
            data: {"tipo": "persona", "idpersona": idpersona}

        }).then(function (response) {
            console.log(response);
            if (response.data.persona != "false") {
                $scope.persona = {};
                $scope.persona.nombre = response.data.persona[0].nombre;
                $scope.persona.apellido = response.data.persona[0].apellido;
                $scope.persona.documento = response.data.persona[0].documento;
                $scope.persona.nacimiento = new Date(response.data.persona[0].nacimiento);
                $scope.persona.dirparticular = response.data.persona[0].direccion;
                $scope.persona.teleparticular = response.data.persona[0].telefono;
                console.log(response.data.persona[0].sexo);
                $scope.persona.sexo = response.data.persona[0].sexo;
                $scope.persona.nacionalidad = {idpais: response.data.persona[0].pais};
                $scope.persona.estadocivil = response.data.persona[0].estadocivil;

                $scope.persona.barrio = response.data.persona[0].barrio;
                $scope.persona.provincia = response.data.persona[0].provincia;
                $scope.persona.ciudad = response.data.persona[0].ciudad;

            }
        });

    };



    $scope.perfiles = [
        {'id': 1, 'label': 'Administrador'},
        {'id': 2, 'label': 'Editor'},
        {'id': 3, 'label': 'Profesional'},
        {'id': 4, 'label': 'Usuario'}
    ];

});

