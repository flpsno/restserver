<?php
require(APPPATH.'/libraries/REST_Controller.php');
 
class Api extends REST_Controller
{
	/* 
	 * 
	 * =========== PEDIDOS ===============
	 * 
	 */     
    
    function pedido_post()
    {
    	$json_decode = json_decode($this->post('json'),TRUE);
    	
    	$usuario = $json_decode['usuario'];
    	$senha = $json_decode['senha'];
    	   	
    	// se não valida o login, retorna mensagem de erro
    	if (!$this->ValidaLogin($usuario, $senha)) {
    		
    		$resposta = "1#WSFLPSNO#Credenciais invalidas!!!";
    		echo $resposta;
    		
    	// se validou o login consulta os pedidos	
    	} else {    	
   	
    		$pedidos = $this->pedidos_model->get_all(); 
    		$statuspedido = $this->pedidos_model->get_all_statuspedido();
    	
    		// se encontrou, monta o json
	    	if($pedidos)
    		{
    			
	    		$resposta = array(
	    				"pedidos" => $pedidos, 
	    				"statusPedidos" => $statuspedido);
    			$resposta = "0#WSFLPSNO#".json_encode($resposta);    		
	   			echo $resposta;
	   			
    		}
    	
    		// se não achou dados dos pedidos 
	    	else {
	    		
	    		$resposta = "2#WSFLPSNO#Nao foi possivel encontrar dados dos pedidos";		
    			echo $resposta;
    			
	    	}    	
    	}
    	
    	
    	/*$json_decode = json_decode($this->post('json'),TRUE);
    	
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
       
    function ValidaLogin($usuario, $senha) {
    	
    	if (($usuario <> 'teste') or ($senha <> md5('teste'))) { return FALSE; } 
    	
    	else { return TRUE; }
   	
    }
}
?>