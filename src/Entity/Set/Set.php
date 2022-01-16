<?php
namespace App\Entity\Set;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SetRepository")
 * @ORM\Table(name="set")
 */
class Set
{
    /**
     * @ORM\Id
     * @ORM\OneToMany(targetEntity="App\Entity\Card\Card", mappedBy="set_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private int $id;
    /**
     * @ORM\Column(type="string")
     */
    private string $name;
    /**
     * @ORM\Column(type="string")
     */
    private string $full_name;
    /**
     * @ORM\Column(type="boolean")
     */
    private bool $in_standart;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->full_name;
    }

    /**
     * @param string $full_name
     */
    public function setFullName(string $full_name): void
    {
        $this->full_name = $full_name;
    }

    /**
     * @return bool
     */
    public function isInStandart(): bool
    {
        return $this->in_standart;
    }

    /**
     * @param bool $in_standart
     */
    public function setInStandart(bool $in_standart): void
    {
        $this->in_standart = $in_standart;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


}