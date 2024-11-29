<?php

namespace Tp\Livecampus\Factory;

use DateTime;
use Tp\Livecampus\Entity\Utilisateur\Admin;
use Tp\Livecampus\Entity\Utilisateur\Utilisateur;
use Tp\Livecampus\Entity\Utilisateur\Client;
use Tp\Livecampus\Entity\Utilisateur\Vendeur;
use Exception;


/**
 * Class UserFactory
 * Crée des instances des utilisateurs en fonction de type 
 * @author Abderahmane 
 * @Date 29/11/2024
 */

 class UserFactory
 {

    private static array $registry = [];

    /**
     * Enregistre le type d'user et sa classe 
     * @param string $type Le type d'user (ex: Admin)
     * @param string $class La class associée
     * @throws Exception Si la classe n'est pas valide
     */

    public static function register(string $type, string $class): void
    {
        if (!is_subclass_of($class, Utilisateur::class)) {
            throw new Exception("La classe $class doit hériter de Utilisateur.");
        }
        self::$registry[strtolower($type)] = $class;
    }
    /**
     * Crée une instance de User en fonction de son type.
     *
     * @param string $type Le type d'utilisateur.
     * @param array $data Les données nécessaires.
     * @return Utilisateur L'instance de l'utilisateur.
     * @throws Exception Si le type est invalide.
     */
    public static function create(string $type, array $data): Utilisateur{
      
        $type = strtolower(string: $type);
        var_dump($type);
        var_dump(self::$registry);
        if (!isset(self::$registry[$type])) {
            throw new Exception("Type d'Utilisateur invalide : $type");
        }
        $dateInscription = isset($data['dateInscription']) && $data['dateInscription'] instanceof DateTime
        ? $data['dateInscription']
        : new DateTime($data['dateInscription'] ?? 'now');
        $class = self::$registry[$type];
        switch ($type) {
            case 'client':
                return new $class(
                    $data['nom'],
                    $data['email'],
                    $data['motDePasse'],
                    $dateInscription,
                    $data['roles'] ?? [],
                    $data["adresseLivraison"],
                    $data["panier"],
                    $data['id'] ?? null,
                    $data["TYPE"],
                );
            case 'admin':
                return new $class(
                    $data['nom'],
                    $data['email'],
                    $data['motDePasse'],
                    $dateInscription,
                    $data['roles'],
                    $data["niveauAcces"],
                    $data["derniereConnexion"],
                    $data['id'] ?? null,
                    $data["TYPE"],
                );
            case 'vendeur':
                return new $class(
                    $data['nom'],
                    $data['email'],
                    $data['motDePasse'],
                    $dateInscription,
                    $data['roles'],
                    $data["boutique"],
                    $data["commission"],
                    $data["produits"],
                    $data['id'] ?? null,
                    $data["TYPE"],
                );
            default:
                throw new Exception("Type d'Utilisateur non reconnu.");
        }
        
    }
    

 }