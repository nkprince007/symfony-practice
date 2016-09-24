<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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

        $funFact = "Octopuses can change the color of their body in just *three-tenths* of a second!";
        $funFact = $this->get('markdown.parser')->transform($funFact);

//        $templating = $this->container->get('templating');
//        $html = $templating->render("genus/show.html.twig", [
//            'name' => $genusname,
//            'funFact' => $funFact
//        ]);
//        return new Response($html);

        return $this->render('genus/show.html.twig',[
            'name' => $genusname,
            'funFact' => $funFact
        ]);
    }

    /**
     * @Route("/genus/{genusname}/notes", name="genus_show_notes")
     * @Method("GET")
     */
    public function getNotesAction() {
        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],
        ];

        $data = [
            "notes" => $notes
        ];

        // Does the json_encode and adds content type header
        return new JsonResponse($data);
//        return new Response(json_encode($data));
    }

}

?>