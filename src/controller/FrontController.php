<?php

namespace App\src\controller;

use App\src\DAO\EpisodeDAO;
use App\src\DAO\MessageDAO;

class FrontController
{

    private $episodeDAO;
    private $messageDAO;

    public function __construct()
    {
        $this->episodeDAO = new EpisodeDAO();
        $this->messageDAO = new MessageDAO();
    }

    public function home()
    {
        $episodes = $this->episode->getEpisodes(10, 0, true);
        require '../templates/home.php';
    }

    public function episode($episodeId)
    {
        $episodes = $this->episode->getepisode($episodeId);
        $messages = $this->message->getMessagesFromEpisode($episodeId);
        require '../templates/singleEpisode.php';
    }
}
