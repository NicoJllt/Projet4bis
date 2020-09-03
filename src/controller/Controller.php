<?php

namespace App\src\controller;

use App\config\Request;
use App\src\constraint\Validation;
use App\src\DAO\EpisodeDAO;
use App\src\DAO\MessageDAO;
use App\src\model\View;

abstract class Controller
{
    protected $episodeDAO;
    protected $messageDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->episodeDAO = new EpisodeDAO();
        $this->messageDAO = new MessageDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}
