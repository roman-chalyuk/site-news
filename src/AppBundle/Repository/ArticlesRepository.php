<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 12.05.17
 * Time: 12:44
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ArticlesRepository extends EntityRepository
{
    public function findAllOrderedByPublishDate()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT art FROM AppBundle:Articles art ORDER BY art.publishDate ASC'
            )
            ->getResult();
    }

    public function getArticleCategory()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT ac.name FROM AppBundle:Articles art
                JOIN art.category ac
                where art.id = 1'
            )
            ->getResult();
    }
}