<?php 
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
   
    
 function __construct($id=0,$title="",$description="",$place="",$vacant="",$startdate="",$enddate="",$image="",$userid=""){
 $this->id = $id;
 $this->title = $title;
 $this->description = $description;
 $this->place = $place;
 $this->vacant = $vacant;
 $this->startdate = $startdate;
 $this->enddate = $enddate;
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

    public function Guardar(){
        
        $query="INSERT INTO campaigns (campaign_id,title,description,place,vacant,start_date,end_date,imagen,user_id,estado)
                VALUES(0,
                       '".$this->title."',
                       '".$this->place."',
                       '".$this->description."',
                       '".$this->vacant."',
                       '".$this->startdate."',
                       '".$this->enddate."',
                       '".$this->image."',
                       '".$this->userid."',1);";
        $guardar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $guardar;

 	}

     public function actualizar(){
       
        $query="UPDATE campaigns SET title='".$this->title."', place='".$this->place."',vacant='".$this->vacant."',start_date='".$this->startdate."',end_date='".$this->enddate."' where campaign_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        
        return $actualizar;

    }

    public function eliminar(){
        
        $query="UPDATE campaigns SET estado = '0' where campaign_id='".$this->id."'";
        $eliminar=ejecutar($query) or die (mysqli_error());
        
        return $eliminar;

    }

    public function campaniaporusuario(){
       
        $query="SELECT * from campaigns where user_id='".$this->userid."' and estado = 1 " ;        
        $tabla=ejecutar($query);
        

        return $tabla;

    }

   /**  public function campaniaporid(){
       
        $query="SELECT * from campaigns where campaign_id='".$this->id."' and estado = 1 " ;        
        $tabla=ejecutar($query);
        $row = mysqli_fetch_array($tabla);

        return $row;

    }**/


     public function campanias(){
        
        $query="SELECT * from campaigns where estado = 1 " ;       
        $tabla=ejecutar($query);        
       
        return $tabla;

    }

    public function restarvacante(){
        $query = "UPDATE campaigns SET vacant=vacant-1 where campaign_id='".$this->id."'";
        $rv = ejecutar($query);

        return $rv;
    }

     
   
}



 ?>