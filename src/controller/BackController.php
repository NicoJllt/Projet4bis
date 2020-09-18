<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{

    public function administration()
    {
        $episodes = $this->episodeDAO->getEpisodes();
        return $this->view->render('administration', [
            'episodes' => $episodes
        ]);
    }

    public function addEpisode(Parameter $post)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Episode');
            if (!$errors) {
                $this->episodeDAO->addEpisode($post, $this->session->get('user_id'));
                $this->session->set('add_episode', 'Le nouveau chapitre a bien été ajouté.');
                header('Location: ../public/index.php?route=administration');
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
        $episode = $this->episodeDAO->getEpisode($episodeId);
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Episode');
            if (!$errors) {
                $this->episodeDAO->editEpisode($post, $episodeId, $this->session->get('user_id'));
                $this->session->set('edit_episode', 'Le chapitre a bien été mis à jour');
                header('Location: ../public/index.php?route=administration');
            }
            return $this->view->render('edit_episode', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        $episode = $this->episodeDAO->getEpisode($episodeId);
        $post->set('episodeId', $episode->getEpisodeId());
        $post->set('title', $episode->getTitle());
        $post->set('content', $episode->getContent());
        $this->view->render('edit_episode', [
            'post' => $post
        ]);
    }

    public function deleteEpisode($episodeId)
    {
        $this->episodeDAO->deleteEpisode($episodeId);
        $this->session->set('delete_episode', 'Le chapitre a bien été supprimé');
        header('Location: ../public/index.php?route=administration');
    }

    public function addMessage(Parameter $post, $episodeId)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Message');
            if (!$errors) {
                $this->messageDAO->addMessage($post, $episodeId, $this->session->get('user_id'));
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

    public function deleteMessage($messageId)
    {
        $this->messageDAO->deleteMessage($messageId);
        $this->session->set('delete_message', 'Le commentaire a bien été supprimé.');
        header('Location: ../public/index.php');
    }

    public function profile()
    {
        return $this->view->render('profile');
    }

    public function updatePassword(Parameter $post)
    {
        if ($post->get('submit')) {
            $this->userDAO->updatePassword($post, $this->session->get('username'));
            $this->session->set('update_password', 'Le mot de passe a été mis à jour.');
            header('Location: ../public/index.php?route=profile');
        }
        return $this->view->render('update_password');
    }

    public function logout()
    {
        $this->logoutOrDelete('logout');
    }

    public function deleteAccount()
    {
        $this->userDAO->deleteAccount($this->session->get('username'));
        $this->logoutOrDelete('delete_account');
    }

    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if ($param === 'logout') {
            $this->session->set($param, 'Vous êtes maintenant déconnecté.');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé.');
        }
        header('Location: ../public/index.php');
    }
}
