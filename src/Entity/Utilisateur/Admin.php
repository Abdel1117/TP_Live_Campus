<?php
declare(strict_types=1);

namespace Tp\Livecampus\Entity\Utilisateur;

use DateTime;
use Tp\Livecampus\Entity\Utilisateur\Utilisateur;

/**
 * Class Admin
 * 
 * Représente un administrateur du système avec des fonctionnalités spécifiques
 * comme la gestion des utilisateurs et l'accès aux journaux du système.
 */
class Admin extends Utilisateur
{
    /**
     * @var int $niveauAcces Niveau d'accès de l'administrateur (ex. : 1 = lecture seule, 2 = modification)
     */
    private int $niveauAcces;

    /**
     * @var DateTime $derniereConnexion Date et heure de la dernière connexion de l'administrateur
     */
    private DateTime $derniereConnexion;

    /**
     * Constructeur de la classe Admin
     * 
     * @param int $niveauAcces Niveau d'accès de l'administrateur
     * @param DateTime|null $derniereConnexion Date de la dernière connexion (par défaut, maintenant)
     */
    public function __construct(int $niveauAcces, ?DateTime $derniereConnexion = null)
    {
        $this->niveauAcces = $niveauAcces;
        $this->derniereConnexion = $derniereConnexion ?? new DateTime();
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
     * Gérer les utilisateurs du système.
     * 
     * Permet d'ajouter, modifier ou supprimer des utilisateurs (logique à implémenter ultérieurement).
     * 
     * @return void
     */
    public function gererUtilisateurs(): void
    {
        // Logique de gestion des utilisateurs (ajout, modification, suppression)
        echo "Gestion des utilisateurs du système (fonctionnalité à implémenter).\n";
    }

    /**
     * Accéder aux journaux du système pour les analyses d'audit.
     * 
     * Retourne les logs du système (logique à implémenter ultérieurement).
     * 
     * @return array Liste des journaux du système
     */
    public function accederJournalSysteme(): array
    {
        // Logique pour accéder aux journaux du système
        echo "Accès aux journaux du système (fonctionnalité à implémenter).\n";
        return []; // Retourne un tableau vide pour l'instant
    }

    /**
     * Récupère le niveau d'accès de l'administrateur.
     * 
     * @return int Niveau d'accès
     */
    public function getNiveauAcces(): int
    {
        return $this->niveauAcces;
    }

    /**
     * Définit le niveau d'accès de l'administrateur.
     * 
     * @param int $niveauAcces Niveau d'accès
     * @return self Instance de l'objet pour le chaînage
     */
    public function setNiveauAcces(int $niveauAcces): self
    {
        $this->niveauAcces = $niveauAcces;

        return $this;
    }

    /**
     * Récupère la date et l'heure de la dernière connexion.
     * 
     * @return DateTime Date et heure de la dernière connexion
     */
    public function getDerniereConnexion(): DateTime
    {
        return $this->derniereConnexion;
    }

    /**
     * Met à jour la date et l'heure de la dernière connexion.
     * 
     * @param DateTime $derniereConnexion Nouvelle date de connexion
     * @return self Instance de l'objet pour le chaînage
     */
    public function setDerniereConnexion(DateTime $derniereConnexion): self
    {
        $this->derniereConnexion = $derniereConnexion;

        return $this;
    }
  
  
}
