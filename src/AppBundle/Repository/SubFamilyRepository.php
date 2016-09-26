<?php
/**
 * Created by PhpStorm.
 * User: nkprince007
 * Date: 26/09/16
 * Time: 11:41 AM
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class SubFamilyRepository extends EntityRepository {

    public function createAlphabeticalQueryBuilder() {
        return $this->createQueryBuilder('sub_family')
            ->orderBy('sub_family.name','ASC');
    }

}