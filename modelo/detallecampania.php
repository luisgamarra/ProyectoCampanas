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
       
        $query="SELECT c.title,c.place,c.start_date,c.end_date,c.imagen from details_campaigns d inner join campaigns c on d.campaign_id=c.campaign_id where d.user_id ='".$this->userid."' and c.estado = 1 " ;        
        $tabla=ejecutar($query);        
        
        return $tabla;

    }

    public function voluntariosporcampania(){
        
        $query = "SELECT u.firstname,u.lastname,u.email,u.cellphone,d.user_id from details_campaigns d inner join users u on d.user_id=u.user_id where d.campaign_id = '".$this->campaignid."'";
        $tabla = ejecutar($query);

        return $tabla;
    }
}
 ?>