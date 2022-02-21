<?php

namespace App\Action\Resultat;

use App\Domain\Resultat\Service\ResultatView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use stdClass;

final class ResultatViewAction
{
    private $resultatView;

    public function __construct(ResultatView $resultatView)
    {
        $this->resultatView = $resultatView;
    }

    public function __invoke(
        ServerRequestInterface $request, 
        ResponseInterface $response
    ): ResponseInterface {

        $rqstObj = new stdClass;
        $possibleAtts = [];

        $rqstObj->body = (object)$request->getParsedBody();
        $rqstObj->params = $request->getQueryParams();

        foreach ($possibleAtts as $key => $value) {
            $rqstObj->atts->$value .= $request->getAttribute($value);
        }
        
        $resultats = $this->resultatView->selectResultat($rqstObj);
        $response->getBody()->write((string)json_encode($resultats));

        return $response->withHeader('Content-Type', 'application/json');
    }
}
