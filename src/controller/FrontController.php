<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{

    public function home(int $nb, bool $asc)
    {
        $episodes = $this->episodeDAO->getEpisodes($nb, $asc);
        return $this->view->render('home', [
            'episodes' => $episodes
        ]);
    }

    // public function lastEpisodes(int $nb, bool $asc)
    // {
    //     $episodes = $this->episodeDAO->getEpisodes($nb, $asc);
    //     return $this->view->render('last_episodes', [
    //         'episodes' => $episodes
    //     ]);
    // }

    public function synopsis()
    {
        return $this->view->render('synopsis');
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

    public function flagComment($messageId)
    {
        $this->messageDAO->flagComment($messageId);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé.');
        $referer = $_SERVER['HTTP_REFERER'];
        header('Location: ' . $referer);
    }

    public function register(Parameter $post)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if ($this->userDAO->checkUser($post)) {
                $errors['username'] = $this->userDAO->checkUser($post);
            }
            if (!$errors) {
                $this->userDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée.');
                header('Location: ../public/index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }

    public function login(Parameter $post)
    {
        if ($post->get('submit')) {
            $result = $this->userDAO->login($post);
            if ($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Vous êtes maintenant connecté.');
                $this->session->set('user_id', $result['result']['userId']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('username', $post->get('username'));
                header('Location: ../public/index.php');
            } else {
                $this->session->set('error_login', 'Le nom d\'utilisateur ou le mot de passe sont incorrects.');
                return $this->view->render('login', [
                    'post' => $post
                ]);
            }
        }
        return $this->view->render('login');
    }
}
