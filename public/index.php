<?php

require '../config/dev.php';
require '../vendor/autoload.php';

try{
    if(isset($_GET['route']))
    {
        if($_GET['route'] === 'episode'){
            require '../templates/singleEpisode.php';
        }
        else{
            echo 'page inconnue';
        }
    }
    else{
        require '../templates/home.php';
    }
}
catch (Exception $e)
{
    echo 'Erreur';
}