<?php

namespace App\Entity;

use App\Repository\DetailCommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailCommandeRepository::class)]
class DetailCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $detailNomProduit = null;

    #[ORM\Column]
    private ?int $detailQteArticle = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $detailCommandePrixHt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $detailCommandePrixTtc = null;

    #[ORM\OneToOne(mappedBy: 'detailCommande', cascade: ['persist', 'remove'])]
    private ?Commande $commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetailNomProduit(): ?string
    {
        return $this->detailNomProduit;
    }

    public function setDetailNomProduit(string $detailNomProduit): self
    {
        $this->detailNomProduit = $detailNomProduit;

        return $this;
    }

    public function getDetailQteArticle(): ?int
    {
        return $this->detailQteArticle;
    }

    public function setDetailQteArticle(int $detailQteArticle): self
    {
        $this->detailQteArticle = $detailQteArticle;

        return $this;
    }

    public function getDetailCommandePrixHt(): ?string
    {
        return $this->detailCommandePrixHt;
    }

    public function setDetailCommandePrixHt(string $detailCommandePrixHt): self
    {
        $this->detailCommandePrixHt = $detailCommandePrixHt;

        return $this;
    }

    public function getDetailCommandePrixTtc(): ?string
    {
        return $this->detailCommandePrixTtc;
    }

    public function setDetailCommandePrixTtc(string $detailCommandePrixTtc): self
    {
        $this->detailCommandePrixTtc = $detailCommandePrixTtc;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(Commande $commande): self
    {
        // set the owning side of the relation if necessary
        if ($commande->getDetailCommande() !== $this) {
            $commande->setDetailCommande($this);
        }

        $this->commande = $commande;

        return $this;
    }
}
