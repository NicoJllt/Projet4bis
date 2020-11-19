<?php

namespace App\config;

// Gestion du contenu en mémoire de la session
class Session
{
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function setFlashMessage($name, $value)
    {
        $this->set($name, $value);
        $this->set('flashMessage', true);
    }

    public function get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    public function show($name)
    {
        if (isset($_SESSION[$name])) {
            $key = $this->get($name);
            $this->remove($name);
            $this->remove('flashMessage');
            return $key;
        }
    }

    public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    public function start()
    {
        session_start();
    }

    public function stop()
    {
        session_destroy();
    }
}
