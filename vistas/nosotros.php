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


            <article class="delegacion">
                <h4 class="line-separator">Consejo Profesional de la Abogacía de Formosa</h4>
                <!--                <div class="line-separator"> asasdasdasas</div>-->

                <ul>
                    <li>San Martín 569, Formosa, 3600</li>

                    <li>Télefono  0370 – 4430340 </li>

                    <li>8:00 a 13:00 y de 17:00 a 20:00 hs</li>

                    <li>contacto@cpabogaciaformosa.com</li>
                </ul>
                <div id="map-formosa" ></div>

            </article>



            <article class="delegacion">
                <h4 class="line-separator">Consejo Profesional de la Abogacía Delegación Clorinda</h4>
                <ul>
                    <li>25 de Mayo 1346, Clorinda, Formosa, 3610 </li>
                    <li>Teléfono: 3718-425202</li>

                    <li>clorinda@cpabogaciaformosa.com</li></ul>
                <div id="map-clorinda"></div>
            </article>


            <article class="delegacion">
                <h4 class="line-separator">Consejo Profesional de la Abogacía Delegación Las Lomitas</h4>
                <ul>
                    <li>Almirante Brown N° 29, Las Lomitas, Formosa</li>

                    <li>laslomitas@cpabogaciaformosa.com  </li>
                </ul>
                <div id="map-lomitas"></div>
            </article>
        </div>
        <?php include '../pie.php'; ?> 
    </body>
<script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map-formosa'), {
            center: {lat: -26.179484, lng: -58.165171},
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {lat: -26.179484, lng: -58.165171},
            map: map,
            title: 'Consejo Profesional de la Abogacía de Formosa'
        });

        map = new google.maps.Map(document.getElementById('map-clorinda'), {
            center: {lat: -25.286781, lng: -57.715981},
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {lat: -25.286781, lng: -57.715981},
            map: map,
            title: 'Consejo Profesional de la Abogacía Delegación Clorinda'
        });
        map = new google.maps.Map(document.getElementById('map-lomitas'), {
            center: {lat: -24.711940, lng: -60.595748},
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {lat: -24.711940, lng: -60.595748},
            map: map,
            title: 'Consejo Profesional de la Abogacía Delegación Las Lomitas'
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_Oze_7-1VAaRQncH5roDSaiWoU2VDlpQ&callback=initMap"
async defer>
</script>
</html>