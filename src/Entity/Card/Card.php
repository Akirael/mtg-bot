<?php

namespace App\Entity\Card;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

/**
 * @ORM\Table(name="card")
 * @ORM\Entity(repositoryClass="App\Repository\Card\CardRepository")
 */
class Card implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="App\Entity\Price\StarCityPrice", mappedBy="card_id",fetch="EAGER")
     * @ORM\OneToOne(targetEntity="App\Entity\Price\TopDeckLastAuctionPrice", mappedBy="card_id", fetch="EAGER")
     * @ORM\OneToOne(targetEntity="App\Entity\Price\TopDeckUserMinPrice", mappedBy="card_id", fetch="EAGER")
     * @ORM\Column(type="integer")
     */
    private int $id;
    /**
     * @ORM\Column(type="string")
     */
    private string $name_ru;
    /**
     * @ORM\Column(type="string")
     */
    private string $name_en;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Set\Set", inversedBy="id", fetch="EAGER")
     * @ORM\Column(type="integer")
     */
    private int $set_id;
    /**
     * @ORM\Column(type="integer")
     */
    private int $rarity;
    /**
     * @ORM\Column(type="integer")
     */
    private int $set_card_id;

    /**
     * @return array
     */
    #[Pure] #[ArrayShape([
        'name_ru' => "string",
        'name_en' => "string",
        'set_id' => "int",
        'rarity' => "int",
        'set_card_id' => "int"
    ])]
    public function jsonSerialize(): array
    {
        return [
            'name_ru' => $this->getNameRu(),
            'name_en' => $this->getNameEn(),
            'set_id' => $this->getSetId(),
            'rarity' => $this->getRarity(),
            'set_card_id' => $this->getSetCardId()
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNameRu(): string
    {
        return $this->name_ru;
    }

    /**
     * @return string
     */
    public function getNameEn(): string
    {
        return $this->name_en;
    }

    /**
     * @return int
     */
    public function getSetId(): int
    {
        return $this->set_id;
    }

    /**
     * @return int
     */
    public function getRarity(): int
    {
        return $this->rarity;
    }

    /**
     * @return int
     */
    public function getSetCardId(): int
    {
        return $this->set_card_id;
    }

    /**
     * @param string $name_ru
     */
    public function setNameRu(string $name_ru): void
    {
        $this->name_ru = $name_ru;
    }

    /**
     * @param string $name_en
     */
    public function setNameEn(string $name_en): void
    {
        $this->name_en = $name_en;
    }

    /**
     * @param int $set_id
     */
    public function setSetId(int $set_id): void
    {
        $this->set_id = $set_id;
    }

    /**
     * @param int $rarity
     */
    public function setRarity(int $rarity): void
    {
        $this->rarity = $rarity;
    }

    /**
     * @param int $set_card_id
     */
    public function setSetCardId(int $set_card_id): void
    {
        $this->set_card_id = $set_card_id;
    }

    /**
     * @param string $lang
     * @return string
     */
    #[Pure] public function getNameByLang(string $lang): string
    {
        return $lang == 'en' ? $this->getNameEn() : $this->getNameRu();
    }


}