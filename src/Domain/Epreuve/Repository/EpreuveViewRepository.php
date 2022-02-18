<?php

namespace App\Domain\Epreuve\Repository;

use PDO;

/**
 * Repository.
 */
class EpreuveViewRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Sélection de toutes les épreuves
     */
    public function selectAllEpreuve(): array
    {
        $sql = "SELECT * FROM epreuve";

        $query = $this->connection->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Sélection d'une épreuve selon son id
     */
    public function selectEpreuve($id): array
    {
        $params = [ "id" => $id];
        
        $sql = "SELECT * FROM epreuve WHERE id = :id";

        $query = $this->connection->prepare($sql);
        $query->execute($params);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}

