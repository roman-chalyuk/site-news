<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 12:13
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BannerRepository")
 * @ORM\Table(name="banner")
 */
class Banner
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var SitePage
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\SitePage")
     * @ORM\JoinTable(name="banner_sitepage")
     */
    private $pages;

    /**
     * @var Domain
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Domain")
     * @ORM\JoinTable(name="banner_domain")
     */
    private $domains;

    /**
     * @var Language
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Language")
     * @ORM\JoinTable(name="banner_language")
     */
    private $languages;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $code;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $startDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $active;

    /**
     * @ORM\Column(type="boolean")
     */
    private $useDates;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BannerPlace", inversedBy="name")
     * @ORM\JoinColumn(name="bannerPlaces", referencedColumnName="id")
     */
    private $bannerPlaces;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BannerOrder", inversedBy="orderVal")
     * @ORM\JoinColumn(name="bannerOrders", referencedColumnName="id")
     */
    private $bannerOrders;


    public function __construct()
    {
//        $this->bannerPlaces = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Banner
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Banner
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Banner
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Banner
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Banner
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set useDates
     *
     * @param boolean $useDates
     *
     * @return Banner
     */
    public function setUseDates($useDates)
    {
        $this->useDates = $useDates;

        return $this;
    }

    /**
     * Get useDates
     *
     * @return boolean
     */
    public function getUseDates()
    {
        return $this->useDates;
    }

    /**
     * Add page
     *
     * @param \AppBundle\Entity\SitePage $page
     *
     * @return Banner
     */
    public function addPage(\AppBundle\Entity\SitePage $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \AppBundle\Entity\SitePages $page
     */
    public function removePage(\AppBundle\Entity\SitePage $page)
    {
        $this->pages->removeElement($page);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Add domain
     *
     * @param \AppBundle\Entity\Domain $domain
     *
     * @return Banner
     */
    public function addDomain(\AppBundle\Entity\Domain $domain)
    {
        $this->domains[] = $domain;

        return $this;
    }

    /**
     * Remove domain
     *
     * @param \AppBundle\Entity\Domain $domain
     */
    public function removeDomain(\AppBundle\Entity\Domain $domain)
    {
        $this->domains->removeElement($domain);
    }

    /**
     * Get domains
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDomains()
    {
        return $this->domains;
    }

    /**
     * Add language
     *
     * @param \AppBundle\Entity\Language $language
     *
     * @return Banner
     */
    public function addLanguage(\AppBundle\Entity\Language $language)
    {
        $this->languages[] = $language;

        return $this;
    }

    /**
     * Remove language
     *
     * @param \AppBundle\Entity\Language $language
     */
    public function removeLanguage(\AppBundle\Entity\Language $language)
    {
        $this->languages->removeElement($language);
    }

    /**
     * Get languages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set bannerPlaces
     *
     * @param \AppBundle\Entity\BannerPlace $bannerPlaces
     *
     * @return Banner
     */
    public function setBannerPlaces(\AppBundle\Entity\BannerPlace $bannerPlaces = null)
    {
        $this->bannerPlaces = $bannerPlaces;

        return $this;
    }

    /**
     * Remove bannerPlace
     *
     * @param \AppBundle\Entity\BannerPlace $bannerPlace
     */
    public function removeBannerPlaces(\AppBundle\Entity\BannerPlace $bannerPlace)
    {
        $this->bannerPlaces->removeElement($bannerPlace);
    }

    /**
     * Get bannerPlaces
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBannerPlaces()
    {
        return $this->bannerPlaces;
    }

    /**
     * Set bannerOrders
     *
     * @param \AppBundle\Entity\BannerOrder $bannerOrders
     *
     * @return Banner
     */
    public function setBannerOrders(\AppBundle\Entity\BannerOrder $bannerOrders = null)
    {
        $this->bannerOrders = $bannerOrders;

        return $this;
    }

    /**
     * Remove bannerOrder
     *
     * @param \AppBundle\Entity\BannerOrder $bannerOrder
     */
    public function removeBannerOrders(\AppBundle\Entity\BannerOrder $bannerOrder)
    {
        $this->bannerOrders->removeElement($bannerOrder);
    }

    /**
     * Get bannerOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBannerOrders()
    {
        return $this->bannerOrders;
    }
}
