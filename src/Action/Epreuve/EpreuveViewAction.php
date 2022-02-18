<?php

namespace App\Action\Epreuve;

use App\Domain\Epreuve\Service\EpreuveView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class EpreuveViewAction
{
    private $epreuveView;

    public function __construct(EpreuveView $epreuveView)
    {
        $this->epreuveView = $epreuveView;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        $epreuves = $this->epreuveView->viewEpreuve();

        $response->getBody()->write((string)json_encode($epreuves));

        return $response->withHeader('Content-Type', 'application/json');
    }
}
