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

    public function subFamily() {
        $subFamily = [
            'Afrosoricida',
            'Artiodactyla',
            'Carnivora',
            'Cetacea',
            'Chiroptera',
            'Cingulata',
            'Dasyuromorphia',
            'Dermoptera',
            'Didelphimorphia',
            'Diprotodontia',
            'Eulipotyphla',
            'Hyracoidea',
            'Lagomorpha',
            'Macroscelidea',
            'Microbiotheria',
            'Monotremata',
            'Notoryctemorphia',
            'Paucituberculata',
            'Peramelemorphia',
            'Perissodactyla',
            'Pholidota',
            'Pilosa',
            'Primates',
            'Proboscidea',
            'Rodentia',
            'Scandentia',
            'Sirenia',
            'Tubulidentata'
        ];

        return $subFamily[array_rand($subFamily)];
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