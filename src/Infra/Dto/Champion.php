<?php


namespace App\Infra\Dto;


class Champion
{
    private $version;
    private $id;
    private $key;
    private $name;
    private $title;
    private $blurb;
    private $info;
    private $image;
    private $tags;
    private $partype;
    private $stats;

    /**
     * Champion constructor.
     * @param $version
     * @param $id
     * @param $key
     * @param $name
     * @param $title
     * @param $blurb
     * @param $info
     * @param $image
     * @param $tags
     * @param $partype
     * @param $stats
     */
    public function __construct($version, $id, $key, $name, $title, $blurb, $info, $image, $tags, $partype, $stats)
    {
        $this->version = $version;
        $this->id = $id;
        $this->key = $key;
        $this->name = $name;
        $this->title = $title;
        $this->blurb = $blurb;
        $this->info = $info;
        $this->image = $image;
        $this->tags = $tags;
        $this->partype = $partype;
        $this->stats = $stats;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getBlurb()
    {
        return $this->blurb;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return mixed
     */
    public function getPartype()
    {
        return $this->partype;
    }

    /**
     * @return mixed
     */
    public function getStats()
    {
        return $this->stats;
    }



}