<?php

namespace App\Domain\Resultat\Service;

use App\Domain\Resultat\Repository\ResultatViewRepository;
use App\Factory\LoggerFactory;
use App\Models\ResultatModel;
use Psr\Log\LoggerInterface;


/**
 * Service.
 */
final class ResultatView
{
    /**
     * @var ResultatViewRepository
     */
    private $repository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * The constructor.
     *
     * @param ResultatViewRepository $repository The repository
     * @param LoggerFactory $logger The logger
     */
    public function __construct(ResultatViewRepository $repository, LoggerFactory $logger)
    {
        $this->repository = $repository;
        $this->logger = $logger
            ->addFileHandler('Transaction.log')
            ->createLogger("ResultatView");
    }

    /**
     * Affiche la liste de tous les resultats
     *
     * @return array Un tableau de tous les resultats
     */
    public function addResultat(object $rqstObj): array
    {
        if($rqstObj->body){
            //Construit le model resultat avec le body...
            $modelResultat = new ResultatModel();
            $modelResultat->fromBody($rqstObj->body);

            if($modelResultat->validate() == false) return [];

            $resultats = $this->repository->insertResultat($modelResultat);
        }
        $this->logger->info("Ce n'est surtout pas un exemple de comment logger un message. LOL");

        return $resultats;
    }
    
     /**
     * Affiche la liste de tous les resultats
     *
     * @return array Un tableau de tous les resultats
     */
    public function selectResultat(object $rqstObj): array
    {
        if($rqstObj->body){
            //Construit le model querry avec le body...


            // if($modelResultat->validate() == false) return [];

            $resultats = $this->repository->selectAllResultat($rqstObj->body);
        }
        $resultats = $this->repository->SelectResultat($rqstObj->atts->id);

        $this->logger->info("Ce n'est surtout pas un exemple de comment logger un message. LOL");

        return $resultats;
    }
}
