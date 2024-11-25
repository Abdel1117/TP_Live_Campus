<?php

declare(strict_types=1);

/**
 * Class Utilisateur
 * @author Abderahmane Adjali 
 * @Date 25/11/2024
 */


class Utilisateur
{
    private int | null $id ;

    private string $nom ;
    private string $email ;
    private string $motDePasse ;
    private DateTime $dateInscritpion;
    public function __construct($nom,  $email, $motDePasse, $dateInscritpion, $id = null){
        $this->nom = $nom ;
        $this->id = $id ;
        $this->email = $email ;
        $this->motDePasse = $motDePasse ;
        $this->dateInscritpion = $dateInscritpion ;
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
     */ 
    public function setNom($nom): void
    {
        $this->nom = $nom;


    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */ 
    public function setEmail($email): void
    {
        $this->email = $email;

    }

    /**
     * Get the value of motDePasse
     */ 
    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    /**
     * Set the value of motDePasse
     
     */ 
    public function setMotDePasse($motDePasse): void
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * Get the value of dateInscritpion
     */ 
    public function getDateInscritpion(): DateTime
    {
        return $this->dateInscritpion;
    }

    /**
     * Set the value of dateInscritpion
    
     */ 
    public function setDateInscritpion($dateInscritpion): void
    {
        $this->dateInscritpion = $dateInscritpion;
    }
}