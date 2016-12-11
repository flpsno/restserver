<?php
require(APPPATH.'/libraries/REST_Controller.php');

class Pedidos extends REST_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 * 
	 * 	/* 
	 * 
	 * =========== PEDIDOS ===============
	 * 
	 */ 
	
    function pedido_get()
    {
        if(!$this->get('idpedido'))
        {
            $this->response(NULL, 400);
        }
 
        $pedido = $this->pedidos_model->get($this->get('idpedido'));
         
        if($pedido)
        {
            $this->response(array("pedidos" => $pedido), 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }

    function pedidos_get()
    {
    	$pedidos = $this->pedidos_model->get_all();
    	 
    	if($pedidos)
    	{
    		$this->response(array("pedidos" => $pedidos), 200);
    	}
    
    	else
    	{
    		$this->response(NULL, 404);
    	}
    }
    
    
    function pedido_post()
    {
    	/*
    	$json_decode = json_decode($this->post('json'),TRUE);
    	
    	foreach( $json_decode['pedidos'] as $key){
   		
    		$idpedido = $key['IDPEDIDO'];
    		$data = array(
    				'PEDIDO_ELO7' => $key['PEDIDO_ELO7'],
    				'STATUS_ELO7' => $key['STATUS_ELO7'],
    				'DATA_PEDIDO' => $key['DATA_PEDIDO'],
    				'VALOR_TOTAL' => $key['VALOR_TOTAL'],
    				'TIPO_FRETE'  => $key['TIPO_FRETE'],
    				'VALOR_FRETE' => $key['VALOR_FRETE'],
    				'ITENS'       => $key['ITENS'],
    				'COMPRADOR'   => $key['COMPRADOR']
    		);
    		
    		$result = $this->pedidos_model->update($idpedido, $data);   		
    	}
    	        
        if($result === FALSE)
        {
            $this->response(array('status' => 'failed'));
        }
         
        else
        {
            $this->response(array('status' => 'success'), 200);
        }*/
         
    }   

    function pedido_put()
    {
		// insert e update sendo feito no método post    	 
    }
    
    
    function pedido_delete($idpedido)
    {
    	$pedido = $this->pedidos_model->delete($idpedido);
    	 
        if($result === FALSE)
        {
        	echo "false";
            $this->response(array('status' => 'failed'));
        }
         
        else
        {
        	echo "true";
            $this->response(array('status' => 'success'), 200);
        }
    }  
	 /*
   function pedido_post($idpedido) {
    	
		
		$pedidos = $this->pedidos_model->get_all();
    	 
    	if($pedidos)
    	{
    		$this->response(array("pedidos" => $pedidos), 200);
    	}
    
    	else
    	{
    		$this->response(NULL, 404);
    	}
	}*/
}
