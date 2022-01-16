<?php
namespace App\Entity\CardPrice;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TopDeckLastAuctionPriceRepository")
 * @ORM\Table(name="top_deck_last_auction_price")
 */
class TopDeckLastAuctionPrice extends Price
{

}