<?php
namespace Tp\Livecampus\Entity\Utilisateur;

use DateTime;

declare(strict_types=1);

/**
 * Class Utilisateur
 * @author Abderahmane Adjali 
 * @Date 25/11/2024
 */


abstract class Utilisateur
{
    private int | null $id ;

    private string $nom ;
    private string $email ;
    private string $motDePasse ;
    private DateTime $dateInscritpion;

    protected array $roles = [];
    public function __construct($nom,  $email, $motDePasse, $dateInscritpion, $roles, $id = null){
        $this->nom = $nom ;
        $this->id = $id ;
        $this->email = $email ;
        $this->motDePasse = $motDePasse ;
        $this->dateInscritpion = $dateInscritpion ;
        if (is_string(value: $roles)) {
            $roles = [$roles]; 
        }

        $this->roles = array_unique(array_merge($this->roles, $roles));     }

    public abstract function afficherRoles() : array;



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

    /**
     * Get the value of roles
     */ 
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     *
     * @return  self
     */ 
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}