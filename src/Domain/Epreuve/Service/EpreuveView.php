<?php

namespace App\Domain\Epreuve\Service;

use App\Domain\Epreuve\Repository\EpreuveViewRepository;
use App\Factory\LoggerFactory;
use Psr\Log\LoggerInterface;
use stdClass;

/**
 * Service.
 */
final class EpreuveView
{
    /**
     * @var EpreuveViewRepository
     */
    private $repository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * The constructor.
     *
     * @param EpreuveViewRepository $repository The repository
     * @param LoggerFactory $logger The logger
     */
    public function __construct(EpreuveViewRepository $repository, LoggerFactory $logger)
    {
        $this->repository = $repository;
        $this->logger = $logger
            ->addFileHandler('Transaction.log')
            ->createLogger("EpreuveView");
    }

    /**
     * Affiche la liste de toutes les épreuves
     *
     * @return array Un tableau de toutes les épreuves
     */
    public function viewEpreuve(object $rqstObj): array
    {
        if($rqstObj->atts->id){
            $epreuves = $this->repository->selectEpreuve($rqstObj->atts->id);
        }
        else {
            $epreuves = $this->repository->selectAllEpreuve();
        }
        $this->logger->info("Ce n'est surtout pas un exemple de comment logger un message. LOL");

        return $epreuves;
    }
}
