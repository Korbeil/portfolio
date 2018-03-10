<?php

namespace App\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TimelineEventRepository")
 */
class TimelineEvent
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
     * @var TimelineEventType
     * @ORM\ManyToOne(targetEntity="App\Entity\TimelineEventType")
     * @ORM\JoinColumn(nullable=true)
     */
    private $type;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $date_start;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $date_stop;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @return int
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
     * @return TimelineEventType
     */
    public function getType() : TimelineEventType {
        return $this->type;
    }

    /**
     * @param TimelineEventType $eventType
     */
    public function setType(TimelineEventType $eventType) : void {
        $this->type = $eventType;
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) : void {
        $this->name = $name;
    }

    /**
     * @return Carbon
     */
    public function getDateStart() : Carbon {
        return Carbon::createFromTimestamp($this->date_start->getTimestamp());

    }

    /**
     * @param Carbon $datetime
     */
    public function setDateStart(Carbon $datetime) : void {
        $this->date_start = $datetime;
    }

    /**
     * @return Carbon
     */
    public function getDateStop() : Carbon {
        return Carbon::createFromTimestamp($this->date_stop->getTimestamp());
    }

    /**
     * @param Carbon $datetime
     */
    public function setDateStop(Carbon $datetime) : void {
        $this->date_stop = $datetime;
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
}
