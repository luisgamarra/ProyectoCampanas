<?php 

conectar();

class Reunion{
    
    private $id;
    private $topic;
    private $dates;    
    private $userid;
    private $campaignid; 
   
    
 function __construct($id=0,$topic="",$dates="",$userid="",$campaignid=""){
 $this->id = $id;
 $this->topic = $topic;
 $this->dates = $dates; 
 $this->userid = $userid; 
 $this->campaignid = $campaignid;
 }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getId($id){
        return $this->id;
    }

    public function setTopic($topic){
        $this->topic = $topic;
    }

    public function getTopic($topic){
        return $this->topic;
    }

    public function setDates($dates){
        $this->dates = $dates;
    }

    public function getDates($dates){
        return $this->place;
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

    public function guardar(){
        
        $query="INSERT INTO reunions (reunion_id,topic,dates,user_id,campaign_id,estado)
                VALUES(0,
                       '".$this->topic."',
                       '".$this->dates."',
                       '".$this->userid."',
                       '".$this->campaignid."',1);";
        $guardar=ejecutar($query)  or die (mysqli_error());
       
        return $guardar;

    }

     public function actualizar(){
        conectar();
        $query="UPDATE reunions SET topic='".$this->topic."',dates='".$this->dates."' where reunion_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        
        return $actualizar;

    }

    public function eliminar(){
        conectar();
        $query="UPDATE reunions SET estado = '0' where reunion_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
        
        return $eliminar;

    }

    public function reunionporusuario(){
        conectar();
        $query="SELECT r.reunion_id,r.topic,r.dates,c.title from reunions r inner join campaigns c on r.campaign_id=c.campaign_id where r.user_id='".$this->userid."' and r.estado = 1 " ;        
        $tabla=ejecutar($query);        
        
        return $tabla;

    }
/**
     public function campanias(){
        conectar();
        $query="SELECT * from campaigns where estado = 1 " ;        
        $tabla=ejecutar($query);
        
        //$this->db()->error;
        return $tabla;

    }**/
   
}



 ?>