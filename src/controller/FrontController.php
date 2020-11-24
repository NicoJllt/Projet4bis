<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{

    public function home(int $page, int $limit)
    {
        $total = $this->episodeDAO->count();
        $pages = ceil($total / $limit);
        $range = range(
            max(1, $page - 3),
            min($pages, $page + 3)
        );
        $episodes = $this->episodeDAO->getEpisodes($page, $limit, true);
        $this->view->render('home', [
            'episodes' => $episodes,
            'pages' => $pages,
            'page' => $page,
            'range' => $range,
            'limit' => $limit,
            'pagination' => true
        ]);
    }

    public function lastEpisodes(int $limit)
    {
        $episodes = $this->episodeDAO->getEpisodes(1, $limit, false);
        $this->view->render('home', [
            'episodes' => $episodes,
            'pagination' => false
        ]);
    }

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
        $this->session->setFlashMessage('flag_comment', 'Le commentaire a bien été signalé');
        $referer = $_SERVER['HTTP_REFERER'];
        return header('Location: ' . $referer);
    }

    public function register(Parameter $post)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if ($this->userDAO->checkUser($post)) {
                $errors['username'] = $this->userDAO->checkUser($post);
            }
            if ($this->userDAO->checkMail($post)) {
                $errors['mail'] = $this->userDAO->checkMail($post);
            }
            if (!$errors) {
                $this->userDAO->register($post);
                $this->session->setFlashMessage('register', 'Votre inscription a bien été effectuée');
                return header('Location: ../public/index.php');
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
                $this->session->setFlashMessage('login', 'Vous êtes maintenant connecté');
                $this->session->set('user_id', $result['result']['userId']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('username', $post->get('username'));
                return header('Location: ../public/index.php');
            } else {
                $this->session->setFlashMessage('error_login', 'Le nom d\'utilisateur ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post' => $post
                ]);
            }
        }
        return $this->view->render('login');
    }
}
