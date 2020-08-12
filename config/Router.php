<?php

namespace App\config;
use App\src\controller\FrontController;
use Exception;

class Router
{
    public function run()
    {
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
                $frontController = new FrontController();
                $frontController->home();
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur';
        }
    }
}