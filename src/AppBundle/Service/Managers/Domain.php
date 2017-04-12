<?php

/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 11:33
 */
namespace AppBundle\Service\Managers;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;

class Domain
{
    /**
     * @var  EntityManager
     */
    private $dm;

    /**
     * @var \AppBundle\Entity\Domain
     */
    private $domain;

    /**
     * @var  RequestStack
     */
    private $requestStack;

    public function __construct(EntityManager $dm, RequestStack $requestStack)
    {
        $this->dm = $dm;
        $this->requestStack = $requestStack;
        $domain = $requestStack->getCurrentRequest()->getHost();

        $this->domain = $dm->getRepository('AppBundle:Domain')->findOneBy(['name' => $domain]);
    }

    public function isLocaleAllowed()
    {
        $requestedLocale = $this->requestStack->getCurrentRequest()->getLocale();

        foreach ($this->domain->getLanguages() as $language) {
            if($language->getCode() == $requestedLocale)
                return true;
        }

        return false;
    }

    public function getDefaultLocale()
    {
        return $this->domain->getMainLanguage();
    }

    // If you want to set news according to their locales for current domains
//    public function isNewsLocaleAllowed()
//    {
//        $requestedLocale = $this->requestStack->getCurrentRequest()->getLocale();
//
//        foreach ($this->domain->getNewsLanguages() as $language) {
//            if($language->getCode() == $requestedLocale)
//                return true;
//        }
//
//        return false;
//    }
//
//    public function getDefaultNewsLocale()
//    {
//        return $this->domain->getMainNewsLanguage();
//    }
}