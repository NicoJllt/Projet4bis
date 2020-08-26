<?php

namespace App\src\controller;

use App\src\DAO\EpisodeDAO;
use App\src\DAO\MessageDAO;
use App\src\model\View;

abstract class Controller
{
    protected $episodeDAO;
    protected $messageDAO;
    protected $view;

    public function __construct()
    {
        $this->episodeDAO = new EpisodeDAO();
        $this->messageDAO = new MessageDAO();
        $this->view = new View();
    }
}