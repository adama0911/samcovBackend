<?php

namespace App\Models;



class AdminModel {
	private $_db = null;

  	public function __construct($db){
  		$this->_db = $db;
  	}

    public function getPatients(){
        $patients = array();
        $q = $this->_db->query('SELECT p.* FROM patient p');
        while( $patient = $q->fetch() ){
            $patients[] = $patient;
        }
        $q->closeCursor();
        return $patients;
    }

    public function getsymptoms(){
        $patients = array();
        $q = $this->_db->query('SELECT s.*,p.* FROM symptomes s , patient p where p.id=s.id_patient');
        while( $patient = $q->fetch() ){
            $patients[] = $patient;
        }
        $q->closeCursor();
        return $patients;
    }

    public function inscription($syntomesEntourage,$heur,$date,$code,$nom,$prenom,$sexe,$naissance,
    $telephone,$ville,$niveaucascontact,$region,$quartier,$district,$matrimanial,$nbrEnfants,
    $grossesse,$nbrPersChezVous,$nbrPersChambre,$TravallezVous,$domain,$scolarise,$dateContact,$lienAvecCove,
    $dateContactautorite,$contacter,$lieuxFrenquenter,$symtom,$autreMaladie,$medicaments){

      $q = $this->_db->prepare("INSERT INTO `patient`( `code`, `nom`, `prenom`, `sexe`, `naissance`, `telephone`, `ville`, `niveaucascontact`, `region`, `quartier`, `district`, `matrimanial`, `nbrEnfants`, `grossesse`, `nbrPersChezVous`,
      `nbrPersChambre`, `TravallezVous`, `domain`, `scolarise`, `dateContact`, `lienAvecCove`, `dateContactautorite`, `contacter`, `lieuxFrenquenter`, `symtom`, `autreMaladie`, `medicaments`, `heur`)
      VALUES (:code,:nom,:prenom,:sexe,:naissance,:telephone,:ville,:niveaucascontact,:region,:quartier,:district,:matrimanial,:nbrEnfants,:grossesse,:nbrPersChezVous,:nbrPersChambre,:TravallezVous,:domain,:scolarise,:dateContact,:lienAvecCove,:dateContactautorite,:contacter,:lieuxFrenquenter,:symtom,:autreMaladie,:medicaments,:heur)");
      $q->execute(array(':code'=>$code,":nom" =>$nom ,":prenom"=>$prenom,":sexe"=>$sexe,":naissance"=>$naissance,":telephone"=>$telephone,":ville"=>$ville,":niveaucascontact"=>$niveaucascontact,":region"=>$region,":quartier"=>$quartier,":district"=>$district,":matrimanial"=>$matrimanial,
      ":nbrEnfants"=>$nbrEnfants,":grossesse"=>$grossesse,":nbrPersChezVous"=>$nbrPersChezVous,":nbrPersChambre"=>$nbrPersChambre,":TravallezVous"=>$TravallezVous,":domain"=>$domain,":scolarise"=>$scolarise,":dateContact"=>$dateContact,":lienAvecCove"=>$lienAvecCove,":dateContactautorite"=>$dateContactautorite,
      ":contacter"=>$contacter,":lieuxFrenquenter"=>$lieuxFrenquenter,
      ":symtom"=>$symtom,":autreMaladie"=>$autreMaladie,":medicaments"=>$medicaments,":heur"=>$heur));
      return $this->_db->lastInsertId();
    }

    public function enregitrement($date,$heur,$syntomesEntourage,$id_patient, $temperature,$toux,$difresp,$Malgorge,$conjonctivite,$mauxTete,$nezbouche,$douleurmusculaire,
    $fatige,$vomi,$diarrhee,$perteOdora,$perteGout,$autreSigne){

      $q = $this->_db->prepare("INSERT INTO `symptomes`( `id_patient`, `temperature`, `toux`, `difresp`, `Malgorge`, `conjonctivite`, `mauxTete`, `nezbouche`, `douleurmusculaire`, `fatige`, `vomi`, `diarrhee`, `perteOdora`, `perteGout`, `autreSigne`, `syntomesEntourage`, `heur`, `date`)
      VALUES (:id_patient,:temperature,:toux,:difresp,:Malgorge,:conjonctivite,:mauxTete,:nezbouche,:douleurmusculaire,:fatige,:vomi,:diarrhee,:perteOdora,:perteGout,:autreSigne,:syntomesEntourage,:heur, :date)");
      $q->execute(array(':id_patient'=>$id_patient,":temperature" =>$temperature ,":toux"=>$toux,":difresp"=>$difresp,":Malgorge"=>$Malgorge,":conjonctivite"=>$conjonctivite,":mauxTete"=>$mauxTete,":nezbouche"=>$nezbouche,":douleurmusculaire"=>$douleurmusculaire,":fatige"=>$fatige,":vomi"=>$vomi,":diarrhee"=>$diarrhee,
      ":perteOdora"=>$perteOdora,":perteGout"=>$perteGout,":autreSigne"=>$autreSigne,":syntomesEntourage"=>$syntomesEntourage,":heur"=>$heur,":date"=>$date));
      return $this->_db->lastInsertId();
    }

}
