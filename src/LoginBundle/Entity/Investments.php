<?php

namespace LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Investments
 *
 * @ORM\Table(name="investments")
 * @ORM\Entity
 */
class Investments
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
     * @var integer
     *
     * @ORM\Column(name="loand_id", type="integer", nullable=false)
     */
    private $loandId;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=10, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;



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
     * Set loandId
     *
     * @param integer $loandId
     * @return Investments
     */
    public function setLoandId($loandId)
    {
        $this->loandId = $loandId;

        return $this;
    }

    /**
     * Get loandId
     *
     * @return integer 
     */
    public function getLoandId()
    {
        return $this->loandId;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Investments
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
     * Set userId
     *
     * @param integer $userId
     * @return Investments
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
