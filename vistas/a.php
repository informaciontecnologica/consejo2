<?php

// echo "Array ( 
//            [0] => Array ( [idimagenes] => 55 [idpagina] => 1 [imagen] => 1_cabecera6-300x147.jpg ) 
//            [1] => Array ( [idimagenes] => 56 [idpagina] => 1 [imagen] => 1_IMG_20170616_114203985.jpg ) 
//            [2] => Array ( [idimagenes] => 57 [idpagina] => 1 [imagen] => 1_IMG_20170616_114505980.jpg )
//            )";

//Array ( 
//    [0] => Array ( [idimagenes] => 56 [idpagina] => 1 [imagen] => IMG_20170616_114203985.jpg ) 
//    [1] => Array ( [idimagenes] => 56 [idpagina] => 1 [imagen] => IMG_20170616_114505980.jpg )
//    )


 $r1=array(
     array("idimagenes" => "56", "idpagina" => "1" ,"imagen"=>"IMG_20170616_114203985.jpg"),
     array("idimagenes" => "56", "idpagina" => "1" ,"imagen"=>"IMG_20170616_114505980.jpg")
    );
 
$rows[]=array("imagenes"=>$r1);
print_r($r1);