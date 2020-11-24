<?php

namespace App\src\model;

// Eléments qui se chargent des échanges avec la base de données
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
     * @var \DateTime
     */
    private $dateEpisode;

    /**
     * @var int
     */
    private $idAuthor;

    /**
     * @return int
     */
    public function getEpisodeId()
    {
        return $this->episodeId;
    }

    /**
     * @param int $episodeId
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

    /**
     * @return \DateTime
     */
    public function getDateEpisode()
    {
        return $this->dateEpisode;
    }

    /**
     * @param \DateTime $dateEpisode
     */
    public function setDateEpisode($dateEpisode)
    {
        $this->dateEpisode = $dateEpisode;
    }

    /**
     * @return int
     */
    public function getIdAuthor()
    {
        return $this->idAuthor;
    }

    /**
     * @param int $idAuthor
     */
    public function setIdAuthor($idAuthor)
    {
        $this->idAuthor = $idAuthor;
    }
}
