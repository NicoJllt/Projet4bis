<?php

namespace App\config;

use App\src\controller\BackController;
use App\src\controller\FrontController;
use App\src\controller\ErrorController;

use Exception;

class Router
{
    private $backController;
    private $frontController;
    private $errorController;
    private $request;

    public function __construct()
    {
        $this->backController = new BackController();
        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
        $this->request = new Request();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');

        try {
            if (isset($route)) {
                if ($route === 'episode') {
                    $this->frontController->episode($this->request->getGet()->get('episodeId'));
                } elseif ($route === 'addEpisode') {
                    $this->backController->addEpisode($this->request->getPost());
                } elseif ($route === 'editEpisode') {
                    $this->backController->editEpisode($this->request->getPost(), $this->request->getGet()->get('episodeId'));
                } elseif ($route === 'deleteEpisode') {
                    $this->backController->deleteEpisode($this->request->getGet()->get('episodeId'));
                } elseif ($route === 'addMessage') {
                    $this->frontController->addMessage($this->request->getPost(), $this->request->getGet()->get('episodeId'));
                } elseif ($route === 'flagComment') {
                    $this->frontController->flagComment($this->request->getGet()->get('messageId'));
                } elseif ($route === 'deleteMessage') {
                    $this->backController->deleteMessage($this->request->getGet()->get('messageId'));
                } elseif ($route === 'register') {
                    $this->frontController->register($this->request->getPost());
                } else {
                    $this->errorController->errorNotFound();
                }
            } else {
                $this->frontController->home();
            }
        } catch (Exception $e) {
            $this->errorController->errorServer();
        }
    }
}