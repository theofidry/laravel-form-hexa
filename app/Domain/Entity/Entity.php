<?php

namespace App\Domain\Entity;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
interface Entity
{
    /**
     * @return string|int
     */
    public function getId();
}
