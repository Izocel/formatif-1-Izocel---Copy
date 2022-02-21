<?php

namespace App\Action\Athlete;

use App\Domain\Athlete\Service\AthleteView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use stdClass;

final class AthleteViewAction
{
    private $athleteView;

    public function __construct(AthleteView $athleteView)
    {
        $this->athleteView = $athleteView;
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
        
        $athletes = $this->athleteView->viewAthlete($rqstObj);
        $response->getBody()->write((string)json_encode($athletes));

        return $response->withHeader('Content-Type', 'application/json');
    }
}
