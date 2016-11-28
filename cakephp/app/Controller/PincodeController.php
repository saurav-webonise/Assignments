<?php
class PincodeController extends AppController 
{
	public function index() 
	{
		 $this->loadModel('Pincodes');
		 $pincodes=$this->Pincodes->find('all');
		 $this->set('pincodes',$pincodes);	 
	}	
}
