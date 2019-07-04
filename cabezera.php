<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

/* Establecemos que las paginas no pueden ser cacheadas */
header("Expires: Tue, 01 Jul 2019 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('America/Argentina/Buenos_Aires');

function logOut() {
    session_unset();
    session_destroy();
    session_start();
    session_regenerate_id(true);
}

$titulo = "Consejo Profesional de la Abogacía de Formosa";
$logo = "";
echo "
 <meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
        
       <TITLE>$titulo</TITLE>

<META NAME=\"DC.Language\" SCHEME=\"RFC1766\" CONTENT=\"Spanish\">
<META NAME=\"AUTHOR\" CONTENT=\"jorge daniel castro\">
<META NAME=\"REPLY-TO\" CONTENT=\"info@informaciontecn.com.ar\">
<LINK REV=\"made\" href=\"mailto:info@informaciontecn.com.ar\">
<META NAME=\"DESCRIPTION\" CONTENT=\"sitio oficial de del consejo de abogacía de la Provincia de Formosa, Argentina.\">
<META NAME=\"KEYWORDS\" CONTENT=\"abogados, Formosa, consejo, jurídico, bono\">
<META NAME=\"Resource-type\" CONTENT=\"Homepage\">
<META NAME=\"DateCreated\" CONTENT=\"Sun, 3 December 2017 00:00:00 GMT-3\">
<META NAME=\"Revisit-after\" CONTENT=\"20 days\">
<META NAME=\"robots\" content=\"ALL\">
 
        <script src=\"../jquery/jquery-2.1.3.min.js\" type=\"text/javascript\"></script>
        <link href=\"../jquery/jquery-ui-1.12.1.custom/jquery-ui.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <!--<script src=\"../bootstrap-3.3.5-dist/js/bootstrap.min.js\" type=\"text/javascript\"></script>-->
        <!--<link href=\"../bootstrap-3.3.5-dist/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\"/>-->
        <!-- ideally at the bottom of the page -->
        <script src=\"../jquery/angular.min.js\" type=\"text/javascript\"></script>
        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\"/>
        <link href=\"https://fonts.googleapis.com/css?family=Roboto+Slab\" rel=\"stylesheet\"/>
        <link href=\"../estilo.css\" rel=\"stylesheet\" type=\"text/css\"/>
        <script src=\"../jquery/jquery-ui-1.12.1.custom/jquery-ui.js\"></script>



        <link href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\" rel=\"stylesheet\"/>
        <link href=\"../jquery/bootstrap-fileinput-master/css/fileinput.min.css\" media=\"all\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
        <!-- link href=\"path/to/css/fileinput-rtl.min.css\" media=\"all\" rel=\"stylesheet\" type=\"text/css\" /-->
        <!--<script src=\"//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js\"></script>-->
        <!-- piexif.min.js is only needed for restoring exif data in resized images and when you 
              wish to resize images before upload. This must be loaded before fileinput.min.js -->
        <script src=\"../jquery/bootstrap-fileinput-master/js/plugins/piexif.min.js\" type=\"text/javascript\"></script>
        <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
             This must be loaded before fileinput.min.js -->
        <script src=\"../jquery/bootstrap-fileinput-master/js/plugins/sortable.min.js\" type=\"text/javascript\"></script>
        <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
             This must be loaded before fileinput.min.js -->
        <script src=\"../jquery/bootstrap-fileinput-master/js/plugins/purify.min.js\" type=\"text/javascript\"></script>
        <!-- the main fileinput plugin file -->
        <script src=\"../jquery/bootstrap-fileinput-master/js/fileinput.min.js\"></script>
        <!-- bootstrap.js below is needed if you wish to zoom and view file content 
             in a larger detailed modal dialog -->
        <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <!-- optionally if you need a theme like font awesome theme you can include 
            it as mentioned below -->
        <script src=\"../jquery/bootstrap-fileinput-master/js/locales/fa.js\"></script>
        <!-- optionally if you need translation for your language then include 
            locale file as mentioned below -->
        <script src=\"../jquery/bootstrap-fileinput-master/js/locales/es.js\"></script>
        <link href=\"https://fonts.googleapis.com/css?family=Merriweather\" rel=\"stylesheet\">
        <link href=\"https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700\" rel=\"stylesheet\">
";
