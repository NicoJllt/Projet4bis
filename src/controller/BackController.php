<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
// Vérification connexion session
    private function checkLoggedIn()
    {
        if (!$this->session->get('username')) {
            $this->session->setFlashMessage('need_login', 'Vous devez vous connecter pour accéder à cette section');
            return header('Location: ../public/index.php?route=login');
        } else {
            return true;
        }
    }
// Vérification Admin
    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if (!($this->session->get('role') === 'admin')) {
            $this->session->setFlashMessage('not_admin', 'Vous n\'êtes pas autorisé à accéder à cette page');
            return header('Location: ../public/index.php?route=profile');
        } else {
            return true;
        }
    }

    public function administration()
    {
        if ($this->checkAdmin()) {
            $nbEpisodes = $this->episodeDAO->count();
            $episodes = $this->episodeDAO->getEpisodes(1, $nbEpisodes, true);
            $messages = $this->messageDAO->getFlagComments();
            $users = $this->userDAO->getUsers();

            return $this->view->render('administration', [
                'episodes' => $episodes,
                'messages' => $messages,
                'users' => $users
            ]);
        }
    }

    public function addEpisode(Parameter $post)
    {
        if ($this->checkAdmin()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Episode');
                if (!$errors) {
                    $this->episodeDAO->addEpisode($post, $this->session->get('user_id'));
                    $this->session->setFlashMessage('add_episode', 'Le nouveau chapitre a bien été ajouté');
                    return header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('add_episode', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('add_episode');
        }
    }

    public function editEpisode(Parameter $post, $episodeId)
    {
        if ($this->checkAdmin()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Episode');
                if (!$errors) {
                    $this->episodeDAO->editEpisode($post, $episodeId, $this->session->get('user_id'));
                    $this->session->setFlashMessage('edit_episode', 'Le chapitre a bien été mis à jour');
                    return header('Location: ../public/index.php?route=administration');
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
    }

    public function deleteEpisode($episodeId)
    {
        if ($this->checkAdmin()) {
            $this->episodeDAO->deleteEpisode($episodeId);
            $this->session->setFlashMessage('delete_episode', 'Le chapitre a bien été supprimé');
            return header('Location: ../public/index.php?route=administration');
        }
    }

    public function unflagComment($messageId)
    {
        if ($this->checkAdmin()) {
            $this->messageDAO->unflagComment($messageId);
            $this->session->setFlashMessage('unflag_comment', 'Le commentaire a bien été désignalé');
            return header('Location: ../public/index.php?route=administration');
        }
    }

    public function addMessage(Parameter $post, $episodeId)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Message');
                if (!$errors) {
                    $this->messageDAO->addMessage($post, $episodeId, $this->session->get('user_id'));
                    $this->session->setFlashMessage('add_message', 'Le commentaire a bien été ajouté');
                    $referer = $_SERVER['HTTP_REFERER'];
                    return header('Location: ' . $referer);
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
    }

    public function editMessage(Parameter $post, $messageId, $episodeId)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Message');
                if (!$errors) {
                    $this->messageDAO->editMessage($post, $messageId, $episodeId, $this->session->get('user_id'));
                    $this->session->setFlashMessage('edit_message', 'Le commentaire a bien été mis à jour');
                    return header('Location: ../public/index.php');
                }
                return $this->view->render('edit_message', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            $message = $this->messageDAO->getMessage($messageId);
            $episode = $this->episodeDAO->getEpisode($message->getIdEpisode());
            $post->set('messageId', $message->getMessageId());
            $post->set('episodeId', $episode->getEpisodeId());
            $post->set('content', $message->getContent());
            $this->view->render('edit_message', [
                'post' => $post,
                'episode' => $episode
            ]);
        }
    }

    public function deleteMessage($messageId)
    {
        if ($this->checkAdmin() || $this->checkLoggedIn()) {
            $this->messageDAO->deleteMessage($messageId);
            $this->session->setFlashMessage('delete_message', 'Le commentaire a bien été supprimé');
            $referer = $_SERVER['HTTP_REFERER'];
            return header('Location: ' . $referer);
        }
    }

    public function profile()
    {
        if ($this->checkLoggedIn()) {
            return $this->view->render('profile');
        }
    }

    public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'User');
                if (!$errors) {
                    $this->userDAO->updatePassword($post, $this->session->get('username'));
                    $this->session->setFlashMessage('update_password', 'Le mot de passe a été mis à jour');
                    return header('Location: ../public/index.php?route=profile');
                }
                $this->session->setFlashMessage('update_password_failed', 'Le mot de passe doit contenir au minimum 8 caractères');
                return $this->view->render('update_password', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('update_password');
        }
    }

    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->logoutOrDelete('logout');
        }
    }
// Suppression d'un compte par un Admin
    public function deleteAccount()
    {
        if ($this->session->get('role') === 'admin') {
            $this->session->setFlashMessage('no_delete_account', 'Vous n\'avez pas le droit de supprimer un compte administrateur.');
            return header('Location: ../public/index.php?route=profile');
        }
        if ($this->checkLoggedIn()) {
            $this->userDAO->deleteAccount($this->session->get('username'));
            $this->logoutOrDelete('delete_account');
        }
    }
// Suppression de son propre compte par un utilisateur
    public function deleteUser($userId)
    {
        if ($this->checkAdmin()) {
            $toDelete = $this->userDAO->getUser($userId);
            if ($toDelete->getRoleName() === 'admin') {
                $this->session->setFlashMessage('delete_user', 'Vous n\'avez pas le droit de supprimer un administrateur.');
                return header('Location: ../public/index.php?route=administration');
            }
            $this->userDAO->deleteUser($userId);
            $this->session->setFlashMessage('delete_user', 'L\'utilisateur a bien été supprimé.');
            header('Location: ../public/index.php?route=administration');
        }
    }
// Déconnexion et/ou suppression de compte
    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if ($param === 'logout') {
            $this->session->setFlashMessage($param, 'Vous êtes maintenant déconnecté');
        } else {
            $this->session->setFlashMessage($param, 'Votre compte a bien été supprimé');
        }
        return header('Location: ../public/index.php');
    }
}
