<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{

    public function addEpisode(Parameter $post)
    {
        if ($post->get('submit')) {
            $this->episodeDAO->addEpisode($post);
            $this->session->set('add_episode', 'Le nouvel épisode a bien été ajouté.');
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_episode', [
            'post' => $post
        ]);
    }

    public function editEpisode(Parameter $post, $episodeId)
    {
        if ($post->get('submit')) {
            $this->episodeDAO->editEpisode($post, $episodeId);
            $this->session->set('editEpisode', 'L\'épisode a bien été mis à jour');
            header('Location: ../public/index.php');
        }
        $episode = $this->episodeDAO->getEpisode($episodeId);
        $this->view->render('editEpisode', [
            'episode' => $episode
        ]);
    }
}
