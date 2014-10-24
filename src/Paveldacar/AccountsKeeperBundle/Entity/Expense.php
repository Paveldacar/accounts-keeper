<?php

namespace Paveldacar\AccountsKeeperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expense
 *
 * @ORM\Table("expense")
 * @ORM\Entity(repositoryClass="Paveldacar\AccountsKeeperBundle\Entity\ExpenseRepository")
 */
class Expense
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="spent_at", type="date")
     */
    private $spentAt;

    /**
     * @var float
     *
     * @ORM\Column(name="cost", type="float")
     */
    private $cost;

    /**
     * @var string
     *
     * @ORM\Column(name="item", type="string", length=255)
     */
    private $item;


    public function __construct()
    {
        $this->setSpentAt(new \DateTime());
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set spentAt
     *
     * @param \DateTime $spentAt
     * @return Expense
     */
    public function setSpentAt($spentAt)
    {
        $this->spentAt = $spentAt;

        return $this;
    }

    /**
     * Get spentAt
     *
     * @return \DateTime 
     */
    public function getSpentAt()
    {
        return $this->spentAt;
    }

    /**
     * Set cost
     *
     * @param float $cost
     * @return Expense
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set item
     *
     * @param string $item
     * @return Expense
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return string 
     */
    public function getItem()
    {
        return $this->item;
    }
}
