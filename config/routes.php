<?php

use Slim\Routing\RouteCollectorProxy;
use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\Docs\SwaggerUiAction::class)->setName('home');

    // Documentation de l'api
    $app->get('/docs', \App\Action\Docs\SwaggerUiAction::class)->setName('docs');


    /**
     * /    GET     Sélection de toutes les épreuves + body(queryFilter)
     * /id  GET	    Selection d'une épreuve
     * 
     */
    $app->group('/epreuves', function (RouteCollectorProxy $group) {
        $group->get('', \App\Action\Epreuve\EpreuveViewAction::class);
        $group->get('/{id:[0-9]+}', \App\Action\Epreuve\EpreuveViewAction::class);
    });

    /**
     * /        GET     Sélection de tous les athlete + body(queryFilter)
     * /id      GET	    Selection d'un athlete
     * /id      PUT     Modification d'un athlete
     * 
     */
    $app->group('/athletes', function (RouteCollectorProxy $group) {
        $group->get('', \App\Action\Athlete\AthleteViewAction::class);
        $group->get('/{id:[0-9]+}', \App\Action\Athlete\AthleteViewAction::class);
        $group->put('/{id:[0-9]+}', \App\Action\Athlete\AthleteViewAction::class);
    });

    
    /**
     * POST         Insertion d'un résultats
     */
    $app->group('/resultats', function (RouteCollectorProxy $group) {
        $group->get('', \App\Action\Resultat\ResultatViewAction::class);
        $group->get('/{id:[0-9]+}', \App\Action\Resultat\ResultatViewAction::class);
        $group->post('', \App\Action\Resultat\ResultatAddAction::class);
    });
};

