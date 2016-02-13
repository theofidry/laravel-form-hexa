<?php

namespace App\Infrastructure\Persistence\Repository\Illuminate;

use App\Domain\Persistence\Repository\CustomerRepositoryInterface;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @param string|int $id
     *
     * @return object|null
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }
}
