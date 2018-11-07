<?php 
conectar();

class Notificacion
{	
	private $id;
    private $description;    
    private $userid;
    private $para;
    
   
    
 function __construct($id=0,$description="",$userid="",$para=""){
 $this->id = $id;
 $this->description = $description; 
 $this->userid = $userid; 
 $this->para = $para;
 
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

     public function setPara($para){
        $this->para = $para;
    }

    public function getPara($para){
        return $this->para;
    } 

    public function insertar(){
        
        $query="INSERT INTO notificaciones (notificacion_id,descripcion,fecha,user_id,para,visto,estado)
                VALUES(0,
                       '".$this->description."',
                       NOW(),                      
                       '".$this->userid."',
                       '".$this->para."',
                       0,                    
                       1);";
        $guardar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $guardar;

 	}

/**     public function actualizar(){
       
        $query="UPDATE comentarios SET description='".$this->description."' where comentario_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        
        return $actualizar;

    }

    public function eliminar(){
        
        $query="UPDATE comentarios SET estado = '0' where comentario_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
        
        return $eliminar;

    }
**/


     public function listarnotiporuser(){
        
        $query="SELECT n.notificacion_id,n.descripcion,n.fecha,u.firstname,u.lastname,u.photo from notificaciones n inner join users u on n.user_id=u.user_id where n.para = '".$this->para."' and n.estado=1 order by n.notificacion_id DESC" ;       
        $tabla=ejecutar($query);        
       
        return $tabla;

    }

    public function contarvistas(){

          $query="SELECT COUNT(visto) from notificaciones where para = '".$this->para."' and visto = 0" ;       
        $tabla=ejecutar($query);        
        $row = mysqli_fetch_array($tabla);
        return $row;
    }

        
   
}



 ?>