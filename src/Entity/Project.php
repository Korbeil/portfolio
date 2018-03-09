<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string", length=256)
     */
    private $url;

    /**
     * @var Tag[]
     * @ORM\ManyToMany(targetEntity="Tag")
     */
    private $tags;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isEnabled() {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled) {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title) {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url) {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * @return Tag[]
     */
    public function getTags() {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     */
    public function addTag(Tag $tag) {
        $this->tags[] = $tag;
    }
}
