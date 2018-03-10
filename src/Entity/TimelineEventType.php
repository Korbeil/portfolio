<?php
declare(strict_types=1);

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
    public function getId() : int {
        return $this->id;
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
     * @return string
     */
    public function getBackground() : string {
        return $this->background;
    }

    /**
     * @param string $background
     */
    public function setBackground(string $background) : void {
        $this->background = $background;
    }

    /**
     * @return string
     */
    public function getText() : string {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text) : void {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function __toString() : string {
        return $this->getName(). ' #' .$this->getId();
    }
}
