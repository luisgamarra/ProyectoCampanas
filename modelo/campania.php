<?php 

/**
 * 
 */
class Campania
{
	
	private $id;
    private $title;
    private $place;    
    private $vacant;
    private $fecha;
    private $image;
    private $userid;
   
    
 function __construct($id=0,$title="",$place="",$vacant="",$fecha="",$image="",$userid=""){
 $this->id = $id;
 $this->title = $title;
 $this->place = $place;
 $this->vacant = $vacant;
 $this->image = $image;
 $this->userid = $userid; 
 }
    
    public function setId($id){
    	$this->id = $id;
    }

    public function getId($id){
    	return $this->id;
    }

    public function setTitle($title){
    	$this->title = $title;
    }

    public function getTitle($title){
        return $this->title;
    }

    public function setPlace($place){
    	$this->place = $place;
    }

    public function getPlace($place){
    	return $this->place;
    }

    public function setVacant($vacant){
        $this->vacant = $vacant;
    }

    public function getVacant($vacant){
        return $this->vacant;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getFecha($fecha){
        return $this->fecha;
    }

    public function setImage($image){
        $this->image = $image;
    }
    public function getImage($image){
        return $this->image;
    }

    public function setUserid($userid){
    	$this->userid = $userid;
    }

    public function getUserid($userid){
    	return $this->userid;
    }

    public function Guardar(){
        conectar();
        $query="INSERT INTO campaigns (campaign_id,title,place,vacant,dates,imagen,user_id,estado)
                VALUES(0,
                       '".$this->title."',
                       '".$this->place."',
                       '".$this->vacant."',
                       '".$this->fecha."',
                       '".$this->image."',
                       '".$this->userid."',1);";
        $guardar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $guardar;

 	}

     public function actualizar(){
        conectar();
        $query="UPDATE campaigns SET title='".$this->title."', place='".$this->place."',vacant='".$this->vacant."' where campaign_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $actualizar;

    }

    public function eliminar(){
        conectar();
        $query="UPDATE campaigns SET estado = '0' where campaign_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $eliminar;

    }

    public function campaniaporusuario(){
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

    }
   
}



 ?>