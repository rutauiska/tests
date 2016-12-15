<?php

namespace LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loads
 *
 * @ORM\Table(name="loads")
 * @ORM\Entity
 */
class Loads
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="availableForInvestments", type="float", precision=10, scale=0, nullable=false)
     */
    private $availableforinvestments;



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
     * Set amount
     *
     * @param float $amount
     * @return Loads
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set availableforinvestments
     *
     * @param float $availableforinvestments
     * @return Loads
     */
    public function setAvailableforinvestments($availableforinvestments)
    {
        $this->availableforinvestments = $availableforinvestments;

        return $this;
    }

    /**
     * Get availableforinvestments
     *
     * @return float 
     */
    public function getAvailableforinvestments()
    {
        return $this->availableforinvestments;
    }
}
