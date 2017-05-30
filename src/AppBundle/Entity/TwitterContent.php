<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 30.05.17
 * Time: 13:25
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TwitterContentRepository")
 * @ORM\Table(name="twitter_content")
 */
class TwitterContent
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $link;

    /**
     * @var User
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinTable(name="twitter_user")
     */
    private $users;

    /**
     * @var Domain
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Domain")
     * @ORM\JoinTable(name="twitter_domain")
     */
    private $domains;

    /**
     * @var SitePage
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\SitePage")
     * @ORM\JoinTable(name="twitter_sitepage")
     */
    private $pages;

    /**
     * @var Language
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Language")
     * @ORM\JoinTable(name="twitter_language")
     */
    private $languages;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $publishDate;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->domains = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->languages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return TwitterContent
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return TwitterContent
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return TwitterContent
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
     * Set publishDate
     *
     * @param \DateTime $publishDate
     *
     * @return TwitterContent
     */
    public function setPublishDate($publishDate)
    {
        $this->publishDate = $publishDate;

        return $this;
    }

    /**
     * Get publishDate
     *
     * @return \DateTime
     */
    public function getPublishDate()
    {
        return $this->publishDate;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return TwitterContent
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add domain
     *
     * @param \AppBundle\Entity\Domain $domain
     *
     * @return TwitterContent
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
     * Add page
     *
     * @param \AppBundle\Entity\SitePage $page
     *
     * @return TwitterContent
     */
    public function addPage(\AppBundle\Entity\SitePage $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \AppBundle\Entity\SitePage $page
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
     * Add language
     *
     * @param \AppBundle\Entity\Language $language
     *
     * @return TwitterContent
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
}
