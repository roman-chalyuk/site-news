<?php

/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.04.17
 * Time: 11:33
 */
namespace AppBundle\Service\DomainManager;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;

class Domain
{
    /** @var  DocumentManager */
    private $dm;

    /** @var \AppBundle\Entity\Domain */
    private $domain;

    /** @var  RequestStack */
    private $requestStack;

    public function __construct(EntityManager $dm, RequestStack $requestStack)
    {
        $this->dm = $dm;
        $this->requestStack = $requestStack;
        $domain = $requestStack->getCurrentRequest()->getHost();

        $this->domain = $dm->getRepository('AppBundle:Domain')->findOneBy(['domain' => $domain]);
    }

//    public function isLocaleAllowed()
//    {
//        $requestedLocale = $this->requestStack->getCurrentRequest()->getLocale();
//
//        foreach ($this->domain->getLanguages() as $language) {
//            if($language->getCode() == $requestedLocale)
//                return true;
//        }
//
//        return false;
//    }
//
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
//    public function getDefaultLocale()
//    {
//        return $this->domain->getMainLanguage();
//    }
//
//    public function getDefaultNewsLocale()
//    {
//        return $this->domain->getMainNewsLanguage();
//    }
}