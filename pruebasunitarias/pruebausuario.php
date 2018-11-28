<?php 
require_once('simpletest/autorun.php');
require_once('../modelo/user.php');
/**
 * 
 */
class Pruebausuario extends UnitTestCase
{
	
	function testAutenticacion(){

		$user = new User();
		$user->setEmail('luis.gam.94@gmail.com');
		$user->setPassword('123456');		
		$this->assertEqual(true,$user->logeo());
		

	}

	function testregistro(){

		$user2 = new User();
		$user2->setFirstname('juan');
		$user2->setLastname('gonzales');
		$user2->setEmail('juancito@gmail.com');
		$user2->setPassword('123456');
		$user2->setCellphone('123456789');
		$user2->setType('2');				
		$this->assertEqual(true,$user2->save());

	}


	function testlistarusuario(){

		$user3 = new User();
		$user3->setId(1);
		$this->assertEqual(true,$user3->getUserbyCode());

	}
}



 ?>