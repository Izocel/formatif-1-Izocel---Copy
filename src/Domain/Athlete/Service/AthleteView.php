<?php

namespace App\Domain\Athlete\Service;

use App\Domain\Athlete\Repository\AthleteViewRepository;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use stdClass;

/**
 * Service.
 */
final class AthleteView
{
    /**
     * @var AthleteViewRepository
     */
    private $repository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * The constructor.
     *
     * @param AthleteViewRepository $repository The repository
     * @param LoggerFactory $logger The logger
     */
    public function __construct(AthleteViewRepository $repository, LoggerFactory $logger)
    {
        $this->repository = $repository;
        $this->logger = $logger
            ->addFileHandler('Transaction.log')
            ->createLogger("AthleteView");
    }

    /**
     * Affiche la liste de tous les athletes
     *
     * @return array Un tableau de tous les athletes
     */
    public function viewAthlete(object $rqstObj): array
    {
        if($rqstObj->atts->id){
            $athletes = $this->repository->selectAthlete($rqstObj->atts->id);
        }
        else {
            $athletes = $this->repository->selectAllAthlete();
        }
        $this->logger->info("Ce n'est surtout pas un exemple de comment logger un message. LOL");

        return $athletes;
    }
}
