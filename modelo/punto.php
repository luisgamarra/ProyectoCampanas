<?php 

conectar();

class Punto{
    
    private $id;
    private $direccion;
    private $cx;    
    private $cy;
    private $campaignid; 
    private $userid;
   
    
 function __construct($id=0,$direccion="",$cx="",$cy="",$campaignid="",$userid=""){
 $this->id = $id;
 $this->direccion = $direccion;
 $this->cx = $cx; 
 $this->cy = $cy; 
 $this->campaignid = $campaignid;
 $this->userid = $userid;
 }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getId($id){
        return $this->id;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getDireccion($direccion){
        return $this->direccion;
    }

    public function setCx($cx){
        $this->cx = $cx;
    }

    public function getCx($cx){
        return $this->cx;
    }    

    public function setCy($cy){
        $this->cy = $cy;
    }

    public function getCy($cy){
        return $this->cy;
    }

    public function setCampaignid($campaignid){
        $this->campaignid = $campaignid;
    }

    public function getCampaignid($campaignid){
        return $this->campaignid;
    }

    public function setUserid($userid){
        $this->userid = $userid;
    }

    public function getUserid($userid){
        return $this->userid;
    }

    public function guardar(){
        
        $query="INSERT INTO points (point_id,direccion,cx,cy,campaign_id,user_id,estado)
                VALUES(0,
                       '".$this->direccion."',
                       '".$this->cx."',
                       '".$this->cy."',
                       '".$this->campaignid."',
                       '".$this->userid."',1);";
        $guardar=ejecutar($query)  or die (mysqli_error());
       
        return $guardar;

    }

     public function actualizar(){
      
        $query="UPDATE points SET direccion='".$this->direccion."',cx='".$this->cx."',cy='".$this->cy."',campaign_id='".$this->campaignid."' where point_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        
        return $actualizar;

    }

    public function eliminar(){
     
        $query="UPDATE points SET estado = '0' where point_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
        
        return $eliminar;

    }

   public function listarpuntos(){

   	$r = array();

   	$query = "select p.point_id,p.direccion,p.cx,p.cy,c.title from points p inner join campaigns c on p.campaign_id=c.campaign_id  where p.estado = 1 and p.user_id='".$this->userid."'";
   	$tabla = ejecutar($query) or die (mysqli_error());

   	while($fila = mysqli_fetch_assoc($tabla))
        {
            $r[] = $fila;
        }
        return $r;
   

   }

   public function puntosporcampania(){

    $query = "SELECT direccion,estado from points where campaign_id='".$this->campaignid."' and estado = 1";
    $tabla = ejecutar($query) or die (mysqli_error());
   

    return $tabla;

   }

   public function listarpuntosbyusercod(){

    $query = "select p.point_id,p.direccion,p.cx,p.cy,c.title,c.campaign_id from points p inner join campaigns c on p.campaign_id=c.campaign_id where p.user_id='".$this->userid."' and p.estado = 1";
    $tabla = ejecutar($query) or die (mysqli_error());
    return $tabla;



   }

   public function listarpuntosbycod(){

    $query = "select p.point_id,p.direccion,p.cx,p.cy,c.campaign_id,c.title from points p inner join campaigns c on p.campaign_id=c.campaign_id where p.point_id='".$this->id."' and p.estado = 1";
    $tabla = ejecutar($query) or die (mysqli_error());
    $row=mysqli_fetch_array($tabla);
    return $row;



   }



   
}



 ?>