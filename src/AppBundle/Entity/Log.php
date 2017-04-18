<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 12:40
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LogRepository")
 * @ORM\Table(name="log")
 */
class Log
{
    const CHANNEL_NEWS = 'news';
    const CHANNEL_BANNERS = 'banners';
    const CHANNEL_INFO = 'INFO';

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $channel;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $datetime;

    public static function getChannelsList()
    {
        return [
            'Info log' => self::CHANNEL_INFO,
            'News page' => self::CHANNEL_NEWS,
            'Banners' => self::CHANNEL_BANNERS,
        ];
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
     * Set message
     *
     * @param string $message
     *
     * @return Log
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set channel
     *
     * @param string $channel
     *
     * @return Log
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Log
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }
}
