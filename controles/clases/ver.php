<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'Persona.php';

 $personajes = Persona::recuperarTodos();
?>
<html>
   <head></head>
   <body>
      <ul>
      <?php foreach($personajes as $item): ?>
      <li> <?php echo $item['rubro'] ; ?> </li>
      <?php endforeach; ?>
      </ul>
   </body>
</html>