<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 11:51
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DomainRepository")
 * @ORM\Table(name="domain")
 */
class Domain
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
    * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Language")
    * @ORM\JoinTable(name="domain_languages")
    */
    private $languages;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language", inversedBy="name")
     * @ORM\JoinColumn(name="mainLanguage", referencedColumnName="id")
     */
    private $mainLanguage;

    public function __construct()
    {
//        $this->languages = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->mainLanguage = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Domain
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
     * Add language
     *
     * @param \AppBundle\Entity\Language $language
     *
     * @return Domain
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
     * Set mainLanguage
     *
     * @param \AppBundle\Entity\Language $mainLanguage
     *
     * @return Domain
     */
    public function setMainLanguage(\AppBundle\Entity\Language $mainLanguage = null)
    {
        $this->mainLanguage = $mainLanguage;

        return $this;
    }

    /**
     * Get mainLanguage
     *
     * @return \AppBundle\Entity\Language
     */
    public function getMainLanguage()
    {
        return $this->mainLanguage;
    }
}
