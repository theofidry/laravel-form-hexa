<?php

namespace App\Domain\Persistence;

use App\Domain\Entity\Entity;
use App\Domain\Exception\Persistence\EntityNotFoundException;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
interface RepositoryInterface
{
    /**
     * @param string|int $id
     *
     * @return Entity
     * @throws EntityNotFoundException
     */
    public function find($id);
}
