<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ((isset($_POST['fechaultima'])) && (!empty($_POST['fechaultima']))){
    $fp = fopen("../../Administracion/fechaultima.php", "w");
     if($fwrite = fwrite($fp, $_POST['fechaultima'])){
        echo "true";
     } else {
         echo "false";
     }
     
}


