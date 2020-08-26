<?php

namespace App\src\model;

class Episode
{
    /**
     * @var int
     */
    private $episodeId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @return int
     */
    public function getEpisodeId()
    {
        return $this->episodeId;
    }

    /**
     * @param int $id
     */
    public function setEpisodeId($episodeId)
    {
        $this->episodeId = $episodeId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
