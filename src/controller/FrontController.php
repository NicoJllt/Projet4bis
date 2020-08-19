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
        $episodes = $this->episodeDAO->getEpisodes(10, 0, true);
        require '../templates/home.php';
    }

    public function episode($episodeId)
    {
        $episode = $this->episodeDAO->getepisode($episodeId);
        $messages = $this->messageDAO->getMessagesFromEpisode($episodeId);
        require '../templates/singleEpisode.php';
    }
}
