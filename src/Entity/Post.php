<?php
declare(strict_types=1);

namespace App\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
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
    private $enabled = false;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    private $type = 'post';

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    private $title = '';

    /**
     * @var string
     * @ORM\Column(type="string", length=256)
     */
    private $subtitle = '';

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $content = '';

    /**
     * @var string
     * @ORM\Column(type="string", length=256)
     */
    private $url = '';

    /**
     * @var PersistentCollection > Tag[]
     * @ORM\ManyToMany(targetEntity="Tag")
     */
    private $tags;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $posted;

    /**
     * @return int
     */
    public function getId() {
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
    public function getType() : string {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type) : void {
        $this->type = $type;
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
    public function getSubtitle() : string {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     */
    public function setSubtitle(string $subtitle) : void {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getContent() : string {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content) : void {
        $this->content = $content;
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
     * @return PersistentCollection > Tag[]
     */
    public function getTags() {
        return $this->tags;
    }

    /**
     * @param Tag $tag
     */
    public function addTag(Tag $tag) : void {
        $this->tags[] = $tag;
    }

    /**
     * @return Carbon
     */
    public function getCreated() : Carbon {
        $created = is_null($this->created) ? new \DateTime() : $this->created;
        return Carbon::createFromTimestamp($created->getTimestamp());
    }

    /**
     * @param Carbon $datetime
     */
    public function setCreated(Carbon $datetime) : void {
        $this->created = $datetime;
    }

    /**
     * @return Carbon
     */
    public function getUpdated() : Carbon {
        $updated = is_null($this->updated) ? new \DateTime() : $this->updated;
        return Carbon::createFromTimestamp($updated->getTimestamp());
    }

    /**
     * @param Carbon $datetime
     */
    public function setUpdated(Carbon $datetime) : void {
        $this->updated = $datetime;
    }

    /**
     * @return Carbon
     */
    public function getPosted() : Carbon {
        $posted = is_null($this->posted) ? new \DateTime() : $this->posted;
        return Carbon::createFromTimestamp($posted->getTimestamp());
    }

    /**
     * @param Carbon $datetime
     */
    public function setPosted(Carbon $datetime) : void {
        $this->posted = $datetime;
    }

}
