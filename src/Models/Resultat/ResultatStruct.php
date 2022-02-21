<?php

namespace App\Models;

use stdClass;

//struct ResultatModel
class ResultatModel {
    public int $athlete_id = 0;
    public int $epreuve_id = 0;
    public int $resultat_ms = 0;
    public string $date_resultat = "1900-01-01";

    public function __invoke()
    {
        
    }

    public function __construct()
    {
        
    }
     
    public function fromBody(stdClass $rqstBody)
    {
        $this->athlete_id = $rqstBody->athlete_id ?? 0;
        $this->epreuve_id = $rqstBody->epreuve_id ?? 0;
        $this->resultat_ms = $rqstBody->resultat_ms ?? 0;
        $this->date_resultat = $rqstBody->date_resultat ?? "1900-01-01";
        
    }

    public function validate():bool {
        if (strlen($this->date_resultat) < 10) return false;
        if( $this->athlete_id * $this->epreuve_id *  $this->resultat_ms == 0) 
            return false;


        return true;
    }
}
