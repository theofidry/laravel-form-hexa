<?php

namespace App\Domain\Entity;

/**
 * @author Théo FIDRY <theo.fidry@gmail.com>
 */
class Appointment implements Entity
{
    /**
     * @var string UUID
     */
    private $id;

    /**
     * @var \DateTimeInterface
     */
    private $datetime;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @param string            $id
     * @param \DateTimeInterface $datetime
     * @param Customer          $customer
     */
    public function __construct($id, \DateTimeInterface $datetime, Customer $customer)
    {
        $this->id = $id;
        $this->datetime = $datetime;
        $this->customer = $customer;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDatetime()
    {
        return clone $this->datetime;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return clone $this->customer;
    }
}
