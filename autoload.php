<?php

function autocargar($nombreClase)
{
    include "controllers/$nombreClase.php";
}
spl_autoload_register("autocargar");


?>