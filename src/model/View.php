<?php

namespace App\src\model;

use App\config\Request;

class View
{
    private $file;
    private $title;
    private $request;
    private $session;

    public function __construct()
    {
        $this->request = new Request();
        $this->session = $this->request->getSession();
    }

    // Va prendre en premier paramètre le gabarit selon lequel la page sera construite
    // En second paramètre facultatif un tableau des données à afficher, tableau associatif bien sûr (paires clé = valeur)
    // Cette méthode sert à afficher la vue, comme on le voit dans sa dernière ligne
    public function render($template, $data = [])
    {
        $this->file = '../templates/' . $template . '.php';
        $content  = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../templates/base.php', [
            'title' => $this->title,
            'content' => $content,
            'session' => $this->session
        ]);
        echo $view;
    }

    // Va injecter les données dans le gabarit et retourner le tout sous forme de texte
    private function renderFile($file, $data)
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header('Location: index.php?route=notFound');
    }
}
