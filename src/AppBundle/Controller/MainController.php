<?php
/**
 * Created by PhpStorm.
 * User: nkprince007
 * Date: 24/09/16
 * Time: 6:32 PM
 */

namespace AppBundle\Controller;

use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction() {
        return $this->render('main/homepage.html.twig');
    }

    public function debugAction() {
        dump($this);die;
    }

}