<?php

namespace App\src\controller;

// Gestion des erreurs si aucune ressource n'a été trouvée à l'adresse demandée (404) 
// ou si la requête envoyée par le navigateur n'a pas pu être traitée (500)

class ErrorController extends Controller
{

    public function errorNotFound()
    {
        return $this->view->render('error_404');
    }

    public function errorServer($e)
    {
        return $this->view->render('error_500', ['error' => $e]); 
    }
}
