<?php 
require_once('simpletest/autorun.php');
require_once('../modelo/donacion.php');
/**
 * 
 */
class Pruebadonacion extends UnitTestCase
{
	
	function testlistadonaciones(){

		$donacion = new Donacion();		
		$donacion->setCampaignid(1);		
		$this->assertEqual(true,$donacion->donacionesporcampania());
	}


	function testbuscardonacion(){
		$donacion2 = new Donacion();
		$donacion2->setId(1);
		$this->assertEqual(true,$donacion2->getDonacionbycod());

	}

	function testdonacionesvol(){
		$donacion3 = new Donacion();
		$donacion3->setUserid(2);
		$this->assertEqual(true,$donacion3->donxvol());
	}
}



 ?>