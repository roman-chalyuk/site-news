<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 12:43
 */

namespace AppBundle\Entity;

///**
// * @ORM\Entity(repositoryClass="AppBundle\Repository\MetaTagPageRepository")
// * @ORM\Table(name="meta_tag_page")
// */
class MetaTagPage
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language", inversedBy="name")
     * @ORM\JoinColumn(name="mainLanguage", referencedColumnName="id")
     */
    private $domain;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language", inversedBy="name")
     * @ORM\JoinColumn(name="mainLanguage", referencedColumnName="id")
     */
    private $lang;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language", inversedBy="name")
     * @ORM\JoinColumn(name="mainLanguage", referencedColumnName="id")
     */
    private $newsCategory;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language", inversedBy="name")
     * @ORM\JoinColumn(name="mainLanguage", referencedColumnName="id")
     */
    private $page;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language", inversedBy="name")
     * @ORM\JoinColumn(name="mainLanguage", referencedColumnName="id")
     */
    private $metaTagsName;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language", inversedBy="name")
     * @ORM\JoinColumn(name="mainLanguage", referencedColumnName="id")
     */
    private $metaTagsContent;
}