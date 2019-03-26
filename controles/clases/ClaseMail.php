<?php


/**
 * Mail
 * @global string quien es el ente que envia
 * @author Jorge Daniel Castro <info@informaciontecn.com.ar>
 * @param string $mail correo a quien va ser enviado 
 * @param string $rtte correo del remitente 
 * @param string $sujeto tema o asunto del mensaje a enviar
 * @param string $mensaje contenido del  mensaje 
 * @return bool
 */

class Mail {
  
    public $nombre = "Consejo Abogados";
    
/**
 * Mail
 * @global string quien es el ente que envia
 * @author Jorge Daniel Castro <info@informaciontecn.com.ar>
 * @param string $mail correo a quien va ser enviado 
 * @param string $rtte correo del remitente 
 * @param string $sujeto tema o asunto del mensaje a enviar
 * @param string $mensaje contenido del  mensaje 
 * @return bool
 */
    function __construct($mail,$rtte,$sujeto,$mensaje) {
        $to = trim(stripslashes($mail));
        $de = $rtte; // "dtformosa@gmail.com";
       
        $mensaje = $mensaje;
        $headers = array();
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-type: text/plain; charset='utf-8'";
        $headers[] = "From: {$nombre} <{$de}>";
        $headers[] = "Bcc: Administrador <info@informaciontecn.com.ar>;$to;info@consejoabogadosformosa.com.ar <info@consejoabogadosformosa.com.ar>";
        $headers[] = "Reply-To: {$nombre} <{$de}>";
        $headers[] = "Subject: {$subject}";
        $headers[] = "X-Mailer: PHP/" . phpversion();

        $result = mail($to, $sujeto, $mensaje, implode("\r\n", $headers));

        echo $result;
    }

}
