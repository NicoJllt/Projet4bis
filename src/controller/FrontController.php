<?php

namespace App\src\controller;

class FrontController extends Controller
{

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
