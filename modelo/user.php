<?php
//funcion para conectarnos a una bd
class User {

    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $cellphone;
    private $type;
    
 function __construct($id=0,$firstname="",$lastname="",$email="",$password="",$cellphone="",$type=""){
 $this->id = $id;
 $this->firstname = $firstname;
 $this->lastname = $lastname;
 $this->email = $email;
 $this->password = $password;
 $this->cellphone = $cellphone;
 $this->type = $type;
 }
    
    public function setId($id){
    	$this->id = $id;
    }

    public function getId($id){
    	return $this->id;
    }

    public function setFirstname($firstname){
    	$this->firstname = $firstname;
    }

    public function getFirstname($firstname){
        return $this->firstname;
    }

    public function setLastname($lastname){
    	$this->lastname = $lastname;
    }

    public function getLastname($lastname){
    	return $this->lastname;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail($email){
        return $this->email;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword($password){
        return $this->password;
    }

    public function setCellphone($cellphone){
    	$this->cellphone = $cellphone;
    }

    public function getCellphone($cellphone){
    	return $this->cellphone;
    }

    public function setType($type){
        $this->type = $type;

    }

    public function getType($type){
        return $this->type;
    } 


    public function save(){
        conectar();
        $query="INSERT INTO users (user_id,firstname,lastname,email,password,cellphone,type_id,estado)
                VALUES(0,
                       '".$this->firstname."',
                       '".$this->lastname."',
                       '".$this->email."',
                       '".$this->password."',
                       '".$this->cellphone."',
                       '".$this->type."',1);";
        $save=ejecutar($query);
        //$this->db()->error;
        return $save;

 	}

     public function update(){
        conectar();
        $query="UPDATE users SET firstname='".$this->firstname."', lastname='".$this->lastname."',email='".$this->email."',cellphone='".$this->cellphone."' where user_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $actualizar;

    }

    

     public function logeo(){
        conectar();
        $query="SELECT * from users where email='".$this->email."' and password='".$this->password."' and estado = 1";        
        $tabla=ejecutar($query);
        $row=mysqli_fetch_array($tabla);
        //$this->db()->error;
        return $row;

    }


    public function getUserbyEmail(){

        conectar();
        $query="select * from users where email='".$this->email."' and estado = 1";        
        $tabla=ejecutar($query);
        $row=mysqli_fetch_array($tabla);
        //$this->db()->error;
        return $row;

    }

     public function getUserbyCode(){
        conectar();
        $query="select * from users where user_id='".$this->id."'";        
        $tabla=ejecutar($query);
        $row=mysqli_fetch_array($tabla);
        //$this->db()->error;
        return $row;

    }

     public function getUserbypass(){
        conectar();
        $query="select * from users where password='".$this->password."'";        
        $tabla=ejecutar($query);
        $row=mysqli_fetch_array($tabla);
        //$this->db()->error;
        return $row;

    }

    public function updatepass(){
        conectar();
        $query="UPDATE users SET password='".$this->password."' where user_id='".$this->id."'";
        $actualizar=ejecutar($query) or die (mysqli_error());
        //$this->db()->error;
        return $actualizar;

    }
}
    
?>