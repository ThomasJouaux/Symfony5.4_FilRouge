<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FournisseurController extends AbstractController
{   
    #[IsGranted("ROLE_SUPER_ADMIN")]
    #[IsGranted("ROLE_ADMIN")]
    #[IsGranted("ROLE_FOURNISSEUR")]
    #[Route('/fournisseur', name: 'app_fournisseur')]
    public function index(): Response
    {
        return $this->render('fournisseur/index.html.twig', [
            'controller_name' => 'FournisseurController',
        ]);
    }
}