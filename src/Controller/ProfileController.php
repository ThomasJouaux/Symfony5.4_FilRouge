<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[IsGranted("ROLE_SUPER_ADMIN")]
    #[IsGranted("ROLE_ADMIN")]
    #[IsGranted("ROLE_FOURNISSEUR")]
    #[IsGranted(["ROLE_USER"])]
    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
