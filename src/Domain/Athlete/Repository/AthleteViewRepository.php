<?php

namespace App\Domain\Athlete\Repository;

use PDO;

/**
 * Repository.
 */
class AthleteViewRepository
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
     * Sélection de tous les athlete
     */
    public function selectAllAthlete(): array
    {
        $sql = "SELECT * FROM athletes";

        $query = $this->connection->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Sélection d'un athlete selon son id
     */
    public function selectAthlete(int $id): array
    {

        $id = (int)$id ?? 0;
        
        $params = [ "id" => $id];
        
        $sql = "SELECT * FROM athletes WHERE id = :id";

        $query = $this->connection->prepare($sql);
        $query->execute($params);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}

