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
     * POST         Insertion d'un résultats
     * 
     */
    $app->group('/resultats', function (RouteCollectorProxy $group) {
        $group->post('', \App\Action\Epreuve\EpreuveViewAction::class);
    });

    /**
     * /id    PUT     Modification d'un athlete
     * 
     */
    $app->group('/athletes', function (RouteCollectorProxy $group) {
        $group->put('/{id:[0-9]+}', \App\Action\Epreuve\EpreuveViewAction::class);
    });
};

