<?php 
conectar();

class Foro
{	
	private $id;
    private $title;
    private $dates;
    private $userid;
   
    
 function __construct($id=0,$title="",$dates="",$userid=""){
 $this->id = $id;
 $this->title = $title;
 $this->dates = $dates;
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

    public function setDates($dates){
        $this->dates = $dates;
    }

    public function getDates($dates){
        return $this->dates;
    }
    

    public function setUserid($userid){
    	$this->userid = $userid;
    }

    public function getUserid($userid){
    	return $this->userid;
    }

    public function guardar(){
        
        $query="INSERT INTO foro (foro_id,title,fecha,user_id,estado)
                VALUES(0,
                       '".$this->title."',
                       CURDATE(),
                       '".$this->userid."',1);";
        $guardar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $guardar;

 	}

     public function actualizar(){
       
        $query="UPDATE foro SET title='".$this->title."' where foro_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        
        return $actualizar;

    }

    public function eliminar(){
        
        $query="UPDATE foro SET estado = '0' where foro_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
        
        return $eliminar;

    }



     public function listaforos(){
        
        $query="SELECT f.foro_id,f.title,DATE_FORMAT(f.fecha, '%d-%m-%Y'),u.firstname,u.lastname,u.photo,f.respuestas,f.user_id from foro f inner join users u on f.user_id=u.user_id where f.estado = 1 " ;       
        $tabla=ejecutar($query) or die (mysqli_error());        
       
        return $tabla;

    }

    public function sumaresp(){
        $query = "UPDATE foro set respuestas = respuestas + 1 where foro_id = '".$this->id."'";
        $sum = ejecutar($query) or die (mysqli_error());
        return $sum;

    }


    public function restaresp(){
         $query = "UPDATE foro set respuestas = respuestas - 1 where foro_id = '".$this->id."'";
        $res = ejecutar($query) or die (mysqli_error());
        return $res;
    }

    public function foroporid(){
            $query="SELECT foro_id,title from foro where foro_id = '".$this->id."' and estado = 1 " ;       
        $tabla=ejecutar($query) or die (mysqli_error());   
        $row = mysqli_fetch_array($tabla);     
       
        return $row;

    }

       
   
}



 ?>