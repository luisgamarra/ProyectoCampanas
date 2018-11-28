<?php 
require_once('../db/conexion.php');
conectar();

class Campania
{	
	private $id;
    private $title;
    private $description;
    private $place;    
    private $vacant;
    private $startdate;
    private $enddate;
    private $image;
    private $userid;
    private $categoriaid;
   
    
 function __construct($id=0,$title="",$description="",$place="",$vacant="",$startdate="",$enddate="",$image="",$userid="",$categoriaid=""){
 $this->id = $id;
 $this->title = $title;
 $this->description = $description;
 $this->place = $place;
 $this->vacant = $vacant;
 $this->startdate = $startdate;
 $this->enddate = $enddate;
 $this->image = $image;
 $this->userid = $userid;
 $this->categoriaid = $categoriaid;  
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

     public function setDescription($description){
        $this->description = $description;
    }

    public function getDescription($description){
        return $this->description;
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

    public function setStartdate($startdate){
        $this->startdate = $startdate;
    }

    public function getStartdate($startdate){
        return $this->startdate;
    }

     public function setEnddate($enddate){
        $this->enddate = $enddate;
    }

    public function getEnddate($enddate){
        return $this->enddate;
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

      public function setCategoriaid($categoriaid){
        $this->categoriaid = $categoriaid;
    }

    public function getCategoriaid($categoriaid){
        return $this->categoriaid;
    }

    public function Guardar(){
        
        $query="INSERT INTO campaigns (campaign_id,title,description,place,vacant,start_date,end_date,imagen,user_id,categoria_id,estado)
                VALUES(0,
                       '".$this->title."',                       
                       '".$this->description."',
                       '".$this->place."',
                       '".$this->vacant."',
                       '".$this->startdate."',
                       '".$this->enddate."',
                       '".$this->image."',
                       '".$this->userid."',
                       '".$this->categoriaid."',1);";
        $guardar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $guardar;

 	}

     public function actualizar(){
       
        $query="UPDATE campaigns SET title='".$this->title."',description='".$this->description."' ,place='".$this->place."',vacant='".$this->vacant."',start_date='".$this->startdate."',end_date='".$this->enddate."',imagen='".$this->image."',categoria_id='".$this->categoriaid."' where campaign_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        
        return $actualizar;

    }

    public function eliminar(){
        
        $query="UPDATE campaigns SET estado = '0' where campaign_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
        
        return $eliminar;

    }

    public function campaniaporusuario(){
       
        $query="SELECT c.campaign_id,c.title,c.description,c.place,c.vacant,DATE_FORMAT(c.start_date, '%d-%m-%Y'),DATE_FORMAT(c.end_date, '%d-%m-%Y'),c.imagen,c.start_date,c.end_date,ca.descripcion,ca.categoria_id from campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id where c.user_id='".$this->userid."' and c.estado = 1 order by c.start_date DESC" ;        
        $tabla=ejecutar($query);
        

        return $tabla;

    }

     public function campaniaporusuariomfechafinal(){
       
        $query="SELECT campaign_id,title,start_date,end_date from campaigns where user_id='".$this->userid."' and end_date>CURDATE() and estado = 1 order by start_date DESC" ;        
        $tabla=ejecutar($query);
        

        return $tabla;

    }

    public function campanias(){
        
        $query="SELECT campaign_id,title,description,place,vacant,DATE_FORMAT(start_date, '%d-%m-%Y') as inicio,DATE_FORMAT(end_date, '%d-%m-%Y') as final,imagen from campaigns where estado = 1 and start_date>CURDATE() order by start_date DESC" ;       
        $tabla=ejecutar($query);        
       
        return $tabla;

    }

    public function restarvacante(){
        $query = "UPDATE campaigns SET vacant=vacant-1 where campaign_id='".$this->id."'";
        $rv = ejecutar($query);

        return $rv;
    }

    public function sumarvacante(){
        $query = "UPDATE campaigns SET vacant=vacant+1 where campaign_id='".$this->id."'";
        $rv = ejecutar($query);

        return $rv;
    }

    public function getCampaniabyCod(){
        $query="SELECT c.campaign_id,c.title,c.description,c.place,c.vacant,c.start_date,c.end_date,c.imagen,DATE_FORMAT(c.start_date, '%d-%m-%Y'),DATE_FORMAT(c.end_date, '%d-%m-%Y'),ca.descripcion,ca.categoria_id from campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id where c.campaign_id = '".$this->id."' " ;       
        $tabla=ejecutar($query); 
        $row = mysqli_fetch_array($tabla);       
       
        return $row;
    }

    public function buscarcampania($palabra){
        $query = "SELECT campaign_id,title,description,place,vacant,DATE_FORMAT(start_date, '%d-%m-%Y'),DATE_FORMAT(end_date, '%d-%m-%Y'),imagen,start_date,end_date from campaigns where user_id='".$this->userid."' and estado = 1 and title like '%".$palabra."%'  " ; 
        $tabla = ejecutar($query);

        return $tabla;
    }

     public function buscar($palabra){
        $query = "SELECT campaign_id,title,description,place,vacant,DATE_FORMAT(start_date, '%d-%m-%Y') as inicio,DATE_FORMAT(end_date, '%d-%m-%Y') as final,imagen,start_date,end_date from campaigns where estado = 1 and start_date>CURDATE() and title like '%".$palabra."%'  " ; 
        $tabla = ejecutar($query);

        return $tabla;
    }
     
    public function getCampania(){
        $query="SELECT campaign_id,title,user_id from campaigns where campaign_id = '".$this->id."' " ;       
        $tabla=ejecutar($query); 
        $row = mysqli_fetch_array($tabla);       
       
        return $row;
    } 

    public function contardesdehasta($fechainicio,$fechafinal,$codusuario){
        $query = "SELECT c.title,DATE_FORMAT(c.start_date, '%d-%m-%Y'),DATE_FORMAT(c.end_date, '%d-%m-%Y'),ca.descripcion,COUNT(de.user_id) as voluntarios,c.vacant as quedaron,(COUNT(de.user_id)+c.vacant) as total,IF(c.end_date>CURDATE(),'En curso','Concluido') as estado from details_campaigns de inner join campaigns c on de.campaign_id=c.campaign_id inner join categorias ca on ca.categoria_id=c.categoria_id where c.start_date>'".$fechainicio."' and c.start_date<'".$fechafinal."' and c.user_id='".$codusuario."' and de.estado=1 group by c.title order by c.start_date DESC";
         $tabla = ejecutar($query);

        return $tabla;
    }
   
}



 ?>