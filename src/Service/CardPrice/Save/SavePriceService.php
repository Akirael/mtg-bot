<?php

namespace App\Service\CardPrice\Save;

use Doctrine\Persistence\ManagerRegistry;

class SavePriceService
{
    public string $type;
    protected ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine, string $type)
    {
        $this->type = $type;
        $this->doctrine = $doctrine;
    }

    private function create(array $priceInfo)
    {
        $price = new $this->type($priceInfo);
        $this->doctrine->persist($price);
    }

    private function update(object $price, array $priceInfo) {
        $price->update($priceInfo);
        $this->doctrine->persist($price);
    }

    public function save(array $data)
    {
        foreach ($data as $priceInfo) {
            $price = $this->doctrine
                ->getRepository($this->type)
                ->findOneBy([
                    'card_id' => $data['card_id']
                ]);
            if (is_null($price)) {
                $this->create($priceInfo);
            } else {
                $this->update($price, $priceInfo);
            }
        }
        $this->doctrine->flush();
    }
}