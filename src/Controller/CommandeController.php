<?php

namespace App\Controller;

use DateTime;
use DateTimeInterface;
use App\Entity\Commande;
use App\Entity\SeCompose;
use App\Repository\ProduitRepository;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[IsGranted("ROLE_USER")]
    #[Route('/commande', name: 'app_commande')]
    public function index(ProduitRepository $repo ,SessionInterface $session , EntityManagerInterface $manager): Response
    {
        $panier = $session->get("panier", []);
       
        $com = new Commande();
        $com->setUser($this->getUser());
        $com->setDateCommande(new DateTime());
        $manager->persist($com);

        foreach ($panier as $produit) {
            $p = $repo -> find($produit->getId());
            $sc = new SeCompose();
            $sc->setCommande($com);
            $sc->setProduit($p);
            $sc->setQuantite(5);
            $manager->persist($sc);
            $manager->flush();
        }
        $session->set("panier" , []);

        return $this->redirect("/profile");
    }
}
