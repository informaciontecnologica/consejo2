<nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" title="Consejo Profesional de la Abogacia Formosa 'Inicio' " href="/index.php">CPA</a>
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div id="collapse" class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <?php // echo $_SERVER['SERVER_NAME'];?>

            <li class="active"><a href="../vistas/resoluciones.php">Resoluciones</a></li>
            <li class="active"><a href="../vistas/autoridades.php">Autoridades</a></li>
            <li class="active"><a href="../vistas/eventos.php">Eventos</a></li>
            <li class="active"><a href="../vistas/jabogados.php">Jov.Abogados</a></li>
            <li class="active"><a href="../vistas/honorarios.php">Honorarios</a></li>
            <!--<li class="active"><a href="../vistas/despachos.php">Despachos</a></li>-->
            <li class="active"><a href="../vistas/nosotros.php">Nosotros</a></li>
            <li class="active"><a href="../vistas/registrarse.php">Registrarse</a></li>
            <li class="active"><a href="../vistas/link.php">Link</a></li>
            <?php
            if (isset($_SESSION['nombre']['nombre'])) {

                if (isset($_SESSION['idpersona'])) {
                    ?>


                    <?php
                }
            }
            ?>

            <ul class="nav navbar-nav">
                <?php
                if (!isset($_SESSION['nombre']['nombre'])) {
                    ?>
                    <li><a href="ingresar.php">Ingresar</a></li>

                <?php } else {
                    ?>

                </ul>

            </ul>                    
            <?php
        }



        if (isset($_SESSION['nombre']['nombre'])) {
            $nombre = explode(' ', $_SESSION['nombre']['nombre']);
            ?>
            <ul class="nav  navbar-nav navbar-right " style="width: 250px;">
                <li style="width: 120px; text-align:  center;"><a href="" 
                                                                  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge" title="Perfil"><?php echo ucfirst($nombre[0]); ?> </span> <span class="caret"></span></a>       

                    <ul class="dropdown-menu">
                        <li><a href="../vistas/perfil.php">Perfil</a></li>
                        <li><a href="../vistas/logout.php">Salir</a></li>
                        <li role="separator" class="divider"></li>
                        <?php
                        if (isset($_SESSION['perfil'])) {
                            $ar = array(1, 2);
                            if (in_array($_SESSION['perfil'], $ar)) {
                                ?>
                                <li ><a href="../Administracion/videos.php">videos</a></li>
                                <li><a href="../Administracion/despachos.php">Despachos</a></li>
                                <li><a href="../Administracion/imagenes.php">Imagenes</a></li>
                                <li><a href="../Administracion/resoluciones.php">Resoluciones</a></li>
                                <li><a href="../Administracion/usuarios.php">Usuarios</a></li>    
                                <!--<li><a href="../Administracion/banners.php">Banners</a></li>-->  
                                <!--<li><a href="../Administracion/jovenes.php">jovenes</a></li>-->
                                <li><a href="../Administracion/honorarios.php">Honorarios</a></li>  
                                <li><a href="../Administracion/eventos.php">Eventos</a></li>  
                                <!--<li><a href="../Administracion/juridico.php">Juridico</a></li>--> 
                                <!--<li><a href="../Administracion/otros.php">Otros</a></li>-->

                                <?php
                            }
                            $ab = array(1, 2, 3);
                            if (in_array($_SESSION['perfil'], $ab)) {
                                ?>
                                <li><a href="../vistas/estadosaldos.php">Estado Saldos Matriculas y Bonos </a></li> 
                                <!--                                <li><a href="../vistas/correos.php">Correos</a></li>-->

                                <?php
                            }
                        }
                        ?>

                    </ul>
                </li>   
                 
            </ul>   
        <?php }
        ?>


    </div>
</nav>