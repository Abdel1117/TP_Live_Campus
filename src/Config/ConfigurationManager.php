<?php

namespace Tp\Livecampus\Config;

use Exception;

/**
 * Classe ConfigurationManager
 * Gère une configuration centralisée avec un modèle singleton.
 */
class ConfigurationManager
{
    /**
     * @var ConfigurationManager|null Instance unique de la classe
     */
    private static ?ConfigurationManager $instance = null;

    /**
     * @var array Configuration stockée
     */
    private array $configuration = [];

    /**
     * Constructeur privé pour empêcher l'instanciation directe
     */
    private function __construct()
    {
        // Initialisation par défaut si nécessaire
        $this->configuration = [
            'TVA' => 20.0,
            'Devise' => 'EUR',
            'FraisLivraison' => 5.0,
            'EmailContact' => 'contact@example.com',
        ];
    }

    /**
     * Retourne l'instance unique de la classe
     *
     * @return ConfigurationManager
     */
    public static function getInstance(): ConfigurationManager
    {
        if (self::$instance === null) {
            self::$instance = new ConfigurationManager();
        }

        return self::$instance;
    }

    /**
     * Charge une configuration depuis un fichier ou un tableau
     *
     * @param array $config Configuration à charger
     * @return void
     * @throws Exception Si des paramètres sont invalides
     */
    public function chargerConfiguration(array $config): void
    {
        foreach ($config as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * Récupère la valeur d'un paramètre
     *
     * @param string $key Clé du paramètre
     * @return mixed Valeur du paramètre
     * @throws Exception Si le paramètre n'existe pas
     */
    public function get(string $key)
    {
        if (!isset($this->configuration[$key])) {
            throw new Exception("Paramètre non trouvé : $key");
        }

        return $this->configuration[$key];
    }

    /**
     * Définit ou met à jour un paramètre
     *
     * @param string $key Clé du paramètre
     * @param mixed $value Valeur du paramètre
     * @return void
     * @throws Exception Si la validation échoue
     */
    public function set(string $key, $value): void
    {
        $this->validerParametre($key, $value);
        $this->configuration[$key] = $value;
    }

    /**
     * Valide un paramètre avant de l'accepter
     *
     * @param string $key Clé du paramètre
     * @param mixed $value Valeur du paramètre
     * @return void
     * @throws Exception Si le paramètre est invalide
     */
    private function validerParametre(string $key, $value): void
    {
        switch ($key) {
            case 'TVA':
                if (!is_float($value) || $value < 0 || $value > 100) {
                    throw new Exception("TVA invalide : doit être un pourcentage (0-100).");
                }
                break;

            case 'Devise':
                if (!is_string($value) || strlen($value) !== 3) {
                    throw new Exception("Devise invalide : doit être une chaîne de 3 lettres (par ex. 'EUR').");
                }
                break;

            case 'FraisLivraison':
                if (!is_float($value) || $value < 0) {
                    throw new Exception("Frais de livraison invalide : doit être un nombre positif.");
                }
                break;

            case 'EmailContact':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("Email de contact invalide.");
                }
                break;

            default:
                throw new Exception("Paramètre inconnu : $key");
        }
    }
}
