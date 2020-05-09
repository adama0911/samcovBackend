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
        $params = json_decode($data['reqestParam']);
        $patient = $params->patient;
        $patientEnquete = $params->patientEnquete;

       $heur = $patient->datenaissace;
       $date = "2020-05-20 13:34:30";
       $code = $patient->code;;
       $nom =  $patient->nom;
       $prenom =  $patient->prenom;;
       $sexe =  $patient->sexe;
       $naissance =  $patient->datenaissace;
       $telephone = $patient->telephone;
       $ville = $patient->ville;
       $niveaucascontact =  $patient->datenaissace;;
       $region =  $patient->region;
       $quartier =  $patient->quartier;
       $district =  $patient->district;
       $matrimanial =  $patient->statutMatrimoniale;
       $nbrEnfants =  intval($patient->nombreEnfant);
       $grossesse = $patient->grossesse;
       $nbrPersChezVous = intval($patient->nombrePersonneChezVous);
       $nbrPersChambre =  intval($patient->nombrePersonneDansChambre);
       $TravallezVous =  $patient->travaillezVous;
       $domain = $patient->domaine;
       $scolarise = $patient->scolarise;
       $dateContact = $patient->dateContact;;
       $lienAvecCove =  $patientEnquete->lien;;
       $dateContactautorite =  $patientEnquete->dataContactSanitaire;;
       $contacter =  $patient->datenaissace;;
       $lieuxFrenquenter =  $patientEnquete->lieux;;
       $symtom = json_encode($patientEnquete->symptome);
       $autreMaladie = $patientEnquete->autremaladie;
       $medicaments =  $patientEnquete->listeMedicament;;
       $repondant = $patient->repondant;

       $nombrePersonneEnContact = $patientEnquete->$nombrePersonneEnContact;
       $cardiaque = $patientEnquete->cardiaque;

       $adminModel = new AdminModel($this->db);
       $reponse = $adminModel->inscription($repondant,$syntomesEntourage,$heur,$date,$code,$nom,$prenom,$sexe,$naissance,
       $telephone,$ville,$niveaucascontact,$region,$quartier,$district,$matrimanial,$nbrEnfants,
       $grossesse,$nbrPersChezVous,$nbrPersChambre,$TravallezVous,$domain,$scolarise,$dateContact,$lienAvecCove,
       $dateContactautorite,$contacter,$lieuxFrenquenter,$symtom,$autreMaladie,$medicaments,$nombrePersonneEnContact , $cardiaque);

       // $id_patient = $reponse;
       //
       // $reponse = $adminModel->enregitrement($date,$heur,$syntomesEntourage,$id_patient, $temperature,$toux,$difresp,$Malgorge,$conjonctivite,$mauxTete,$nezbouche,$douleurmusculaire,
       // $fatige,$vomi,$diarrhee,$perteOdora,$perteGout,$autreSigne);

        return $response->withJson(array("reponse", $reponse));
    }


    public function enregitrement(Request $request, Response $response, $args){
        header("Access-Control-Allow-Origin: *");
        $data = $request->getParsedBody();
        $params = json_decode($data['reqestParam']);

        // $adminModel = new AdminModel($this->db);
        // $reponse = $adminModel->getPatients();
       $temperature =  intval($params->temperature);
       $toux = $params->toux;
       $difresp = $params->difficulteRespirer;
       $Malgorge =  $params->malGorge;
       $conjonctivite = $params->conjonctivite;
       $mauxTete = $params->mauxtete;
       $nezbouche = $params->nezBouche;
       $douleurmusculaire = $params->douleurMusculaire;
       $fatige = $params->fatigueintense;
       $vomi = $params->vomissement;
       $diarrhee = $params->diarrhee;
       $perteOdora = $params->perteOdorat;
       $perteGout = $params->perteGout;
       $autreSigne = $params->autreSigne;
       $syntomesEntourage = $params->signeEntouragevalue;
       $code_patient = $params->code;
       $heur = $params->moment;
       $date = "2020-05-20 13:34:30";

       $adminModel = new AdminModel($this->db);
       $reponse = $adminModel->enregitrement($date,$heur,$syntomesEntourage,$code_patient, $temperature,$toux,$difresp,$Malgorge,$conjonctivite,$mauxTete,$nezbouche,$douleurmusculaire,
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
