<?php

namespace App\Infrastructure\Persistence\Manager\Illuminate;

use App\Domain\Entity\Appointment;
use App\Infrastructure\Persistence\Manager\AbstractEntityManager;
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
final class AppointmentManagerAbstract extends AbstractEntityManager
{
    /**
     * @var Connection
     */
    private $manager;

    public function __construct(DatabaseManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param Appointment $entity
     */
    public function persist($entity)
    {
        $this->manager->table('appointments')->insert([
            'id' => $entity->getId(),
            'datetime' => $entity->getDatetime(),
            'customer_id' => $entity->getCustomer()->getId(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($entityClassName)
    {
        return Appointment::class === $entityClassName;
    }
}
