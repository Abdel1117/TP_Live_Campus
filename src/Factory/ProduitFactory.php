<?php

namespace Tp\Livecampus\Factory;
use Tp\Livecampus\Entity\Produit\Produit;
use Exception;

/**
 * Classe ProduitFactory
 * Crée des instances de Produit en fonction du type spécifié.
 */
class ProduitFactory
{
    private static array $registry = [];

    /**
     * Enregistre un type de produit et sa classe correspondante.
     *
     * @param string $type Le type de produit (ex. : "physique").
     * @param string $class La classe associée.
     * @throws Exception Si la classe n'est pas valide.
     */
    public static function register(string $type, string $class): void
    {
        if (!is_subclass_of($class, Produit::class)) {
            throw new Exception("La classe $class doit hériter de Produit.");
        }
        self::$registry[strtolower($type)] = $class;
    }

    /**
     * Crée une instance de produit en fonction de son type.
     *
     * @param string $type Le type de produit.
     * @param array $data Les données nécessaires.
     * @return Produit L'instance de produit.
     * @throws Exception Si le type est invalide.
     */
    public static function create(string $type, array $data): Produit{
    $type = strtolower($type);
   
    if (!isset(self::$registry[$type])) {
        throw new Exception("Type de produit invalide : $type");
    }

    $class = self::$registry[$type];
    
    switch ($type) {
        case 'numerique':
            return new $class(
                $data['nom'],
                $data['description'],
                $data['prix'] = (float) $data['prix'],
                (int) $data['stock'],
                $data['lienTelechargement'],
                (string) $data['tailleFichier'],
                $data['formatFichier'] ?? null,
                $data['id'] ?? null,
            );
        case 'physique':
            return new $class(
                $data['nom'],
                $data['description'],
                $data['prix'] = (float) $data['prix'],
                (int) $data['stock'],
                (float) $data['poids'],
                (float) $data['longueur'],
                (float) $data['largeur'],
                (float) $data['hauteur'],
                $data['id'] ?? null,
            );
        case 'perissable':
            return new $class(
                $data['nom'],
                $data['description'],
                $data["prix"] = (float) $data["prix"],
                (int) $data['stock'],
                $data['dateExpiration'],
                (float) $data['temperatureStockage'],
                $data['id'] ?? null,
            );
        default:
            throw new Exception("Type de produit non reconnu.");
    }
}
}