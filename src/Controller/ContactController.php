<?php

namespace App\Controller;

use App\Form\ContactType;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ContactType::class);

        # Chargement des données reçues
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                # Sauvegarde des données
                $em->persist($form->getData());
                $em->flush();

                $this->addFlash('success', "Votre demande à bien été envoyée.");
                # Rechargement de la page pour remettre à zéro le formulaire
                return $this->redirectToRoute('contact');
            } # En cas d'erreur, on affiche le message
            catch (Exception $e) {
                $this->addFlash('danger', "Une erreur est survenue lors du traitement : " . $e->getMessage());
            }
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
