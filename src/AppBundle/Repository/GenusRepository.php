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
    public function findAllPublishedOrderedBySize() {
        return $this->createQueryBuilder('genus')
                    ->andWhere('genus.isPublished = :isPublished')
                    ->setParameter('isPublished',true)
                    ->orderBy('genus.speciesCount','DESC')
                    ->getQuery()
                    ->execute();
    }

}