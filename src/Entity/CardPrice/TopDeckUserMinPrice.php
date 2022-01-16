<?php
namespace App\Entity\CardPrice;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TopDeckUserMinPriceRepository")
 * @ORM\Table(name="top_deck_user_min_price")
 */
class TopDeckUserMinPrice extends Price
{

}