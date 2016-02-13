<?php

namespace Infrastructure\Persistence\Manager;

use App\Domain\Entity\Entity;
use Traversable;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
final class PersistStack implements \Traversable, \IteratorAggregate
{
    private $stack = [];

    public function add(Entity $entity)
    {
        $this->stack[$this->getEntityKey($entity)] = $entity;
    }

    public function reset()
    {
        $this->stack = [];
    }

    /**
     * @param Entity $entity
     *
     * @return string
     */
    private function getEntityKey(Entity $entity)
    {
        return sprintf('%s#%s', get_class($entity), $entity->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return $this->stack;
    }
}
