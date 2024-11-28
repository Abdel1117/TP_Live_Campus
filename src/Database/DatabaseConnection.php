<?php 
declare(strict_types=1);
namespace Tp\Livecampus\Database;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class DatabaseConnection
{
    private static ?DatabaseConnection $instance = null;
    private ?PDO $connection = null;

    private function __construct()
    {
        // Charger les variables d'environnement
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        try {
            // Créer la connexion PDO avec les variables d'environnement
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=%s',
                $_ENV['DB_HOST'],
                $_ENV['DB_NAME'],
                $_ENV['DB_CHARSET']
            );

            $this->connection = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_PERSISTENT => true,
            ]);
        } catch (PDOException $e) {
            // Lever une exception en cas d'erreur
            throw new PDOException('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public static function getInstance(): DatabaseConnection
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Obtenir l'objet PDO
    public function getConnection(): PDO
    {
        if ($this->connection === null) {
            throw new PDOException('La connexion à la base de données n’a pas été initialisée.');
        }

        return $this->connection;
    }

}

