<?php
namespace App\Entity\CardPrice;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StarCityPriceRepository")
 * @ORM\Table(name="star_city_price")
 */
class StarCityPrice extends Price
{
    /**
     * @ORM\Column(type="string")
     */
    private string $url;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}