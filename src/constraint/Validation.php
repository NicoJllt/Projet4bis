<?php

namespace App\src\constraint;

class Validation
{
    public function validate($data, $name)
    {
        if ($name === 'Episode') {
            $episodeValidation = new EpisodeValidation();
            $errors = $episodeValidation->check($data);
            return $errors;
        } elseif ($name === 'Message') {
            $messageValidation = new MessageValidation();
            $errors = $messageValidation->check($data);
            return $errors;
        } elseif ($name === 'User') {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }
    }
}
