<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 10.04.17
 * Time: 12:13
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class LanguageRepository extends EntityRepository
{
//    public function getLangCodes()
//    {
//        return $this->getEntityManager()
//            ->createQuery(
//                'SELECT l.code FROM AppBundle:Language l ORDER BY l.code ASC'
//            )
//            ->getResult();
//    }
}