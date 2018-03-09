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
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $date_start;

    /**
     * @var integer
     * @ORM\Column(type="integer")
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
    public function getId() {
        return $this->id;
    }

    /**
     * @return TimelineEventType
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param TimelineEventType $eventType
     */
    public function setType(TimelineEventType $eventType) {
        $this->type = $eventType;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * @return integer
     */
    public function getDateStart() {
        return $this->date_start;
    }

    /**
     * @return Carbon
     */
    public function getFormattedDateStart() {
        return Carbon::createFromTimestamp($this->date_start);
    }

    /**
     * @param int $time
     */
    public function setDateStart(int $time) {
        $this->date_start = $time;
    }

    /**
     * @return integer
     */
    public function getDateStop() {
        return $this->date_stop;
    }

    /**
     * @return Carbon
     */
    public function getFormattedDateStop() {
        return Carbon::createFromTimestamp($this->date_stop);
    }

    /**
     * @param int $time
     */
    public function setDateStop(int $time) {
        $this->date_stop = $time;
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
}
