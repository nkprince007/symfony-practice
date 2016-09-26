<?php
/**
 * Created by PhpStorm.
 * User: nkprince007
 * Date: 25/09/16
 * Time: 3:19 PM
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Genus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\GenusFormType;
use Symfony\Component\HttpFoundation\Request;

class GenusAdminController extends Controller{

    /**
     * @Route("/admin/genus",name="admin_genus_index")
     */
    public function indexAction() {
        $genuses = $this->getDoctrine()
            ->getRepository('AppBundle:Genus')
            ->findAll();
        return $this->render('admin/genus/list.html.twig', array(
            'genuses' => $genuses
        ));
    }

    /**
     * @Route("/admin/genus/new", name="admin_genus_new")
     */
    public function newAction(Request $request) {

        $form = $this->createForm(GenusFormType::class);

        //POST DATA HANDLING
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $genus = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($genus);
            $em->flush();
            $this->addFlash('success', "Genus Created!");
            return $this->redirectToRoute('admin_genus_index');
        }

        return $this->render('admin/genus/new.html.twig', [
            'genusForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/genus/{id}/edit", name="admin_genus_edit")
     */
    public function editAction(Request $request, Genus $genus) {

        $form = $this->createForm(GenusFormType::class, $genus);

        //POST DATA HANDLING
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $genus = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($genus);
            $em->flush();
            $this->addFlash('success', "Genus Updated!");
            return $this->redirectToRoute('admin_genus_index');
        }

        return $this->render('admin/genus/edit.html.twig', [
            'genusForm' => $form->createView()
        ]);
    }

}