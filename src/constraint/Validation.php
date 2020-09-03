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
        }
    }
}
