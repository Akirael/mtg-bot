<?php

namespace App\Presenter;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Card\Card;
use App\Repository\Card\CardRepository;
use DateTime;

class CardPricePresenter
{
    protected ManagerRegistry $doctrine;
    protected CardRepository $repository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->repository = $doctrine->getRepository(Card::class);
    }

    public function getPriceByPlatform(string $cardName, object $platform): array
    {
        $lang = $this->checkLanguageName($cardName);
        $data = $this->repository->getPriceByPlatform($cardName, $platform, $lang);
        $result = [];
        foreach ($data as $row) {
            if (is_a($row, Card::class)) {
                $id = $row->getId();
                if (!isset($result[$id])) {
                    $result[$id] = [];
                }
                $result[$id]['name'] = $row->getNameByLang($lang);
            } else {
                $id = $row->getCardId();
                if (!isset($result[$id])) {
                    $result[$id] = [];
                }
                $result[$id]['price'] = $row->getPrice();
                $result[$id]['price_foil'] = $row->getPriceFoil();
                $result[$id]['date'] = (new DateTime())->setTimestamp($row->getTsUpdate())->format('Y-m-d');
            }
        }

        return $result;
    }

    private function checkLanguageName(string $name): string
    {
        return preg_match('/[a-zA-Z \,\.]/', $name) ? 'en' : 'ru';
    }
}
