<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 12:05
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RedirectRepository")
 * @ORM\Table(name="redirect")
 */
class Redirect
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sourceUri;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destinationUri;

    /**
     * @ORM\Column(type="integer")
     */
    private $statusCode;

    public function __construct()
    {
        $this->statusCode = 301;
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
     * Set sourceUri
     *
     * @param string $sourceUri
     *
     * @return Redirect
     */
    public function setSourceUri($sourceUri)
    {
        $this->sourceUri = $sourceUri;

        return $this;
    }

    /**
     * Get sourceUri
     *
     * @return string
     */
    public function getSourceUri()
    {
        return $this->sourceUri;
    }

    /**
     * Set destinationUri
     *
     * @param string $destinationUri
     *
     * @return Redirect
     */
    public function setDestinationUri($destinationUri)
    {
        $this->destinationUri = $destinationUri;

        return $this;
    }

    /**
     * Get destinationUri
     *
     * @return string
     */
    public function getDestinationUri()
    {
        return $this->destinationUri;
    }

    /**
     * Set statusCode
     *
     * @param integer $statusCode
     *
     * @return Redirect
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * Get statusCode
     *
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
