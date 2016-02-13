<?php

namespace App\Infrastructure\Persistence\Manager;

use App\Domain\Entity\Entity;
use App\Domain\Exception\Persistence\Exception;
use App\Domain\Persistence\ManagerInterface;
use App\Infrastructure\Exception\Persistence\ManagerNotFoundException;
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Infrastructure\Persistence\Manager\PersistStack;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
class IlluminateManager implements ManagerInterface
{
    /**
     * @var Connection
     */
    private $databaseManager;

    /**
     * @var AbstractEntityManager[]|array
     */
    private $managers;

    /**
     * @var PersistStack
     */
    private $persistStack;

    /**
     * @param DatabaseManager         $databaseManager
     * @param AbstractEntityManager[] $managers
     */
    public function __construct(DatabaseManager $databaseManager, array $managers)
    {
        $this->databaseManager = $databaseManager;
        $this->managers = $managers;
        $this->persistStack = new PersistStack();
    }

    /**
     * {@inheritdoc}
     */
    public function persist(Entity $entity)
    {
        $this->persistStack->add($entity);
    }

    /**
     * {@inheritdoc}
     */
    public function flush()
    {
        $this->databaseManager->beginTransaction();

        try {
            foreach ($this->persistStack as $entity) {
                $manager = $this->getManagerForEntity($entity);
                $manager->persist($entity);
            }

            $this->databaseManager->commit();
            $this->persistStack->reset();
        } catch (\Exception $exception) {
            $this->databaseManager->rollback();

            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    /**
     * @param $entity
     *
     * @return AbstractEntityManager
     * @throws ManagerNotFoundException
     */
    private function getManagerForEntity($entity)
    {
        $entityClassName = get_class($entity);

        foreach ($this->managers as $manager) {
            if ($manager->supports($entityClassName)) {
                return $manager;
            }
        }

        throw new ManagerNotFoundException(sprintf('Manager not found for entity "%s"', $entityClassName));
    }
}
