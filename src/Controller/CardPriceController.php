<?php

namespace App\Controller;

use App\Entity\CardPrice\StarCityPrice;
use App\Entity\CardPrice\TopDeckLastAuctionPrice;
use App\Entity\CardPrice\TopDeckUserMinPrice;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Presenter\CardPricePresenter;

/**
 * Class CardPriceController
 * @package App\Controller
 * @Route("/api", name="card-price")
 */
class CardPriceController extends AbstractController
{
    protected CardPricePresenter $presenter;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->presenter = new CardPricePresenter($doctrine);
    }

    /**
     * @param string $cardName
     * @return JsonResponse
     * @Route("/card-price-starcity/{cardName}", name="card-price-starcity", methods={"GET"})
     */
    public function getStarcityPrice(string $cardName): JsonResponse
    {
        $data = $this->presenter->getPriceByPlatform($cardName, new StarCityPrice());
        return $this->json($data);
    }

    /**
     * @param string $cardName
     * @return JsonResponse
     * @Route("/card-price-td-auction/{cardName}", name="card-price-td-auction", methods={"GET"})
     */
    public function getTopDeckLastAuctionPrice(string $cardName): JsonResponse
    {
        $data = $this->presenter->getPriceByPlatform($cardName, new TopDeckLastAuctionPrice());
        return $this->json($data);
    }

    /**
     * @param string $cardName
     * @return JsonResponse
     * @Route("/card-price-td-user-min/{cardName}", name="card-price-td-user-min", methods={"GET"})
     */
    public function getTopDeckUserMinPrice(string $cardName): JsonResponse
    {
        $data = $this->presenter->getPriceByPlatform($cardName, new TopDeckUserMinPrice());
        return $this->json($data);
    }

}