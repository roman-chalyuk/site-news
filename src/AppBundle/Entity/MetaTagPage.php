<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 12:43
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MetaTagPageRepository")
 * @ORM\Table(name="meta_tag_page")
 */
class MetaTagPage
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Domain", inversedBy="name")
     * @ORM\JoinColumn(name="domain", referencedColumnName="id")
     */
    private $domain;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language", inversedBy="name")
     * @ORM\JoinColumn(name="lang", referencedColumnName="id")
     */
    private $lang;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\NewsCategory", inversedBy="name")
     * @ORM\JoinColumn(name="newsCategory", referencedColumnName="id")
     */
    private $newsCategory;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SitePage", inversedBy="name")
     * @ORM\JoinColumn(name="page", referencedColumnName="id")
     */
    private $page;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MetaTag", inversedBy="name")
     * @ORM\JoinColumn(name="metaTagsName", referencedColumnName="id")
     */
    private $metaTagName;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MetaTagContent", inversedBy="name")
     * @ORM\JoinColumn(name="metaTagsContent", referencedColumnName="id")
     */
    private $metaTagContent;

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
     * Set domain
     *
     * @param \AppBundle\Entity\Domain $domain
     *
     * @return MetaTagPage
     */
    public function setDomain(\AppBundle\Entity\Domain $domain = null)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return \AppBundle\Entity\Domain
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set lang
     *
     * @param \AppBundle\Entity\Language $lang
     *
     * @return MetaTagPage
     */
    public function setLang(\AppBundle\Entity\Language $lang = null)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return \AppBundle\Entity\Language
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set newsCategory
     *
     * @param \AppBundle\Entity\NewsCategory $newsCategory
     *
     * @return MetaTagPage
     */
    public function setNewsCategory(\AppBundle\Entity\NewsCategory $newsCategory = null)
    {
        $this->newsCategory = $newsCategory;

        return $this;
    }

    /**
     * Get newsCategory
     *
     * @return \AppBundle\Entity\NewsCategory
     */
    public function getNewsCategory()
    {
        return $this->newsCategory;
    }

    /**
     * Set page
     *
     * @param \AppBundle\Entity\SitePage $page
     *
     * @return MetaTagPage
     */
    public function setPage(\AppBundle\Entity\SitePage $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \AppBundle\Entity\SitePage
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set metaTagName
     *
     * @param \AppBundle\Entity\MetaTag $metaTagName
     *
     * @return MetaTagPage
     */
    public function setMetaTagName(\AppBundle\Entity\MetaTag $metaTagName = null)
    {
        $this->metaTagName = $metaTagName;

        return $this;
    }

    /**
     * Get metaTagName
     *
     * @return \AppBundle\Entity\MetaTag
     */
    public function getMetaTagName()
    {
        return $this->metaTagName;
    }

    /**
     * Set metaTagContent
     *
     * @param \AppBundle\Entity\MetaTagContent $metaTagContent
     *
     * @return MetaTagPage
     */
    public function setMetaTagContent(\AppBundle\Entity\MetaTagContent $metaTagContent = null)
    {
        $this->metaTagContent = $metaTagContent;

        return $this;
    }

    /**
     * Get metaTagContent
     *
     * @return \AppBundle\Entity\MetaTagContent
     */
    public function getMetaTagContent()
    {
        return $this->metaTagContent;
    }
}
