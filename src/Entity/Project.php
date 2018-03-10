<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

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
     * @var PersistentCollection > Tag[]
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
    public function getId() : int {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isEnabled() : bool {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled) : void {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getTitle() : string {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title) : void {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUrl() : string {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url) : void {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getDescription() : string {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description) : void {
        $this->description = $description;
    }

    /**
     * @return PersistentCollection > Tag[]
     */
    public function getTags() : PersistentCollection {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     */
    public function addTag(Tag $tag) : void {
        $this->tags[] = $tag;
    }
}
