<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 12:13
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

///**
// * @ORM\Entity(repositoryClass="AppBundle\Repository\BannerRepository")
// * @ORM\Table(name="banner")
// */
class Banner
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var SitePages
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\SitePages", mappedBy="name", cascade={"all"})
     */
    private $pages;

    /**
     * @var Domain
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Domain", mappedBy="name", cascade={"all"})
     */
    private $domains;

    /**
     * @var Language
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Language", mappedBy="name", cascade={"all"})
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
     * @var BannerPlace
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BannerPlace", mappedBy="name", cascade={"all"})
     */
    private $bannerPlaces;

    /**
     * @var BannerOrder
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BannerOrder", mappedBy="order", cascade={"all"})
     */
    private $bannerOrders;


    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->domains = new \Doctrine\Common\Collections\ArrayCollection();
        $this->languages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->bannerPlaces = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \AppBundle\Entity\SitePages $page
     *
     * @return Banner
     */
    public function addPage(\AppBundle\Entity\SitePages $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \AppBundle\Entity\SitePages $page
     */
    public function removePage(\AppBundle\Entity\SitePages $page)
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
     * Add bannerPlace
     *
     * @param \AppBundle\Entity\BannerPlace $bannerPlace
     *
     * @return Banner
     */
    public function addBannerPlace(\AppBundle\Entity\BannerPlace $bannerPlace)
    {
        $this->bannerPlaces[] = $bannerPlace;

        return $this;
    }

    /**
     * Remove bannerPlace
     *
     * @param \AppBundle\Entity\BannerPlace $bannerPlace
     */
    public function removeBannerPlace(\AppBundle\Entity\BannerPlace $bannerPlace)
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
     * Add bannerOrder
     *
     * @param \AppBundle\Entity\BannerOrder $bannerOrder
     *
     * @return Banner
     */
    public function addBannerOrder(\AppBundle\Entity\BannerOrder $bannerOrder)
    {
        $this->bannerOrders[] = $bannerOrder;

        return $this;
    }

    /**
     * Remove bannerOrder
     *
     * @param \AppBundle\Entity\BannerOrder $bannerOrder
     */
    public function removeBannerOrder(\AppBundle\Entity\BannerOrder $bannerOrder)
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
