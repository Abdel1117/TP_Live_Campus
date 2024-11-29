<?php
declare(strict_types=1);
namespace Tp\Livecampus\Entity\Produit;

use DateTime;
use Tp\Livecampus\Entity\Produit\Produit;

class ProduitPerissable extends Produit{
    private DateTime $dateExpiration;
    private float $temperatureStockage;
    protected string $type = "perissable";

    public function __construct(
        string $nom,
        string $description,
        float $prix,
        int $stock,
        DateTime $dateExpiration,
        float $temperatureStockage,
        ?int $id = null
    ){
        parent::__construct($nom, $description, $prix, $stock, $id);

        // Initialisation des propriétés spécifiques à la classe enfant
        $this->dateExpiration = $dateExpiration;
        $this->temperatureStockage = $temperatureStockage;
    }
    /**
     * Summary of calculerFraisLivraison
     * @return float
     */
    public function  calculerFraisLivraison():float{
        $prix = $this->getPrix();
        return $prix + 5;
    } 
    /**
     * Affiche les détails du produit
     * @return string 
     */
    public function afficherDetails(): string {
        $nom = $this->getNom();
        return $nom;
    }
    

    /**
     * Get the value of dateExpiration
     */ 
    public function getDateExpiration()
    {
        return $this->dateExpiration;
    }

    /**
     * Set the value of dateExpiration
     *
     * @return  self
     */ 
    public function setDateExpiration($dateExpiration)
    {
        $this->dateExpiration = $dateExpiration;

        return $this;
    }

    /**
     * Get the value of temperatureStockage
     */ 
    public function getTemperatureStockage()
    {
        return $this->temperatureStockage;
    }

    /**
     * Set the value of temperatureStockage
     *
     * @return  self
     */ 
    public function setTemperatureStockage($temperatureStockage)
    {
        $this->temperatureStockage = $temperatureStockage;

        return $this;
    }
}