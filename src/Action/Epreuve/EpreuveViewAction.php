<?php

namespace App\Action\Epreuve;

use App\Domain\Epreuve\Service\EpreuveView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use stdClass;

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

        $rqstObj = new stdClass;
        $possibleAtts = ['id'];

        $rqstObj->body = $request->getParsedBody();
        $rqstObj->params = $request->getQueryParams();

        foreach ($possibleAtts as $key => $value) {
            $rqstObj->atts->$value .= $request->getAttribute($value);
        }
        
        $epreuves = $this->epreuveView->viewEpreuve($rqstObj);
        $response->getBody()->write((string)json_encode($epreuves));

        return $response->withHeader('Content-Type', 'application/json');
    }
}
