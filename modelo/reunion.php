<?php 

conectar();

class Reunion{
    
    private $id;
    private $topic;
    private $dates; 
    private $hours;   
    private $userid;
    private $campaignid; 
   
    
 function __construct($id=0,$topic="",$dates="",$hours="",$userid="",$campaignid=""){
 $this->id = $id;
 $this->topic = $topic;
 $this->dates = $dates;
 $this->hours = $hours; 
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

    public function setHours($hours){
        $this->hours = $hours;
    }

    public function getHours($hours){
        return $this->hours;
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
        
        $query="INSERT INTO reunions (reunion_id,topic,dates,hours,user_id,campaign_id,estado)
                VALUES(0,
                       '".$this->topic."',
                       '".$this->dates."',
                       '".$this->hours."',
                       '".$this->userid."',
                       '".$this->campaignid."',1);";
        $guardar=ejecutar($query)  or die (mysqli_error());
       
        return $guardar;

    }

     public function actualizar(){
      
        $query="UPDATE reunions SET topic='".$this->topic."',dates='".$this->dates."',hours='".$this->hours."',campaign_id='".$this->campaignid."' where reunion_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        
        return $actualizar;

    }

    public function eliminar(){
     
        $query="UPDATE reunions SET estado = '0' where reunion_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
        
        return $eliminar;

    }

    public function reunionporusuario(){
       
        $query="SELECT r.reunion_id,r.topic,DATE_FORMAT(r.dates, '%d-%m-%Y'),r.hours,c.title,r.dates from reunions r inner join campaigns c on r.campaign_id=c.campaign_id where r.user_id='".$this->userid."' and r.estado = 1 and c.estado = 1 " ;        
        $tabla=ejecutar($query);        
        
        return $tabla;

    }

    public function reunionporcampania(){
 
        $query="SELECT r.reunion_id,r.topic,DATE_FORMAT(r.dates, '%d-%m-%Y') as datees,r.hours,c.title,u.firstname,u.lastname,r.dates from reunions r inner join campaigns c on r.campaign_id=c.campaign_id inner join users u on u.user_id=r.user_id where c.campaign_id='".$this->campaignid."' and r.estado = 1 and c.estado=1" ;        
        $tabla=ejecutar($query);        
        
        return $tabla;

    }

    public function getReunionbyCod(){

         $query="SELECT r.reunion_id,r.topic,DATE_FORMAT(r.dates, '%d-%m-%Y'),r.hours,c.title,r.dates,c.campaign_id from reunions r inner join campaigns c on r.campaign_id=c.campaign_id where r.reunion_id='".$this->id."' and r.estado = 1 and c.estado = 1 " ;        
        $tabla=ejecutar($query);        
        
       $row=mysqli_fetch_array($tabla);
        
        return $row;


    }


    public function getReunionbyMonthandVol($vol,$mes){

        $query = "SELECT c.title,r.topic,r.dates,r.hours,r.user_id,u.firstname,u.lastname FROM reunions r inner join campaigns c on r.campaign_id=c.campaign_id inner join details_campaigns d on d.campaign_id=c.campaign_id inner join users u on u.user_id=r.user_id where d.user_id=$vol and MONTH(r.dates) = $mes and r.estado=1 and c.estado =1 and d.estado = 1 order by r.dates";
        $tabla = ejecutar($query);
        return $tabla;

    }

    public function getReunionbyFechayHora(){
        $query="SELECT * from reunions where dates='".$this->dates."' and hours='".$this->hours."' and user_id='".$this->userid."' and estado = 1" ;        
        $tabla=ejecutar($query);        
        
       //$row=mysqli_fetch_array($tabla);
        
        return $tabla;

    }

   
}



 ?>