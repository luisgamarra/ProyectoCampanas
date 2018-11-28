<?php 
require_once('../db/conexion.php');
conectar();

class Donacion{
    
    private $id;    
    private $description;
    private $quantility; 
    private $userid;
    private $campaignid; 
    private $catdon;
   
    
 function __construct($id=0,$description="",$quantility="",$userid="",$campaignid="",$catdon=""){
 $this->id = $id; 
 $this->description = $description;
 $this->quantility = $quantility; 
 $this->userid = $userid; 
 $this->campaignid = $campaignid;
 $this->catdon = $catdon;
 }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getId($id){
        return $this->id;
    }  

    public function setDescription($description){
        $this->description = $description;
    }

    public function getDescription($description){
        return $this->description;
    } 

    public function setQuantility($quantility){
        $this->quantility = $quantility;
    }

    public function getQuantility($quantility){
        return $this->quantility;
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

    public function setCatdon($catdon){
        $this->catdon = $catdon;
    }

    public function getCatdon($catdon){
        return $this->catdon;
    }

    public function Guardar(){
       date_default_timezone_set("America/Lima");
        $a=date('Y/m/d');

        $query="INSERT INTO donations (donation_id,description,quantility,user_id,campaign_id,catdon_id,fecha,estado)
                VALUES(0,                       
                       '".$this->description."',
                       '".$this->quantility."',
                       '".$this->userid."',
                       '".$this->campaignid."',
                       '".$this->catdon."',
                       '$a',1);";
        $guardar=ejecutar($query) or die (mysqli_error());
        
        return $guardar;

    }

     public function actualizar(){
        
        $query="UPDATE donations SET description='".$this->description."',quantility='".$this->quantility."',user_id='".$this->userid."',campaign_id='".$this->campaignid."',catdon_id='".$this->catdon."' where donation_id='".$this->id."' ";
        $actualizar=ejecutar($query) or die (mysqli_error());
        
        return $actualizar;

    }

    public function eliminar(){
        
        $query="UPDATE donations SET estado = '0' where donation_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
       
        return $eliminar;

    }

   public function donacionesporcampania(){
        
        $query="SELECT d.donation_id,u.firstname,u.lastname,d.description,d.quantility,d.catdon_id from donations d inner join users u on d.user_id=u.user_id where d.campaign_id = '".$this->campaignid."' and d.estado=1";    
        $tabla=ejecutar($query);
        
        return $tabla;

    }

    public function donacionporvoluntario(){

        $query="SELECT d.donation_id, u.firstname,u.lastname,d.description,d.quantility,d.catdon_id from donations d inner join users u on d.user_id=u.user_id where d.campaign_id = '".$this->campaignid."' and d.user_id ='".$this->userid."' and d.estado=1";    
        $tabla=ejecutar($query);
        
        return $tabla;
    }

    public function getDonacionbycod(){

        $query="SELECT d.donation_id,d.user_id,d.campaign_id,c.title,u.firstname,u.lastname,d.description,d.quantility,ca.catdon_id,ca.descripcion from donations d inner join users u on d.user_id=u.user_id inner join campaigns c on d.campaign_id=c.campaign_id inner join categoria_donacion ca on d.catdon_id=ca.catdon_id where d.donation_id = '".$this->id."' and d.estado=1";    
        $tabla=ejecutar($query);
        $row = mysqli_fetch_array($tabla);
        return $row;
    }

    public function donxvol(){
            $query="SELECT d.donation_id, u.firstname,u.lastname,d.description,d.quantility,c.title from donations d inner join users u on d.user_id=u.user_id inner join campaigns c on d.campaign_id=c.campaign_id where d.user_id = '".$this->userid."' and d.estado=1 order by d.donation_id DESC";    
        $tabla=ejecutar($query);
        
        return $tabla;

    }
 
   
}



 ?>