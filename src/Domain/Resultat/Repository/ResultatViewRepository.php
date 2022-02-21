<?php

namespace App\Domain\Resultat\Repository;

use App\Models\ResultatModel;
use PDO;

/**
 * Repository.
 */
class ResultatViewRepository
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
     * Insertion d'un resultat
     */
    public function insertResultat(ResultatModel $model): array
    {
        //TODO: validation du model

        $ath_id = $model->athlete_id ?? 0;
        $epr_id = $model->epreuve_id ?? 0;
        $resultat = $model->resultat_ms ?? 0;
        $sqlDate = $model->date_resultat ?? "";

        $params = [
            "a" => $ath_id,
            "b" => $epr_id,
            "c" => $resultat,
            "d" => $sqlDate
        ];


        $sql = "INSERT INTO resultats(athlete_id,epreuve_id,resultat_ms,date_resultat)
        VALUES (:a,:b,:c,:d)";

        $query = $this->connection->prepare($sql);
        $query->execute($params);

        $lastId = (int)$this->connection->lastInsertId ?? 0;
        $result = $this->selectResultat($lastId);
        return $result;
    }

    /**
     * Sélection de tous les resultat
     */
    public function selectAllResultat(): array
    {
        $sql = "SELECT * FROM resultats";

        $query = $this->connection->prepare($sql);
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Sélection d'un resultat selon son id
     */
    public function selectResultat(int $id): array
    {

        $id = (int)$id ?? 0;
        
        $params = [ "id" => $id];
        
        $sql = "SELECT * FROM resultats WHERE id = :id";

        $query = $this->connection->prepare($sql);
        $query->execute($params);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}

