<?php

namespace App\Domain\Persistence;

use App\Domain\Entity\Entity;
use App\Domain\Exception\Persistence\CouldNotPersistException;
use App\Domain\Exception\Persistence\Exception;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
interface ManagerInterface
{
    /**
     * @param Entity $entity
     *
     * @throws CouldNotPersistException
     */
    public function persist(Entity $entity);

    /**
     * @throws Exception
     */
    public function flush();
}
