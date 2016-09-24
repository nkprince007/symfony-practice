<?php
/**
 * Created by PhpStorm.
 * User: nkprince007
 * Date: 24/09/16
 * Time: 9:15 PM
 */

namespace AppBundle\Repository;

use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;

class GenusRepository extends EntityRepository {

    /**
     * @return Genus[]
     */
    public function findAllPublishedOrderedByRecentlyActive() {
        return $this->createQueryBuilder('genus')
                    ->andWhere('genus.isPublished = :isPublished')
                    ->setParameter('isPublished',true)
                    ->leftJoin('genus.notes', 'genus_note')
                    ->orderBy('genus_note.createdAt', 'DESC')
                    ->getQuery()
                    ->execute();
    }

}