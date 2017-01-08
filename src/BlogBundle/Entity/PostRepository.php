<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class PostRepository extends EntityRepository
{
    /**
     * @param Post
     * @return Query
     */
    public function findAllPostQuery()
    {
        $qb = $this->createQueryBuilder('a');

        $qb
            ->orderBy('a.postDate', 'DESC')
        ;

        return $qb->getQuery();
    }

    /**
     * @param Post
     * @param int $idCategory
     * @return Query
     */
    public function findAllPostByCategoryQuery($idCategory)
    {
        $qb = $this->createQueryBuilder('a');

        $qb
            ->where('a.category = :idCategory')
            ->orderBy('a.postDate', 'DESC')
            ->setParameter('idCategory', $idCategory)
        ;

        return $qb->getQuery();
    }

    /**
     * @param Post
     * @param int $idTag
     * @return Query
     */
    public function findAllPostByTagQuery(Tag $idTag)
    {
        $qb = $this->createQueryBuilder('a');

        $qb
            ->join('a.tag', 't')
            ->where('t = :idTag')
            ->orderBy('a.postDate', 'DESC')
            ->setParameter(':idTag', $idTag)
        ;

        return $qb->getQuery();
    }

}