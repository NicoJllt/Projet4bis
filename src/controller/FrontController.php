<?php

namespace App\src\controller;

use App\config\Parameter;

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
        return $this->view->render('single_episode', [
            'episode' => $episode,
            'messages' => $messages
        ]);
    }

    public function addMessage(Parameter $post, $episodeId)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Message');
            if (!$errors) {
                $this->messageDAO->addMessage($post, $episodeId);
                $this->session->set('add_message', 'Le nouveau commentaire a bien été ajouté.');
                header('Location: ../public/index.php');
            }
            $episode = $this->episodeDAO->getEpisode($episodeId);
            $messages = $this->messageDAO->getMessagesFromEpisode($episodeId);
            return $this->view->render('single_episode', [
                'episode' => $episode,
                'messages' => $messages,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }

    public function flagComment($messageId)
    {
        $this->messageDAO->flagComment($messageId);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé.');
        header('Location: ../public/index.php');
    }
}
