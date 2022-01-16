<?php

namespace App\Presenter;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Card\Card;
use App\Repository\Card\CardRepository;
use App\Component\Check\CheckLanguage;
use DateTime;

/**
 * Класс собирающий данные о стоимости карты и предоставляющий их отображение.
 */
class CardPricePresenter
{
    protected ManagerRegistry $doctrine;
    protected CardRepository $repository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->repository = $doctrine->getRepository(Card::class);
    }

    /**
     * @param string $cardName
     * @param object $platform
     * @return array
     */
    public function getPriceByPlatform(string $cardName, object $platform): array
    {
        $lang = (new CheckLanguage())->check($cardName);
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
}
