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
        <?php include '../cabezera.php'; ?>

    </head>
 
    <body>
       <header>
            <?php include '../barra.php'; ?> 
        </header> 

        <div class="container" style="margin-top:70px;">
            <div class="barrasuperior">Consejo Profesional de la Abogacia Formosa</div>
            <section style="width:  70%; height: 100%; margin: auto; background-color:  #000000; margin-top: 5px; margin-bottom: 10px; "> 
                           <?php
              include '../controles/clases/ClaseCarrucel.php';
                $carr = new Carrucel();
                $carr->VerCarrucel(4);
                ?>
        </section>
        <section class="autoridades">
           
            <h3>AUTORIDADES CONSEJO DIRECTIVO                  2016/2018</h3>
                <ul>
                    <li>Dra. YANZI, OLGA EDITH</li>
                    Presidente
                    <li>Dra. ESCURRA, VANINA GRACIELA</li>
                    Presidente Suplente
                    <li>Dr. BOONMAN, LORENZ OLIVIER</li>
                    Vice Presidente
                    <li>Dra. LOZANO, PATRICIA ROSA</li>
                    Vice Presidente Suplente
                </ul>
            <div class="autoridadesdiv"></div>
            <h4>CONSEJEROS</h4>
            <div class="col-md-6">
                <h5>Titulares</h5>
                <ul>
                    <li>1. Dr. CANEPA, José Andrés	 </li>
                    <li>2. Dra. ATENCIA, María Isabel	 </li>
                    <li>3. Dr. GORLERI, Horacio Gustavo C. </li>	
                    <li>4. Dr. ROJAS, Hugo Cesar	 </li>
                    <li>5. Dr. FERNANDEZ BEDOYA G. E. Alfredo </li>	
                </ul>
            </div>
            <div class="col-md-6">
                <h5>Suplentes</h5>
                <ul>
                    <li> 1. Dr. LEMO, Roberto Andres </li>
                    <li> 2. Dr. OLMEDO, Jose Agustin</li>
                    <li> 3. Dr.GOMEZ, Guillermo Daniel</li>
                    <li> 4. Dr. OJEDA, Renzo Angel Nicolas </li>
                    <li> 5. Dr. CHIACCHIO, Julio Cesar</li>

                </ul>
            </div>
            <h4>TRIBUNAL DE CONDUCTA</h4>

            <h5> Titulares	</h5>
            <div class="col-md-6">
                <ul>
                    <li> 1. Dr.    SIMANCAS ARECO, Jose J. de Dios</li>	
                    <li> 2. Dr.    VARGAS GOTELLI, Luis Jorge</li>	
                    <li> 3. Dra.  ALBORNOZ, Maria Cristina</li>	
                    <li> 4. Dra. JOULIA de BAY, Silvina Tila</li>	
                    <li> 5. Dr.   BEJARANO, Luis Mauricio</li>
                </ul>
            </div>
             <h5> Suplentes	</h5>
            <div class="col-md-6">
                <ul>
                    <li>    6. Dr.   CAMPUZANO, Miguel Angel</li>
                    <li>  7. Dr.   CHAVEZ, Victor Oscar</li>
                    <li> 8. Dr.   CHATRUC, Andres Martin</li>
                    <li> 9. Dra. SERRANO, Griselda </li>
                    <li>  10. Dr.  CARABAJAL, Leandro Anibal Adrian</li>
                </ul>
            </div>

            <h4> DELEGADOS A FACA</h4>
            <div class="col-md-6">
                <h5> Titulares</h5>
                <ul>
                    <li>   1. Dra.  QUIROGA, Myrian Ramona</li>	
                    <li>   2. Dr. TOBARES CATALA, Gabriel Humberto</li>	
                </ul>
            </div>
            <div class="col-md-6">
                <h5>	Suplentes</h5>
                <ul>
                <li> 1. Dr. RIOS, Angel Alberto</li>
                <li>  2. Dra. PRATI, Gisela Andrea</li>
                </ul>
            </div>
            
             <h4>CONSEJO DE LA MAGISTRATURA</h4>
            <div class="col-md-6">
                <h5> Titulares</h5>	
                <ul>     
                    <li> 1. Dra.  NOTARIO, Carmen Edith	</li>
                </ul>
            </div>   
            <div class="col-md-6">

                <h5>Suplentes</h5>
                <ul>
                    <li> 1. Dr. GORVEIN, Rodolfo Javier </li>
                </ul>
            </div>

        
    </section>
        </div>
 <?php include '../pie.php'; ?>   
</body>



</html>


