<?php 
conectar();

class Testimonio
{	
	private $id;
    private $description;    
    private $userid;
    
   
    
 function __construct($id=0,$description="",$userid=""){
 $this->id = $id;
 $this->description = $description; 
 $this->userid = $userid; 
 
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
    
    public function setUserid($userid){
    	$this->userid = $userid;
    }

    public function getUserid($userid){
    	return $this->userid;
    }  

    public function guardar(){
        
        $query="INSERT INTO testimonios (testimonio_id,descripcion,user_id,estado)
                VALUES(0,
                       '".$this->description."',                      
                       '".$this->userid."',                    
                       1);";
        $guardar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $guardar;

 	}

     public function actualizar(){
       
        $query="UPDATE testimonios SET descripcion='".$this->description."' where testimonio_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        
        return $actualizar;

    }

public function eliminar(){
        
        $query="UPDATE testimonios SET estado = '0' where testimonio_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
        
        return $eliminar;

    }



     public function listartestimonios(){
        
        $query="SELECT t.testimonio_id,t.descripcion,u.firstname,u.lastname,u.photo,t.user_id from testimonios t inner join users u on t.user_id=u.user_id where t.estado=1 order by t.testimonio_id DESC limit 9 " ;       
        $tabla=ejecutar($query);        
       
        return $tabla;

    }

    public function buscartestimonio($palabra){
    $query = "SELECT t.testimonio_id,t.descripcion,u.firstname,u.lastname,u.photo,t.user_id from testimonios t inner join users u on t.user_id=u.user_id where t.estado=1 and u.firstname like '%".$palabra."%' " ;  
         
        $tabla = ejecutar($query);

        return $tabla;
    }

       
   
}



 ?>