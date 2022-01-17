<?php

namespace App\Entity\CardPrice;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
abstract class Price
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private int $id;
    /**
     * @ORM\Column(type="integer")
     */
    private int $ts_update;
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Card\Card", inversedBy="id")
     * @ORM\Column(type="integer")
     */
    private int $card_id;
    /**
     * @ORM\Column(type="integer")
     */
    private int $price;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTsUpdate(): int
    {
        return $this->ts_update;
    }

    /**
     * @param int $ts_update
     */
    public function setTsUpdate(int $ts_update): void
    {
        $this->ts_update = $ts_update;
    }

    /**
     * @return int
     */
    public function getCardId(): int
    {
        return $this->card_id;
    }

    /**
     * @param int $card_id
     */
    public function setCardId(int $card_id): void
    {
        $this->card_id = $card_id;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPriceFoil(): int
    {
        return $this->price_foil;
    }

    /**
     * @param int $price_foil
     */
    public function setPriceFoil(int $price_foil): void
    {
        $this->price_foil = $price_foil;
    }

    /**
     * @ORM\Column(type="integer")
     */
    private int $price_foil;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->update($data);
    }

    /**
     * @param array $data
     * @return void
     */
    public function update(array $data)
    {
        $this->setTsUpdate(time());
        $this->setCardId($data['card_id']);
        $this->setPrice($data['price']);
        $this->setPriceFoil($data['price_foil']);
    }
}