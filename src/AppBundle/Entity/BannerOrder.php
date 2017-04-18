<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 12:14
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BannerOrderRepository")
 * @ORM\Table(name="banner_order")
 */
class BannerOrder
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Banner", mappedBy="bannerOrders")

     */
    private $orderVal;

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
     * Set order
     *
     * @param integer $order
     *
     * @return BannerOrder
     */
    public function setOrderVal($orderVal)
    {
        $this->orderVal = $orderVal;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer
     */
    public function getOrderVal()
    {
        return $this->orderVal;
    }
}
