<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{

    public function addEpisode(Parameter $post)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Article');
            if (!$errors) {
                $this->episodeDAO->addEpisode($post);
                $this->session->set('add_episode', 'Le nouvel épisode a bien été ajouté.');
                header('Location: ../public/index.php');
            }
            return $this->view->render('add_episode', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('add_episode');
    }

    public function editEpisode(Parameter $post, $episodeId)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Episode');
            if (!$errors) {
                $this->episodeDAO->editEpisode($post, $episodeId);
                $this->session->set('editEpisode', 'L\'épisode a bien été mis à jour');
                header('Location: ../public/index.php');
            }
            return $this->view->render('editEpisode', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        $episode = $this->episodeDAO->getEpisode($episodeId);
        $post->set('episodeId', $episode->getEpisodeId());
        $post->set('title', $episode->getTitle());
        $post->set('content', $episode->getContent());
        $this->view->render('editEpisode', [
            'post' => $post
        ]);
    }

    public function deleteEpisode($episodeId)
    {
        $this->episodeDAO->deleteEpisode($episodeId);
        $this->session->set('deleteEpisode', 'L\'épisode a bien été supprimé');
        header('Location: ../public/index.php');
    }
}
