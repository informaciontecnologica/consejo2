<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carrucel
 *
 * @author daniel
 */
include 'conexion.php';
class Carrucel {
    
    //put your code here
    function VerCarrucel ($idpagina){ 
     $re = new Conexion();
        $sql = "select * from imagenes where idpagina=:idpagina";
        $consulta = $re->prepare($sql);
        $consulta->bindParam(":idpagina", $idpagina);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $registro;
            }
            $fila=count($rows);
        }
        
        if (!isset($fila)){
            $fila=2;
 $rows=array(
     array("idimagenes" => "56", "idpagina" => "1" ,"imagen"=>"IMG_20170616_114203985.jpg"),
     array("idimagenes" => "56", "idpagina" => "1" ,"imagen"=>"IMG_20170616_114505980.jpg")
    );
            
        }
//        print_r($rows);
//        echo "fila:".$fila;
        ?>
         <div id="carousel-example-generic" class="carousel slide"  data-ride="carousel" >
                    <!--Indicators--> 
                    <ol class="carousel-indicators">
                        <?php for ($index = 0; $index < $fila;$index++) { 
                        
                       $re=($index==0)? $clas='class="active"':"";?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $index ?>" <?php echo $clas ?>></li>
                       
                         <?php  }; ?>
                    </ol>

                    <!--Wrapper for slides--> 
                    <div class="carousel-inner" role="listbox">
                       <?php 
                       for ($index = 0; $index < $fila;$index++) { 
                        
                       $re=($index==$fila-1)? $clas='active':"";?>
                        <div class="item <?php echo $clas  ?>">
                            <img style="height: 400px; width:  800px;" src="../imagenes/banners/<?php  echo $rows[$index]['imagen']; ?>" alt="..."/>
                            <div class="carousel-caption">
                          Consejo Profesional de la Abogacia Formosa
                            </div>
                        </div>
                       <?php  }; ?>

                    </div>

                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div> 
         
<?php
}
}
