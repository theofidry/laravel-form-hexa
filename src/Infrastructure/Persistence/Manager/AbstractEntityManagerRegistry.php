<?php

namespace App\Infrastructure\Persistence\Manager;

use App\Domain\Persistence\ManagerInterface;
use App\Infrastructure\Exception\Persistence\UnexpectedCallException;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
abstract class AbstractEntityManager implements ManagerInterface
{
    public function flush() {
        throw new UnexpectedCallException();
    }

    /**
     * @param string $entityClassName FQCN
     *
     * @return bool
     */
    abstract public function supports($entityClassName);
}
