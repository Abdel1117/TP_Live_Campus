<?php

require_once "Produit.php"; // Assurez-vous que la classe Produit est disponible

/**
 * Class Categorie
 * 
 * Représente une catégorie de produits avec ses attributs et fonctionnalités de gestion.
 */
class Categorie
{
    /**
     * @var int $id Identifiant unique de la catégorie
     */
    private int $id;

    /**
     * @var string $nom Nom de la catégorie
     */
    private string $nom;

    /**
     * @var string $description Description de la catégorie
     */
    private string $description;

    /**
     * @var array $produits Liste des produits dans la catégorie
     */
    private array $produits = [];

    /**
     * Constructeur de la classe Categorie
     * 
     * @param int $id Identifiant unique
     * @param string $nom Nom de la catégorie
     * @param string $description Description de la catégorie
     */
    public function __construct(int $id, string $nom, string $description)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
    }

    /**
     * Ajoute un produit à la catégorie.
     * 
     * @param Produit $produit Produit à ajouter
     * @return void
     */
    public function ajouterProduit(Produit $produit): void
    {
        $this->produits[] = $produit;
    }

    /**
     * Retire un produit de la catégorie.
     * 
     * @param Produit $produit Produit à retirer
     * @return void
     */
    public function retirerProduit(Produit $produit): void
    {
        $this->produits = array_filter($this->produits, fn($p) => $p !== $produit);
    }

    /**
     * Retourne la liste des produits dans la catégorie.
     * 
     * @return array Liste des produits
     */
    public function listerProduits(): array
    {
        return $this->produits;
    }

    // Getters et setters pour les propriétés
    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
