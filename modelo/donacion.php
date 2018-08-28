<?php 

/**
 * 
 */
class Donacion{
    
    private $id;
    private $category;
    private $name;    
    private $description;
    private $quantility; 
    private $userid;
    private $campaignid; 
   
    
 function __construct($id=0,$category="",$name="",$description="",$quantility="",$userid="",$campaignid=""){
 $this->id = $id;
 $this->category = $category;
 $this->name = $name; 
 $this->description = $description;
 $this->quantility = $quantility; 
 $this->userid = $userid; 
 $this->campaignid = $campaignid;
 }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getId($id){
        return $this->id;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function getCategory($category){
        return $this->category;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName($name){
        return $this->name;
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

    public function Guardar(){
        conectar();
        $query="INSERT INTO donations (donation_id,category,name,description,quantility,user_id,campaign_id,estado)
                VALUES(0,
                       '".$this->category."',
                       '".$this->name."',
                       '".$this->description."',
                       '".$this->quantility."',
                       '".$this->userid."',
                       '".$this->campaignid."',1);";
        $guardar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $guardar;

    }

     public function actualizar(){
        conectar();
        $query="UPDATE donations SET category='".$this->category."',name='".$this->name."',description='".$this->description."',
        quantility='".$this->quantility."' where donation_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $actualizar;

    }

    public function eliminar(){
        conectar();
        $query="UPDATE donations SET estado = '0' where donation_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $eliminar;

    }

    /**public function campaniaporusuario(){
        conectar();
        $query="SELECT * from campaigns where user_id='".$this->id."' and estado = 1 " ;        
        $tabla=ejecutar($query);
        
        //$this->db()->error;
        return $tabla;

    }

     public function campanias(){
        conectar();
        $query="SELECT * from campaigns where estado = 1 " ;        
        $tabla=ejecutar($query);
        
        //$this->db()->error;
        return $tabla;

    }**/
   
}



 ?>