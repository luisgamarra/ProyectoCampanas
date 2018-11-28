<?php 
conectar();

class Detallecampania
{
    
    private $id;    
    private $userid;
    private $campaignid;
   
    
 function __construct($id=0,$userid="",$campaignid=""){
 $this->id = $id; 
 $this->userid = $userid; 
 $this->campaignid = $campaignid;
 }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getId($id){
        return $this->id;
    }

    public function setUserid($userid){
        $this->userid = $userid;
    }

    public function getUserid($userid){
        return $this->userid;
    }

    public function setCampaignid($campaignid){
        $this->campaignid = $campaignid;
    }

    public function getCampaignid($campaignid){
        return $this->campaignid;
    }


    public function campaniasporvoluntario(){
       
        $query="SELECT c.title,c.place,DATE_FORMAT(c.start_date, '%d-%m-%Y') as inicio,DATE_FORMAT(c.end_date, '%d-%m-%Y') as final,c.imagen,c.campaign_id,d.detail_campaign_id,c.description,c.vacant,c.start_date,c.end_date from details_campaigns d inner join campaigns c on d.campaign_id=c.campaign_id where d.user_id ='".$this->userid."' and c.estado = 1 and d.estado = 1 order by start_date DESC" ;        
        $tabla=ejecutar($query);        
        
        return $tabla;

    }

    public function campaniasporvoluntariomfechafinal(){
       
        $query="SELECT c.title,c.place,DATE_FORMAT(c.start_date, '%d-%m-%Y') as inicio,DATE_FORMAT(c.end_date, '%d-%m-%Y') as final,c.imagen,c.campaign_id,d.detail_campaign_id,c.description,c.vacant,c.start_date,c.end_date from details_campaigns d inner join campaigns c on d.campaign_id=c.campaign_id where d.user_id ='".$this->userid."' and c.estado = 1  and c.start_date>CURDATE() and d.estado = 1 order by start_date DESC" ;        
        $tabla=ejecutar($query);        
        
        return $tabla;

    }

    public function voluntariosporcampania(){
        
        $query = "SELECT u.firstname,u.lastname,u.email,u.cellphone,d.user_id,d.detail_campaign_id from details_campaigns d inner join users u on d.user_id=u.user_id where d.campaign_id = '".$this->campaignid."' and d.estado = 1";
        $tabla = ejecutar($query);

        return $tabla;
    }

    public function unirsecampania(){
        $query="INSERT INTO details_campaigns (detail_campaign_id,campaign_id,user_id,estado)
                VALUES(0,                       
                       '".$this->campaignid."',                       
                       '".$this->userid."',1);";
        $guardar=ejecutar($query) or die (mysqli_error());
        
        return $guardar;
    }

    public function buscarporcampyvol(){
        $query = "SELECT * from details_campaigns where campaign_id = '".$this->campaignid."' and user_id = '".$this->userid."'";
        $tabla = ejecutar($query);

        return $tabla;
    }

    public function elivolysalcamp(){
        $query = "UPDATE details_campaigns set estado = 0 where detail_campaign_id = '".$this->id."'";
        $tabla = ejecutar($query);

        return $tabla;
    }

    public function GETcampaniasporvoluntario($palabra){
       
        $query="SELECT c.title,c.place,DATE_FORMAT(c.start_date, '%d-%m-%Y'),DATE_FORMAT(c.end_date, '%d-%m-%Y'),c.imagen,c.campaign_id,d.detail_campaign_id,c.description,c.vacant,c.start_date,c.end_date from details_campaigns d inner join campaigns c on d.campaign_id=c.campaign_id where d.user_id ='".$this->userid."' and c.estado = 1 and d.estado = 1 and c.title like '%".$palabra."%' order by start_date DESC"  ;         
        $tabla=ejecutar($query);        
        
        return $tabla;

    }
}
 ?>