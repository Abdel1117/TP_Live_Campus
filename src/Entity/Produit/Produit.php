<?php

declare(strict_types=1);

/**
 * Class Produit
 * @author Abderahmane Adjali 
 * @Date 25/11/2024
 */
class Produit {
    /**
     * @var int | null 
     */
    private int $id;
    /**
     * @var string
     */
    private string $nom;
    /**
     * @var string
     */
    private string $description;
    /**
     * @var float
     */
    private float $prix;
    /**
     * @var int
     */
    private int $stock;
    public function __construct($id = null, $nom, $description, $prix, $stock){
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->prix = $prix;
        $this->stock = $stock;
    }
    
    /**
     * Get the value of id
     */ 
    public function getId(): int|null 
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id): void 
    {
        $this->id = $id;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom): void
    {
        $this->nom = $nom;

    }

    /**
     * Get the value of description
     */ 
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix): void
    {
        $this->prix = $prix;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock): void
    {
        $this->stock = $stock;

    }
}


?>