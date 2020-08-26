<?php

namespace App\src\controller;

use App\src\DAO\EpisodeDAO;
use App\src\model\View;

class BackController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function addEpisode($post)
    {
        if(isset($post['submit'])) {
            $episodeDAO = new EpisodeDAO();
            $episodeDAO->addEpisode($post);
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_episode', [
            'post' => $post
        ]);
    }
}