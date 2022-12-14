<?php

namespace App\Entity;

use App\Entity\DetailCommande;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandeRepository;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $commandeStatut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'user')]
    private ?user $user = null;


    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $commande_date = null;

    #[ORM\OneToOne(inversedBy: 'commande', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?DetailCommande $detailCommande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isCommandeStatut(): ?bool
    {
        return $this->commandeStatut;
    }

    public function setCommandeStatut(bool $commandeStatut): self
    {
        $this->commandeStatut = $commandeStatut;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCommandeDate(): ?\DateTimeInterface
    {
        return $this->commande_date;
    }

    public function setCommandeDate(?\DateTimeInterface $commande_date): self
    {
        $this->commande_date = $commande_date;

        return $this;
    }

    public function getDetailCommande(): ?detailCommande
    {
        return $this->detailCommande;
    }

    public function setDetailCommande(detailCommande $detailCommande): self
    {
        $this->detailCommande = $detailCommande;

        return $this;
    }

}
