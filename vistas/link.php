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
        <?php include '../cabezera.php';
        ?>   
    </head>
    <body >
        <header>
            <?php include '../barra.php'; ?> 
        </header>
        <div class="container" style="margin-top:70px;">
            <div class="barrasuperior">Consejo Profesional de la Abogacia Formosa</div>
            <section style="width:  70%; height: 100%; margin: auto; background-color:  #000000; margin-top: 5px; "> 
                <?php
                include '../controles/clases/ClaseCarrucel.php';
                $carr = new Carrucel();
                $carr->VerCarrucel(6);
                ?>
            </section>

            <article class="col-md-12 col-xs-12 ">
                <h5 class="text-uppercase text-center"> Sitios de interes </h5>
           
                <table class="col-md-12 col-xs-8 table table-bordered">
                                        
                    <tr class="sectiontableentry1">
                       
                        <td height="20">
                            <span class="glyphicon glyphicon-link"></span>
                            <a href="http://www.ij-ilg.com" target="top" class="category"> Soluciones jurídicas online para toda latinoamerica </a>
                            <span class="description">www.ij-ilg.com</span>
                        </td>
                        <td align="center">
                           	</td>
                    </tr>
                    <tr class="sectiontableentry1">
                       
                        <td height="20">
                           <span class="glyphicon glyphicon-link"></span>
                            <a href="https://vlex.com/" target="top" class="category"> https://vlex.com/</a>
                            <span class="description">https://vlex.com/</span>
                        </td>
                        <td align="center">
                           	</td>
                    </tr>
                    <tr class="sectiontableentry2">
                     
                        <td height="20">
                           <span class="glyphicon glyphicon-link"></span>
                            <a href="http://www.infoleg.gob.ar/" target="top" class="category">infoleg.gob.ar/</a>
                            <span class="description">http://www.infoleg.gob.ar/</span>
                        </td>
                        <td align="center">
                            	</td>
                    </tr>
                    <tr class="sectiontableentry1">
                      
                        <td height="20">
                            <span class="glyphicon glyphicon-link"></span>
                            <a href="http://www.diariojudicial.com/" target="top" class="category">http://www.diariojudicial.com/</a>
                            <span class="description">http://www.diariojudicial.com/</span>
                        </td>
                        <td align="center">
                            	</td>
                    </tr>
                    <tr class="sectiontableentry2">
                        
                        <td height="20">
                            <span class="glyphicon glyphicon-link"></span>
                            <a  href="http://www.derechos.org/nizkor/arg/ley/" target="top" class="category">http://www.derechos.org/nizkor/arg/ley/</a>
                            <span class="description">http://www.derechos.org/nizkor/arg/ley/</span>
                        </td>
                        <td align="center">
                           	</td>
                    </tr>
                    <tr class="sectiontableentry1">
                       
                        <td height="20">
                            <span class="glyphicon glyphicon-link"></span>
                            <a href="http://www.aabadigital.org/" target="top" class="category"> 	http://www.aabadigital.org/</a>
                            <span class="description">Aabadigital</span>
                        </td>
                        <td align="center">
                            	</td>
                    </tr>
                   <tr class="sectiontableentry1">
                       
                        <td height="20">
                            <span class="glyphicon glyphicon-link"></span>
                            <a   target="_new" href="http://faca.org.ar/" title="Federacion Argentina de Colegios de Abogados">Federacion Argentina de Colegios de Abogados</a>

                        </td>
                        <td align="center">
                            	</td>
                    </tr>
                </table>
            </article>   

        </section>
    </div>
    <?php include '../pie.php'; ?> 
</body>

</html>