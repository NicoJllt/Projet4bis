<?php

namespace App\src\controller;

use App\src\DAO\EpisodeDAO;
use App\src\DAO\MessageDAO;
use App\src\model\View;

class FrontController
{

    private $episodeDAO;
    private $messageDAO;
    private $view;

    public function __construct()
    {
        $this->episodeDAO = new EpisodeDAO();
        $this->messageDAO = new MessageDAO();
        $this->view = new View();
    }

    public function home()
    {
        $episodes = $this->episodeDAO->getEpisodes(10, 0, true);
        return $this->view->render('home', [
            'episodes' => $episodes
        ]);
    }

    public function episode($episodeId)
    {
        $episode = $this->episodeDAO->getepisode($episodeId);
        $messages = $this->messageDAO->getMessagesFromEpisode($episodeId);
        return $this->view->render('singleEpisode', [
            'episode' => $episode,
            'messages' => $messages
        ]);
    }
}
