<?php

namespace App\Service;

use App\Http\Requests\Request;
use App\Repository\TestEntityRepository;
use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;

class DemoService
{
    private $entityRepository;

    /**
     * DemoService constructor.
     *
     * @param TestEntityRepository $entityRepository
     * @param ProducerInterface    $producer
     */
    public function __construct(TestEntityRepository $entityRepository, ProducerInterface $producer)
    {
        $this->entityRepository = $entityRepository;
        $this->producer = $producer;
    }

    /**
     *  Call inset Entities method from repository
     */
    public function insertObjects()
    {
        return $this->entityRepository->storeData();
    }

    /**
     * @return \App\Entity\TestEntity[]
     */
    public function readObjects()
    {
        return $this->entityRepository->readData();
    }

    /**
     * push object to rabbitMq
     * @return mixed
     */
    public function produceObjects($id)
    {

        $entity = $this->entityRepository->findOneBy(['id' => $id]);
        $message = [
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'Email' => $entity->getName(),
        ];

        return $this->producer->publish(json_encode($message));
    }
}
