<?php
namespace Tp\Livecampus;
use Tp\Livecampus\Entity\Produit\Produit;

/**
 * Class Panier
 * 
 * Représente un panier d'achats avec ses produits et quantités.
 */
class Panier 
{
    /**
     * @var array $articles Tableau associatif où la clé est l'ID du produit et la valeur est un tableau avec les informations du produit et la quantité
     */
    private array $articles = [];

    /**
     * Ajoute un produit au panier.
     * 
     * @param Produit $produit Produit à ajouter
     * @param int $quantite Quantité à ajouter
     * @return void
     */
    public function ajouterProduit(Produit $produit, int $quantite): void
    {
        $id = $produit->getId();

        if (isset($this->articles[$id])) {
            $this->articles[$id]['quantite'] += $quantite;
        } else {
            $this->articles[$id] = ['produit' => $produit, 'quantite' => $quantite];
        }
    }

    /**
     * Retire un produit du panier.
     * 
     * @param Produit $produit Produit à retirer
     * @return void
     */
    public function retirerProduit(Produit $produit): void
    {
        $id = $produit->getId();

        if (isset($this->articles[$id])) {
            unset($this->articles[$id]);
        }
    }

    /**
     * Liste les produits dans le panier.
     * 
     * @return array Liste des articles (produits et quantités)
     */
    public function listerProduits(): array
    {
        return $this->articles;
    }

    /**
     * Calculer le total du panier.
     * 
     * @return float Total des prix des produits dans le panier
     */
    public function calculerTotal(): float
    {
        $total = 0.0;

        foreach ($this->articles as $article) {
            $produit = $article['produit'];
            $quantite = $article['quantite'];
            $total += $produit->getPrix() * $quantite;
        }

        return $total;
    }
}
