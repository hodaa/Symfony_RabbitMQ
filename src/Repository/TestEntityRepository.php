<?php

namespace App\Repository;

use App\Entity\TestEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class TestEntityRepository extends ServiceEntityRepository
{
    /**
     * TestEntityRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TestEntity::class);
    }

    public function storeData()
    {
        for ($i = 0; $i < 100; ++$i) {
            $entity = new TestEntity();
            $entity->setName('Entity '.$i);
            $entity->setAge(mt_rand(10, 100));
            $entity->setAddress("Egypt-cairo".mt_rand(5, 5));
            $entity->setEmail('hoda'.$i.'@gmail.com');
            $this->_em->persist($entity);
            $this->_em->flush();
        }
    }

    /**
     * @return array
     */
    public function getObject() :array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getEntityName(),
        ];
    }

    /**
     * list all Entites
     * @return array
     */
    public function readData() :array
    {
        $data = [];
        $items = $this->findAll();
        foreach ($items as $item) {
            $data[] = [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'address' => $item->getAddress(),
                'age' => $item->getAddress(),
                'email' => $item->getEmail(),
            ];
        }

        return $data;
    }
}
