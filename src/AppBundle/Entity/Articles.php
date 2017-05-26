<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 13.04.17
 * Time: 14:58
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticlesRepository")
 * @ORM\Table(name="articles")
 */
class Articles
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $content;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $publishDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $forceFirstDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forceFirst;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language", inversedBy="code")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     */
    private $language;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Domain")
     * @ORM\JoinTable(name="articles_domain")
     */
    private $domains;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\NewsCategory")
     * @ORM\JoinTable(name="articles_category")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="Application\Sonata\MediaBundle\Entity\Media")
     * @ORM\JoinTable(name="articles_media")
     */
    private $videos;

    private $contentFormatter = 'richhtml';

    public function getContentFormatter()
    {
        return $this->contentFormatter;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->domains = new \Doctrine\Common\Collections\ArrayCollection();
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->videos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Articles
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
     * Set content
     *
     * @param string $content
     *
     * @return Articles
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set publishDate
     *
     * @param \DateTime $publishDate
     *
     * @return Articles
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
     * Set forceFirstDate
     *
     * @param \DateTime $forceFirstDate
     *
     * @return Articles
     */
    public function setForceFirstDate($forceFirstDate)
    {
        $this->forceFirstDate = $forceFirstDate;

        return $this;
    }

    /**
     * Get forceFirstDate
     *
     * @return \DateTime
     */
    public function getForceFirstDate()
    {
        return $this->forceFirstDate;
    }

    /**
     * Set forceFirst
     *
     * @param boolean $forceFirst
     *
     * @return Articles
     */
    public function setForceFirst($forceFirst)
    {
        $this->forceFirst = $forceFirst;

        return $this;
    }

    /**
     * Get forceFirst
     *
     * @return boolean
     */
    public function getForceFirst()
    {
        return $this->forceFirst;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Articles
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
     * Set language
     *
     * @param \AppBundle\Entity\Language $language
     *
     * @return Articles
     */
    public function setLanguage(\AppBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \AppBundle\Entity\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Add domain
     *
     * @param \AppBundle\Entity\Domain $domain
     *
     * @return Articles
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
     * Add category
     *
     * @param \AppBundle\Entity\NewsCategory $category
     *
     * @return Articles
     */
    public function addCategory(\AppBundle\Entity\NewsCategory $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\NewsCategory $category
     */
    public function removeCategory(\AppBundle\Entity\NewsCategory $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add video
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $video
     *
     * @return Articles
     */
    public function addVideo(\Application\Sonata\MediaBundle\Entity\Media $video)
    {
        $this->videos[] = $video;

        return $this;
    }

    /**
     * Remove video
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $video
     */
    public function removeVideo(\Application\Sonata\MediaBundle\Entity\Media $video)
    {
        $this->videos->removeElement($video);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVideos()
    {
        return $this->videos;
    }
}
