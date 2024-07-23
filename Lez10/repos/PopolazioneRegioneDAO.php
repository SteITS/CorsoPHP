<?php
include_once '../model/PopolazioneRegione.php';
include_once '../repos/Connessione.php';

class PopolazioneDAO{
    private $connessione;
    private $conn;
    public function __construct() {
        $this->connessione = new Connessione();
        $this->conn = $this->connessione->getConn();
    }

        public function getPaesi(){
    
            $query = "SELECT * FROM popolazione_italiana_regione";
    
            $resultSet = $this->conn->query($query);
    
            $resultSet->setFetchMode(PDO::FETCH_CLASS, 'PopolazioneRegione');
    
            $popolo = [];
    
            while ($record = $resultSet->fetch()) {
               $popolo[]=$record;
    
            return $popolo;
    
    
            }
    
        }
        public function getRegioni(){

            $query = "select distinct regione from popolazione_italiana_regione order by regione";

            $resultSet = $this->conn->query($query);

            $resultSet->setFetchMode(PDO::FETCH_ASSOC);

            $popolo = [];

            while ($record = $resultSet->fetch()) {
                $popolo[]=$record["regione"]; 
            }

            return $popolo;



        }

        public function getComuniByRegione($regione){

            $query = "SELECT comune FROM popolazione_italiana_regione where regione like :regione order by comune";

            $resultSet = $this->conn->prepare($query);
            
            $resultSet->bindParam(":regione",$regione,PDO::PARAM_STR);

            $resultSet->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet->execute();

            $popolo = [];

            while ($record = $resultSet->fetch()) {
            $popolo[]=$record["comune"]; 
            }

            return $popolo;



        }
        

        public function getComune($comune){

            $query = "SELECT * FROM popolazione_italiana_regione where comune like :comune";

            $resultSet = $this->conn->prepare($query);

            $resultSet->bindParam(":comune",$comune,PDO::PARAM_STR);

            $resultSet->setFetchMode(PDO::FETCH_CLASS,"PopolazioneRegione");

            $resultSet->execute();


            return $resultSet->fetch();



        }


}
    

?>