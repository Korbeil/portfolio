<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TimelineEventTypeRepository")
 */
class TimelineEventType
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    private $background;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    private $text;

    /**
     * @return integer
     */
    public function getId() {
        return $this->id;
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
     * @return string
     */
    public function getBackground() {
        return $this->background;
    }

    /**
     * @param string $background
     */
    public function setBackground(string $background) {
        $this->background = $background;
    }

    /**
     * @return string
     */
    public function getText() {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text) {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->getName(). ' #' .$this->getId();
    }
}
