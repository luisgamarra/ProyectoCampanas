<?php 
require_once('simpletest/autorun.php');
require_once('../modelo/campania.php');
/**
 * 
 */
class Pruebacampania extends UnitTestCase
{
	
	function testlistacampania(){

		$campania = new Campania();				
		$this->assertEqual(true,$campania->campanias());
	}


	function testlistarcampaniaporusuario(){
		$campania2 = new Campania();
		$campania2->setUserid(1);
		$this->assertEqual(true,$campania2->campaniaporusuario());

	}

	function testbuscar(){
		$campania3 = new Campania();
		$this->assertEqual(true,$campania3->buscarcampania('f'));
	}
}



 ?>