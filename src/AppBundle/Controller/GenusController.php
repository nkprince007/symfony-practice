<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GenusController extends Controller {

    /**
     * @Route("/genus")
     */
    public function showAction() {
        return new Response('Under the Sea!');
    }

    /**
     * @Route("/genus/{genusname}")
     */
    public function showActionWithName($genusname) {
        $templating = $this->container->get('templating');
        $html = $templating->render("genus/show.html.twig", [
            'name' => $genusname
        ]);

        return new Response($html);
    }
}

?>