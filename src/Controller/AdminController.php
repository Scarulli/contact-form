<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * Affiche la liste des formulaires de contacts envoyés
     * @Route("/admin/contacts", name="admin_contacts")
     */
    public function index()
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('contact');
        }

        return $this->render('admin/index.html.twig', [
            'contacts' => $this->getDoctrine()->getManager()->getRepository(Contact::class)->findAll(),
        ]);
    }
}
