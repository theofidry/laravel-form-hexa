<?php

namespace App\Infrastructure\Persistence\Manager\Illuminate;

use App\Domain\Entity\Customer;
use App\Infrastructure\Persistence\Manager\AbstractEntityManager;
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
final class CustomerManagerAbstract extends AbstractEntityManager
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
     * @param Customer $entity
     */
    public function persist($entity)
    {
        $this->manager->table('customers')->insert([
            'id' => $entity->getId(),
            'email' => $entity->getEmail(),
            'name' => $entity->getName(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($entityClassName)
    {
        return Customer::class === get_class($entityClassName);
    }
}
