<?php
/**
 * Created by PhpStorm.
 * User: nkprince007
 * Date: 24/09/16
 * Time: 8:25 PM
 */

namespace AppBundle\DataFixtures\ORM;

use Nelmio\Alice\Fixtures;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadFixtures implements FixtureInterface {

    public function genus()
    {
        $genera = [
            'Octopus',
            'Balaena',
            'Orcinus',
            'Hippocampus',
            'Asterias',
            'Amphiprion',
            'Carcharodon',
            'Aurelia',
            'Cucumaria',
            'Balistoides',
            'Paralithodes',
            'Chelonia',
            'Trichechus',
            'Eumetopias'
        ];
        return $genera[array_rand($genera)];
    }

    public function load(ObjectManager $manager) {
        $objects = Fixtures::load(
            __DIR__.'/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]
        );
//        $objects = Fixtures::load(__DIR__.'/fixtures.yml', $manager);
    }
}