<?php

namespace App\src\controller;

class BackController extends Controller
{

    public function addEpisode($post)
    {
        if(isset($post['submit'])) {
            $this->episodeDAO->addEpisode($post);
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_episode', [
            'post' => $post
        ]);
    }
}