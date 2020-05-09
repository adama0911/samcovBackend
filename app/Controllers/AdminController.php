<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use \App\Controller;

use \App\Models\AdminModel;


class AdminController extends Controller {

  	public function home(Request $request, Response $response, $args){
        header("Access-Control-Allow-Origin: *");
        return $response->withJson(array("message", "WELCOME"));

        // data = $request->getParsedBody();
        // $params = json_decode($data['id']);
        // return $response->withJson(array("id", $params));
    }

    public function inscription(Request $request, Response $response, $args){
        header("Access-Control-Allow-Origin: *");
        $data = $request->getParsedBody();
        //$params = json_decode($data);

        // $adminModel = new AdminModel($this->db);
        // $reponse = $adminModel->getPatients();
       $temperature =  intval("36");
       $toux = "oui";
       $difresp = "non";
       $Malgorge =  "non";
       $conjonctivite = "non";
       $mauxTete = "non";
       $nezbouche = "non";
       $douleurmusculaire = "non";
       $fatige = "non";
       $vomi = "non";
       $diarrhee = "non";
       $perteOdora = "non";
       $perteGout = "non";
       $autreSigne = "non";

       $id_patient = 1;

       $syntomesEntourage = "non";
       $heur = "matin";
       $date = "2020-05-20 13:34:30";
       $code = "5456465465";
       $nom =  "mbaye";
       $prenom =  "moustafa";
       $sexe =  "homme";
       $naissance =  "2016-01-13";
       $telephone = "776542312";
       $ville = "Dakar";
       $niveaucascontact =  "niveaucascontact";
       $region =  "Dakar";
       $quartier =  "Yoff";
       $district =  "Foire";
       $matrimanial =  "marié";
       $nbrEnfants =  intval("2");
       $grossesse = "non";
       $nbrPersChezVous = intval("5");
       $nbrPersChambre =  intval("2");
       $TravallezVous =  "oui";
       $domain = "santé";
       $scolarise = "oui";
       $dateContact = "2020-01-16";
       $lienAvecCove =  "";
       $dateContactautorite =  "2020-01-23";
       $contacter =  "oui";
       $lieuxFrenquenter =  "Grand Yoff";
       $symtom = "fievre, toux";
       $autreMaladie = "rhume";
       $medicaments =  "paracetamole";

       $adminModel = new AdminModel($this->db);
       $reponse = $adminModel->inscription($syntomesEntourage,$heur,$date,$code,$nom,$prenom,$sexe,$naissance,
       $telephone,$ville,$niveaucascontact,$region,$quartier,$district,$matrimanial,$nbrEnfants,
       $grossesse,$nbrPersChezVous,$nbrPersChambre,$TravallezVous,$domain,$scolarise,$dateContact,$lienAvecCove,
       $dateContactautorite,$contacter,$lieuxFrenquenter,$symtom,$autreMaladie,$medicaments);

       // $id_patient = $reponse;
       //
       // $reponse = $adminModel->enregitrement($date,$heur,$syntomesEntourage,$id_patient, $temperature,$toux,$difresp,$Malgorge,$conjonctivite,$mauxTete,$nezbouche,$douleurmusculaire,
       // $fatige,$vomi,$diarrhee,$perteOdora,$perteGout,$autreSigne);

        return $response->withJson(array("reponse", $reponse));
    }


    public function enregitrement(Request $request, Response $response, $args){
        header("Access-Control-Allow-Origin: *");
        $data = $request->getParsedBody();
        //$params = json_decode($data);

        // $adminModel = new AdminModel($this->db);
        // $reponse = $adminModel->getPatients();
       $temperature =  intval("36");
       $toux = "oui";
       $difresp = "non";
       $Malgorge =  "non";
       $conjonctivite = "non";
       $mauxTete = "non";
       $nezbouche = "non";
       $douleurmusculaire = "non";
       $fatige = "non";
       $vomi = "non";
       $diarrhee = "non";
       $perteOdora = "non";
       $perteGout = "non";
       $autreSigne = "non";
       $syntomesEntourage = "non";
       $id_patient = 1;
       $heur = "matin";
       $date = "2020-05-20 13:34:30";

       $adminModel = new AdminModel($this->db);
       $reponse = $adminModel->enregitrement($date,$heur,$syntomesEntourage,$id_patient, $temperature,$toux,$difresp,$Malgorge,$conjonctivite,$mauxTete,$nezbouche,$douleurmusculaire,
       $fatige,$vomi,$diarrhee,$perteOdora,$perteGout,$autreSigne);

        return $response->withJson(array("reponse", $reponse));
    }



    public function getPatients(Request $request, Response $response, $args){
        header("Access-Control-Allow-Origin: *");
        $adminModel = new AdminModel($this->db);
        $reponse = $adminModel->getPatients();
        // data = $request->getParsedBody();
        // $params = json_decode($data['id']);
        return $response->withJson(array("reponse", $reponse));
    }

    public function getPatientsSymptomes(Request $request, Response $response, $args){
        header("Access-Control-Allow-Origin: *");
        $adminModel = new AdminModel($this->db);
        $reponse = $adminModel->getsymptoms();
        // data = $request->getParsedBody();
        // $params = json_decode($data['id']);
        return $response->withJson(array("reponse", $reponse));
    }
}
