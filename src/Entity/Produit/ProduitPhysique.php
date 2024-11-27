<?php 
declare(strict_types=1);
namespace Tp\Livecampus\Entity\Produit;
use Tp\Livecampus\Entity\Produit\Produit;


/**
 * Class ProduitPhysique
 * Représente un produit physique avec des propriétés spécifiques comme le poids, 
 * la longueur, la largeur, et la hauteur, ainsi que des fonctionnalités spécifiques.
 * @date 26/11/2024
 * @extends Produit
 * @author Abderahmane Adjali
 */
class ProduitPhysique extends Produit 
{
    /**
     * @var float $poids Poids du produit en kilogrammes
     */
    private float $poids;

    /**
     * @var float $longueur Longueur du produit en centimètres
     */
    private float $longueur;

    /**
     * @var float $largeur Largeur du produit en centimètres
     */
    private float $largeur;

    /**
     * @var float $hauteur Hauteur du produit en centimètres
     */
    private float $hauteur;


    public function __construct($nom, $description, $prix, $stock,
    $poids,
    $longueur,
    $largeur,
    $hauteur, $id = null){
        parent::__construct(nom: $nom,description: $description,prix: $prix,stock: $stock,id: $id);
        $this->poids = $poids;
        $this->longueur = $longueur;
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
       
    }

    /**
     * Affiche les détails principaux du produit physique (poids et longueur). 
     * @return string
     */
    public function afficherDetails(): string
    {
       return $this->poids . " " . $this->longueur;
    }

    /**
     * Calcule le volume du produit en centimètres cubes.
     * Formule : longueur x largeur x hauteur
     * @return float Le volume du produit
     */
    public function calculerVolume(): float
    { 
        return $this->longueur * $this->largeur * $this->hauteur; 
    }

    /**
     * Calcule les frais de livraison basés sur le poids et le prix du produit. 
     * Formule : prix + poids 
     * @return float Les frais de livraison
     */
    public function calculerFraisLivraison(): float
    {
        $prix = $this->getPrix(); // Utilise le getter de la classe parent
        return $prix + $this->poids;
    }

    /**
     * Récupère le poids du produit.
     * @return float Poids du produit
     */
    public function getPoids(): float
    {
        return $this->poids;
    }

    /**
     * Définit le poids du produit.
     * 
     * @param float $poids Poids du produit
     * @return self Instance de l'objet pour le chaînage
     */
    public function setPoids($poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Récupère la longueur du produit.
     * 
     * @return float Longueur du produit
     */
    public function getLongueur(): float
    {
        return $this->longueur;
    }

    /**
     * Définit la longueur du produit.
     * 
     * @param float $longueur Longueur du produit
     * @return self Instance de l'objet pour le chaînage
     */
    public function setLongueur($longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    /**
     * Récupère la largeur du produit.
     * 
     * @return float Largeur du produit
     */
    public function getLargeur(): float
    {
        return $this->largeur;
    }

    /**
     * Définit la largeur du produit.
     * 
     * @param float $largeur Largeur du produit
     * @return self Instance de l'objet pour le chaînage
     */
    public function setLargeur($largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * Récupère la hauteur du produit.
     * 
     * @return float Hauteur du produit
     */
    public function getHauteur(): float
    {
        return $this->hauteur;
    }

    /**
     * Définit la hauteur du produit.
     * 
     * @param float $hauteur Hauteur du produit
     * @return self Instance de l'objet pour le chaînage
     */
    public function setHauteur($hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }
}