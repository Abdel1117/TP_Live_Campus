<?php
declare(strict_types=1);
namespace Tp\Livecampus\Entity\Utilisateur;

use Tp\Livecampus\Entity\Utilisateur\Utilisateur;
use Tp\Livecampus\Entity\Produit\Produit;

/**
 * Class Vendeur
 * 
 * Représente un vendeur avec une boutique, une commission, et des fonctionnalités
 * pour gérer les produits et le stock.
 */
class Vendeur extends Utilisateur
{
    /**
     * @var string $boutique Nom de la boutique du vendeur
     */
    private string $boutique;

    /**
     * @var float $commission Taux de commission du vendeur (en pourcentage)
     */
    private float $commission;

    /**
     * @var array $produits Liste des produits disponibles dans la boutique
     */
    private array $produits = [];

    /**
     * Constructeur de la classe Vendeur
     * 
     * @param string $boutique Nom de la boutique
     * @param float $commission Taux de commission
     */
    public function __construct($nom,  $email, $motDePasse, $dateInscritpion, $roles, $id = null,string $boutique, float $commission)
    {
        parent::__construct(nom: $nom,email: $email, motDePasse: $motDePasse, dateInscritpion: $dateInscritpion, roles: $roles, id: $id);
        $this->boutique = $boutique;
        $this->commission = $commission;
    }




    public function afficherRoles(): array{
        $roles = $this->getRoles();

        return $roles;
    }
      /**
     * Crée une commande à partir des articles présents dans le panier.
     * 
     * Pour l'instant, cette méthode est vide.
     * 
     * @return void
     */
    public function passerCommande(): void
    {
        // Logique pour créer une commande à partir des articles du panier (vide pour l'instant)
        echo "Commande créée à partir du panier.\n";
       
    }
    /**
     * Consultation de l'historique des commandes
     * @return array
     */
    public function consulterHistorique(): array {
        return [];
    }
    /**
     * Ajoute un produit à la boutique du vendeur.
     * 
     * (Pour l'instant, cette méthode ne fait que simuler l'ajout.)
     * 
     * @param Produit $produit Produit à ajouter
     * @return void
     */
    public function ajouterProduit(Produit $produit): void
    {
        // Ajout du produit à la liste des produits
        $this->produits[$produit->getId()] = $produit;
        echo "Produit ajouté à la boutique : {$produit->getNom()}\n";
    }

    /**
     * Gère le stock d'un produit dans la boutique du vendeur.
     * 
     * Met à jour la quantité en stock pour un produit donné.
     * 
     * (Pour l'instant, cette méthode ne fait que simuler la gestion du stock.)
     * 
     * @param Produit $produit Produit à mettre à jour
     * @param int $quantite Nouvelle quantité de stock
     * @return void
     */
    public function gererStock(Produit $produit, int $quantite): void
    {
        // Vérifie si le produit existe dans la boutique
        if (isset($this->produits[$produit->getId()])) {
            $produit->setStock($quantite); // Met à jour le stock du produit
            echo "Stock mis à jour pour le produit : {$produit->getNom()}, nouvelle quantité : $quantite\n";
        } else {
            echo "Le produit n'existe pas dans la boutique.\n";
        }
    }

    /**
     * Récupère le nom de la boutique du vendeur.
     * 
     * @return string Nom de la boutique
     */
    public function getBoutique(): string
    {
        return $this->boutique;
    }

    /**
     * Définit le nom de la boutique du vendeur.
     * 
     * @param string $boutique Nom de la boutique
     * @return self Instance de l'objet pour le chaînage
     */
    public function setBoutique(string $boutique): self
    {
        $this->boutique = $boutique;

        return $this;
    }

    /**
     * Récupère le taux de commission du vendeur.
     * 
     * @return float Taux de commission
     */
    public function getCommission(): float
    {
        return $this->commission;
    }

    /**
     * Définit le taux de commission du vendeur.
     * 
     * @param float $commission Taux de commission
     * @return self Instance de l'objet pour le chaînage
     */
    public function setCommission(float $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * Liste les produits dans la boutique du vendeur.
     * 
     * @return array Liste des produits
     */
    public function listerProduits(): array
    {
        return $this->produits;
    }

  
}
