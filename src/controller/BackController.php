<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{

    public function addEpisode(Parameter $post)
    {
        if($post->get('submit')) {
            $this->episodeDAO->addEpisode($post);
            header('Location: ../public/index.php');
        }
        return $this->view->render('add_episode', [
            'post' => $post
        ]);
    }
}